<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'blogWebsite_php';

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    mysqli_close($conn);
}
?>