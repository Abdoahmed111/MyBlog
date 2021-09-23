<?php

if (isset($_POST['submit'])){
    $username = $_POST['name'];
    $pwd = $_POST['password'];

    require 'dbh.inc.php';
    require 'functions.inc.php';

    if (emptyInputSignIn($username, $pwd) !== false) {
        header("location: ../sign_in.php?error=emptyinput");
        exit();
    }

    loginUser($conn,$username,$pwd);

} else {
    header("location: ../sign_in.php");
    exit();
}