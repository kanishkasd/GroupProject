<?php

function emptyInputSingup($name,$email,$username,$pwd,$pwdRepeat){
    $result;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function invaliduId($username){
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd,$pwdRepeat){
    $result;
    if($pwd !== $pwdRepeat){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}
function uIdExsist($conn,$username,$email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../singup.php?error=stmtfaild");
        exit();       
    }

    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        return false;
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn,$name,$email,$username,$pwd){
    $sql = "INSERT INTO users(usersName,usersEmail,usersUid,usersPassword) VALUES(?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location:../singup.php?error=stmtfaild");
        exit();       
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('Location:../login.php?error=nonerror');
    exit();
}
function emptyInputLogin($username,$pwd){
    $result;
    if( empty($username) || empty($pwd) ){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}
function loginUser($conn,$username,$pwd){
    $uidExists = uIdExsist($conn,$username,$username);
    if ($uidExists === false){
        header("Location:../singup.php?error=wronglogin1");
        exit();
    }
    $pwdHashed = $uidExists["usersPassword"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("Location:../singup.php?error=wronglogin2");
        exit();
    }
    elseif ($checkPwd === true){
        session_start();
        $_SESSION["user_id"] = $uidExists["usersId"];
        $_SESSION["user_uid"] = $uidExists["usersUid"];
        header("Location:../dashboard.php");
        exit();
    }
}