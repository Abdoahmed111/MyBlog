<?php

function emptyInputSignUP($name, $email, $pwd, $confirm_pwd)
{
    $result;
    if (empty($name) || empty($email) || empty($pwd) || empty($confirm_pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidUid($name)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdStrength($pwd){
    $result;
    if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $confirm_pwd){
    $result;
    if ($pwd !== $confirm_pwd) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function uidExists($conn, $name ) {
    $sql = "SELECT * FROM users WHERE usersUid = ? ;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../sign_up.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $reslultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($reslultData)){
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function emailExists($conn, $email){
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../sign_up.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s",  $email);
    mysqli_stmt_execute($stmt);

    $reslultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($reslultData)){
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn, $name, $email, $pwd) {
    $sql = "INSERT INTO users (usersEmail, usersUid, usersPwd) VALUES (?,?,?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../sign_up.php?error=stmtfailedبي");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $email, $name, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../sign_up.php?error=none");
    exit();
}

function emptyInputSignIn($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function loginUser($conn,$username,$pwd) {
    $uidExists = uidExists($conn, $username);

    if ($uidExists === false){
        header('location: ../sign_in.php?error=wrongname');
        exit();
    }

    $pwdHashed = $uidExists['usersPwd'];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false){
        header('location: ../sign_in.php?error=wrongpwd');
        exit();
    } elseif ($checkPwd === true){
        session_start();
        $_SESSION['userid'] = $uidExists['usersId'];
        $_SESSION['usersUid'] = $uidExists['usersUid'];
        header('location: ../index.php');
        exit();
    }
}
