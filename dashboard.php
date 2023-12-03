<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location:login.php"); // Redirect if not logged in
    exit();
}
?>

<html>

<head>
    <title>
        dashboard
    </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="banner">
        <?php include_once 'navbar.php' ?>
        <h3 class="headText">You can store your meter reading using below form..
            if you need more details about meter reading refer the <a class="ancor" href="meter_reading_guid.php"> meter reading guidelines </a> </h3>
        <div class="meter_reading_form">
            <h1>Ceylon Electricity Bill Calculation System</h1>
            <h2>Please input your meter readings to the system</h2>
            <form action="include/submit_meter_reading.php" method="post">
                <label for="reading_date">Reading Date:</label>
                <input type="date" id="reading_date" name="reading_date" placeholder="Enter the meter reading date..">

                <label for="reading_value">Reading value:</label>
                <input type="number" id="reading_value" name="reading_value" placeholder="Enter the reading value..">

                <button class="submit_button" name="submit" type="submit">Submit</button>
            </form>
            <p>for save your energy </p>
        </div>
        <div class="button_container">
            <a href="meter_reading_calculation_form.php" target="_self"> <button class="calButton">Electricity Consumption Calculator</button></a>
            <a href="meter_reading_guide.php" target="_self"> <button class="infoButton">Meter reading guidlines</button></a>
            <a href="summary.php" target="_self"> <button class="SumButton">Meter reading Summary</button></a>
            <a href="dashboard.php" target="_self"> <button class="inputButton">Meter reading input</button></a>
        </div>

    </div>



</body>

</html>