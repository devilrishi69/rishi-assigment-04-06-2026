<?php

session_start();

if (!isset($_SESSION['username']))
{
    header("Location: index.php");
    exit();
}

include("db_connect.php");

$user_id = $_POST['user_id'];

$can_view_all = isset($_POST['can_view_all']) ? 1 : 0;
$can_add_user = isset($_POST['can_add_user']) ? 1 : 0;

$sql = "UPDATE users SET
        can_view_all='$can_view_all',
        can_add_user='$can_add_user'
        WHERE user_id='$user_id'";

if(mysqli_query($conn, $sql))
{
    echo "
    <script>
        alert('Permissions Updated Successfully');
        window.location='view_users.php';
    </script>
    ";
}
else
{
    echo "
    <script>
        alert('Failed To Update Permissions');
        window.history.back();
    </script>
    ";
}

?>