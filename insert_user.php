<?php

include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $class = mysqli_real_escape_string($conn, $_POST['class']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);

    
    $photo_name = $_FILES['photo']['name'];
    $photo_tmp = $_FILES['photo']['tmp_name'];

    
    $new_photo_name = time() . "_" . $photo_name;

    
    $upload_path = "uploads/" . $new_photo_name;

    if(move_uploaded_file($photo_tmp, $upload_path))
    {
        $sql = "INSERT INTO users
                (name, student_id, gender, class, photo, dob)
                VALUES
                ('$name', '$student_id', '$gender', '$class', '$new_photo_name', '$dob')";

        if(mysqli_query($conn, $sql))
        {
            header("Location: view_users.php");
            exit();
        }
        else
        {
            echo "Database Error: " . mysqli_error($conn);
        }
    }
    else
    {
        echo "Photo Upload Failed!";
    }
}

?>