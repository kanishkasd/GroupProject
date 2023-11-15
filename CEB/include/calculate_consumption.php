<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    require_once 'dbh.inc.php';

    $user_id = $_SESSION['user_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Retrieve meter readings for the selected dates
    $query = "SELECT reading_date, reading_value FROM meter_readings WHERE usersId = ? AND (reading_date = ? OR reading_date = ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iss", $user_id, $start_date, $end_date);
    $stmt->execute();
    $result = $stmt->get_result();

    $readings = [];
    while ($row = $result->fetch_assoc()) {
        $readings[$row['reading_date']] = $row['reading_value'];
    }

    // Ensure we have readings for both selected dates
    if (count($readings) === 2) {
        $consumption_value = $readings[$end_date] - $readings[$start_date];

        $price_per_unit = calculatePricePerUnit($consumption_value);

        $consumption_charge = $consumption_value * $price_per_unit;


        // Insert calculated rates into the database
        $query = "INSERT INTO consumption_rates (usersId, calculation_date, start_date, end_date, consumption_value, consumption_charge) VALUES (?, CURDATE(), ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("issdd", $user_id, $start_date, $end_date, $consumption_value, $consumption_charge);
        $stmt->execute();

        echo "Consumption values and charge calculated successfully! value is Rs. $consumption_value consumption charge is Rs. $consumption_charge ";
        header("Location:../confirmation_page.php?consumption_value=$consumption_value&consumption_charge=$consumption_charge");
    } else {
        echo "Error: Readings not available for both selected dates.";
        header("Location:../meter_reading_calculation_form.php");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: meter_reading_calculation_form.php"); // Redirect if accessed directly
    exit();
}
function calculatePricePerUnit($consumption_value) {
    if ($consumption_value > 0 && $consumption_value < 31) {
        return 10;
    } elseif ($consumption_value > 30 && $consumption_value < 61) {
        return 20;
    } elseif ($consumption_value > 60 && $consumption_value < 91) {
        return 30;
    } elseif ($consumption_value > 90 && $consumption_value < 121) {
        return 40;
    } else {
        return 50;
    }
}
?>
