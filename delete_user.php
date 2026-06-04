<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("db_connect.php");

if (isset($_GET['id']))
{
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    
    $sql = "SELECT photo FROM users WHERE user_id='$id'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        
        if(!empty($row['photo']) && file_exists("uploads/" . $row['photo']))
        {
            unlink("uploads/" . $row['photo']);
        }

        
        $delete_sql = "DELETE FROM users WHERE user_id='$id'";

        if(mysqli_query($conn, $delete_sql))
        {
            header("Location: view_users.php");
            exit();
        }
        else
        {
            echo "Error deleting user: " . mysqli_error($conn);
        }
    }
    else
    {
        echo "User not found.";
    }
}
else
{
    header("Location: view_users.php");
    exit();
}

?>