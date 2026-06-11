<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php");
    exit();
}

include("db_connect.php");

$user_id = $_SESSION['user_id'];

$name = mysqli_real_escape_string($conn, $_POST['name']);
$student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$class = mysqli_real_escape_string($conn, $_POST['class']);
$dob = mysqli_real_escape_string($conn, $_POST['dob']);

$sql = "UPDATE users SET
        name='$name',
        student_id='$student_id',
        gender='$gender',
        class='$class',
        dob='$dob'
        WHERE user_id='$user_id'";

if(mysqli_query($conn, $sql))
{
    header("Location: user_home.php");
    exit();
}
else
{
    echo "Error updating profile.";
}

?>