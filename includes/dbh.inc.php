<?php

$serverName = 'localhost';
$dBUsername = "Abdo";
$dBPassword = "test1234";
$dBName = "myblog";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
