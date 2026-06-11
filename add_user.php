<?php

session_start();


if(isset($_SESSION['username']) && !isset($_SESSION['user_id']))
{
   
}


elseif(isset($_SESSION['user_id']))
{
    if($_SESSION['can_add_user'] != 1)
    {
        die("Access Denied");
    }
}


else
{
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add User</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    background:#b8a6c0;
    font-family:Georgia, serif;
    min-height:100vh;
}

/* Navbar */

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

/* Form Card */

.container{
    width:600px;
    margin:40px auto;
    background:#d9d9d9;
    border-radius:15px;
    padding:35px;
}

/* Heading */

.container h2{
    text-align:center;
    color:#2b022f;
    margin-bottom:25px;
    font-size:32px;
}

/* Form */

.form-group{
    margin-bottom:18px;
}

label{
    display:block;
    margin-bottom:6px;
    color:#2b022f;
    font-size:18px;
    font-weight:bold;
}

input,
select{
    width:100%;
    padding:12px;
    border:none;
    border-radius:5px;
    background:white;
    font-size:16px;
}

input[type="file"]{
    padding:10px;
}

/* Buttons */

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:5px;
    background:#42154d;
    color:white;
    font-size:18px;
    font-weight:bold;
    cursor:pointer;
}

button:hover{
    opacity:0.9;
}

.back-btn{
    display:block;
    text-align:center;
    text-decoration:none;
    background:#42154d;
    color:white;
    padding:12px;
    margin-top:15px;
    border-radius:5px;
    font-weight:bold;
}

.back-btn:hover{
    opacity:0.9;
}

</style>
</head>
<body>

<div class="navbar">
    <h1>ADD USER</h1>
</div>

<div class="container">

    <h2>Enter User Details</h2>

    <form action="insert_user.php" method="POST" enctype="multipart/form-data">

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
            <input type="file" name="photo" accept="image/*" required>
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

        <button type="submit">SAVE USER</button>

    </form>

    <a href="home.php" class="back-btn">BACK TO DASHBOARD</a>

</div>

</body>
</html>