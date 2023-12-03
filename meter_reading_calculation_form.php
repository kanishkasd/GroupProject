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
        <h3 class="headText"> You can calculate your electricity consumption retes using below form..
            please select two days thats you need to calculate and submit it</h3>
        <div class="meter_reading_form">

            <h1>Meter Reading Calculator</h1>

            <form action="include/calculate_consumption.php" method="post">
                <label for="start_date">Start Date:</label>
                <select name="start_date" required>
                    <option value=""><?php
                                        session_start();
                                        require_once 'include/dbh.inc.php';

                                        $user_id = $_SESSION['user_id'];

                                        $query = "SELECT DISTINCT reading_date FROM meter_readings WHERE usersId = ?";
                                        $stmt = $conn->prepare($query);
                                        $stmt->bind_param("i", $user_id);
                                        $stmt->execute();

                                        if ($stmt->error) {
                                            die("Error: " . $stmt->error);
                                        }

                                        $result = $stmt->get_result();

                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='{$row['reading_date']}'>{$row['reading_date']}</option>";
                                        }

                                        $stmt->close();
                                        ?>

                    </option>
                </select><br>

                <label for="end_date">End Date:</label>
                <select name="end_date" required>
                    <option value="">
                        <?php

                        require_once 'include/dbh.inc.php';

                        $user_id = $_SESSION['user_id'];

                        $query = "SELECT DISTINCT reading_date FROM meter_readings WHERE usersId = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $user_id);
                        $stmt->execute();

                        if ($stmt->error) {
                            die("Error: " . $stmt->error);
                        }

                        $result = $stmt->get_result();

                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['reading_date']}'>{$row['reading_date']}</option>";
                        }

                        $stmt->close();
                        ?>

                    </option>
                </select><br>

                <button class="submit_button" name="submit" type="submit">Submit</button>
            </form>
        </div>

        <div class="button_container">
            <a href="meter_reading_calculation_form.php" target="_self"> <button class="calButton">Electricity Consumption Calculator</button></a>
            <a href="meter_reading_guid.php" target="_self"> <button class="infoButton">Meter reading guidelines</button></a>
            <a href="summary.php" target="_self"> <button class="SumButton">Meter reading Summary</button></a>
            <a href="dashboard.php" target="_self"> <button class="inputButton">Meter reading input</button></a>
        </div>

    </div>

</body>

</html>