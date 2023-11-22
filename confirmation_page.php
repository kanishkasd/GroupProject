<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Retrieve values from the URL
$consumption_value = $_GET['consumption_value'] ?? null;
$consumption_charge = $_GET['consumption_charge'] ?? null;
?>

<html>
    <head>
        <title>
                   ceylon elctricity bill calculation 
        </title>
        <link rel="stylesheet" href="style.css">
       
    </head>
    <body>

        <div class="banner">
         <?php include_once'navbar.php' ?>
            

            <div class= "confirmation_page_content1">
            <h1>Consumption Calculation Confirmation</h1>
            <?php
                if ($consumption_value !== null && $consumption_charge !== null) {
                    echo "Consumption values and charge calculated successfully! 
                   <br> Cousumption units  :- $consumption_value units  
                    <br>Consumption charge :- Rs. $consumption_charge";
                } else {
                    echo "Error: Calculated values not available.";
                }
            ?>
            </div>
            <div class="confirmation_page_content2">
            <h1>Warning Alert System!</h1>
                <?php
                    // Warning alert system logic
                if ($consumption_value > 0 && $consumption_value < 31) {
                    echo '<h3 class="blue-text">Normal energy usage</p>';
                } elseif ($consumption_value > 30 && $consumption_value < 61) {
                    echo '<h3 class="blue-text">Impaired energy usage</p>';
                } elseif ($consumption_value > 60 && $consumption_value < 91) {
                    echo '<h3 class="red-text">High energy usage</p>';
                } else {
                    echo '<h3 class="red-text">Significantly high energy usage</p>';
                }
                ?>
            </div>
            <div class = "button_container" >
            <a href="meter_reading_calculation_form.php"> <button class = "calButton">Electricity Consumption Calculator</button></a>
            <a href="meter_reading_guid.php"> <button class = "infoButton">Meter reading guidlines</button></a>
            <a href="summary.php"> <button class = "SumButton">Meter reading Summary</button></a>
            <a href="dashboard.php"> <button class = "inputButton">Meter reading input</button></a>
            </div>
        </div>
</body>
</html>
