<?php

session_start();

include("db_connect.php");

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM users
        WHERE username='$username'
        AND password='$password'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1)
{
    $user = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['username'] = $user['username'];

    header("Location: user_home.php");
    exit();
}
else
{
    echo "
    <script>
        alert('Invalid Username or Password');
        window.location='user_login.php';
    </script>
    ";
}

?>