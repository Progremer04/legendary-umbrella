<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "student";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
?>