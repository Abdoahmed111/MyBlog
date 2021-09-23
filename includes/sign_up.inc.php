<?php

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $confirm_pwd = $_POST['confirm_password'];

    require 'dbh.inc.php';
    require 'functions.inc.php';

    if (emptyInputSignUP($name, $email, $pwd, $confirm_pwd) !== false) {
        header("location: ../sign_up.php?error=emptyinput");
        exit();
    }

    if (invalidUid($name) !== false) {
        header("location: ../sign_up.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../sign_up.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $confirm_pwd) !== false) {
        header("location: ../sign_up.php?error=pwdnotmatch");
        exit();
    }

    if (uidExists($conn, $name) !== false) {
        header("location: ../sign_up.php?error=usernametaken");
        exit();
    }

    if (emailExists($conn, $email) !== false) {
        header("location: ../sign_up.php?error=emailtaken");
        exit();
    }

    if(pwdStrength($pwd) !== false){
        header("location: ../sign_up.php?error=pwdWeak");
        exit();
    }
    createUser($conn, $name, $email, $pwd);

} else {
    header("location: ../sign_up.php");
    exit();
}