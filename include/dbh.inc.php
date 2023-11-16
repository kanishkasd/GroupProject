<?php
$severName = "localhost";
$dbUsername = "CEB";
$dbPassword = "421420224";
$dbName = "ceb_calculation_system";

$conn = mysqli_connect($severName,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("connection faild : " .mysqli_connect_error());
}
else{
    
}