<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}
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
       
            <h1>Meter Reading Guidlines</h1>
            <ul class="meter_guid">
                <li>First goto your home/organization  electricity meter board.</li>
                <li>See the value that displays your meter board.</li>
                <li>Take the value</li>
                <li>Login to the CEB application</li>
                <li>Enter the value that you have taken into the meter reading form with reading date.</li>
                <li>Attention! Dont touch the meter board when you take the meter value.</li>
            </ul>
              
        </div>
        <div class="trafficImg">
                <img src="traffic.jpg" alt="" srcset="" width="200%">
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