<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location:../login.php"); // Redirect if not logged in
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once 'dbh.inc.php';

    $usersId = $_SESSION['user_id'];
    $reading_date = $_POST['reading_date'];
    $reading_value = $_POST['reading_value'];

    // Insert meter reading into the database
    $query = "INSERT INTO meter_readings (usersId, reading_date, reading_value) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $usersId, $reading_date, $reading_value);

    if ($stmt->execute()) {
        echo "Meter reading submitted ";
        header("Location:../dashboard.php?error=nonErrorSuccusesfuly");
    } else {
        echo "Error submitting meter reading: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}  
 else {
    header("Location: dashboard.php"); // Redirect if accessed directly
    exit();
}

