<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$admin_id = $_SESSION['admin_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile</title>

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

/* Profile Card */

.profile-container{
    width:450px;
    margin:80px auto;
    background:#d9d9d9;
    border-radius:15px;
    padding:35px;
    text-align:center;
}

.profile-title{
    font-size:32px;
    margin-bottom:30px;
    color:#2b022f;
}

.info-box{
    background:white;
    padding:15px;
    margin-bottom:15px;
    border-radius:8px;
    font-size:20px;
}

.label{
    font-weight:bold;
    color:#2b022f;
}

/* Buttons */

.btn{
    display:block;
    width:100%;
    text-decoration:none;
    background:#42154d;
    color:white;
    padding:12px;
    margin-top:15px;
    border-radius:5px;
    font-size:18px;
    font-weight:bold;
}

.btn:hover{
    opacity:0.9;
}

.logout{
    background:#7a1631;
}

</style>

</head>
<body>

<div class="navbar">
    <h1>PROFILE</h1>
</div>

<div class="profile-container">

    <h2 class="profile-title">Admin Details</h2>

    <div class="info-box">
        <span class="label">Admin ID:</span>
        <?php echo $admin_id; ?>
    </div>

    <div class="info-box">
        <span class="label">Username:</span>
        <?php echo $username; ?>
    </div>

    <a href="home.php" class="btn">
        Back to Dashboard
    </a>

    <a href="logout.php" class="btn logout">
        Logout
    </a>

</div>

</body>
</html>