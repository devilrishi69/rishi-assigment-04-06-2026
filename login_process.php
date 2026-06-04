<?php

session_start();

include("db_connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    
    $sql = "SELECT * FROM admins 
            WHERE username='$username' 
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['username'] = $row['username'];

        header("Location: home.php");
        exit();
    }
    else
    {
        header("Location: index.php?error=1");
        exit();
    }
}
else
{
    header("Location: index.php");
    exit();
}

?>