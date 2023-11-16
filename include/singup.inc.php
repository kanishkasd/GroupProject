<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uId"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $emptyInput = emptyInputSingup($name,$email,$username,$pwd,$pwdRepeat);
    $invaliduId = invaliduId($username);
    $invalidEmail = invalidEmail($email);
    $pwdMatch = pwdMatch($pwd,$pwdRepeat);
    $uIdExsist = uIdExsist($conn,$username,$email); 

    if($emptyInput !==false){
        header("Location: ../singup.php?error=emptyinput");
        exit();
    }
    if($invaliduId !==false){
        header("Location: ../singup.php?error=invaliduId");
        exit();
    }
    if($invalidEmail !==false){
        header("Location: ../singup.php?error=invalidEmail");
        exit();
    }
    if($pwdMatch !==false){
        header("Location: ../singup.php?error=passwordnotmatch");
        exit();
    }
    if($uIdExsist !==false){
        header("Location: ../singup.php?error=uIdtaken");
        exit();
    }

    createUser($conn,$name,$email,$username,$pwd);

}
else{
   header('Location:../login.php');
   exit();
}