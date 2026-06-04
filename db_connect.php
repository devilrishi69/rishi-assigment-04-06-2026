<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "internship_project";

$conn = mysqli_connect(
    $servername,
    $username,
    $password,
    $database
);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>