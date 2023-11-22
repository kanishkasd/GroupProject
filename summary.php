<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once 'include/dbh.inc.php';
// Fetch data from the database
$user_id = $_SESSION['user_id']; 
$sql = "SELECT reading_date, reading_value FROM meter_readings WHERE usersId = ? ORDER BY reading_date DESC";

// Use prepared statement to prevent SQL injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$stmt->close();

// Store the results in an array
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Close the database connection
$conn->close();
?>

<html>
        <head>
            <title>
                    meter reading summery
            </title>
            <link rel="stylesheet" href="style.css">
        </head>
        <body>

    <div class="banner">
    <?php include_once'navbar.php' ?>
        <div class="summary_content">
       
            <h1>Meter Reading Summary</h1>

            <table class="sum_table" border="1">
                <thead>
                    <tr>
                        <th>Reading Date</th>
                        <th>Reading Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row): ?>
                        <tr>
                            <td><?php echo $row['reading_date']; ?></td>
                            <td><?php echo $row['reading_value']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class = "button_container" >
            <a href="meter_reading_calculation_form.php"> <button class = "calButton">Electricity Consumption Calculator</button></a>
            <a href="meter_reading_guid.php"> <button class = "infoButton">Meter reading guidlines</button></a>
            <a href="summary.php"> <button class = "SumButton">Meter reading Summary</button></a>
            <a href="dashboard.php"> <button class = "inputButton">Meter reading input</button></a>
            </div>

        </div>
    </div>
    <

</body>
</html>
