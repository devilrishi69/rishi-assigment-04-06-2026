<?php

include("db_connect.php");

if(isset($_POST['register']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $student_id = mysqli_real_escape_string($conn,$_POST['student_id']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $class = mysqli_real_escape_string($conn,$_POST['class']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $photo_name = $_FILES['photo']['name'];
    $temp_name = $_FILES['photo']['tmp_name'];

    move_uploaded_file($temp_name,"uploads/".$photo_name);

    $sql = "INSERT INTO users
    (name, student_id, gender, class, photo, dob, username, password)
    VALUES
    ('$name','$student_id','$gender','$class','$photo_name','$dob','$username','$password')";

    if(mysqli_query($conn,$sql))
    {
        echo "
        <script>
        alert('Registration Successful');
        window.location='user_login.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#b8a6c0;
    font-family:Georgia, serif;
}

.navbar{
    background:#2b022f;
    color:white;
    height:85px;
    display:flex;
    align-items:center;
    padding-left:25px;
}

.navbar h1{
    font-size:42px;
}

.container{
    width:650px;
    margin:40px auto;
    background:#d9d9d9;
    padding:35px;
    border-radius:15px;
}

.container h2{
    text-align:center;
    margin-bottom:25px;
    color:#2b022f;
}

.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:5px;
    font-weight:bold;
}

input,
select{
    width:100%;
    padding:12px;
    border:none;
    border-radius:5px;
}

.btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:5px;
    background:#42154d;
    color:white;
    font-weight:bold;
    cursor:pointer;
}

.btn:hover{
    opacity:0.9;
}

.login-link{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
    color:#2b022f;
    font-weight:bold;
}

</style>
</head>
<body>

<div class="navbar">
    <h1>REGISTER</h1>
</div>

<div class="container">

<h2>Create Account</h2>

<form method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label>Student ID</label>
        <input type="text" name="student_id" required>
    </div>

    <div class="form-group">
        <label>Gender</label>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>

    <div class="form-group">
        <label>Class</label>
        <input type="text" name="class" required>
    </div>

    <div class="form-group">
        <label>Photo</label>
        <input type="file" name="photo" required>
    </div>

    <div class="form-group">
        <label>Date of Birth</label>
        <input type="date" name="dob" required>
    </div>

    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
    </div>

    <button type="submit" name="register" class="btn">
        REGISTER
    </button>

</form>

<a href="user_login.php" class="login-link">
    Already have an account? Login
</a>

</div>

</body>
</html>