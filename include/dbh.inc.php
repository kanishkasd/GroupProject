<?php
$severName = "localhost";
$dbUsername = "CEB";
$dbPassword = "a7RsEH)UL-]reiMD";
$dbName = "ceb_calculation_system";

$conn = mysqli_connect($severName,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("connection faild : " .mysqli_connect_error());
}
else{
    
}