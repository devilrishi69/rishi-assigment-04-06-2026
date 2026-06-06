<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>

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

/* Top Navbar */

.navbar{
    background:#2b022f;
    height:85px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 25px;
}

.logo{
    color:white;
    font-size:48px;
    font-weight:bold;
}

.logo span{
    font-size:20px;
}

/* Profile Icon */

.profile-icon{
    width:45px;
    height:45px;
    background:white;
    color:#2b022f;
    text-decoration:none;
    display:flex;
    justify-content:center;
    align-items:center;
    border-radius:2px;
    font-size:24px;
}

/* Dashboard */

.dashboard-title{
    color:white;
    font-size:48px;
    margin:20px;
    text-shadow:2px 2px #555;
}

.card-container{
    margin-top:80px;
    display:flex;
    justify-content:center;
    gap:40px;
    flex-wrap:wrap;
}

.card{
    width:220px;
    height:160px;
    background:#d9d9d9;
    border-radius:15px;

    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}

.card h3{
    text-align:center;
    color:black;
    font-size:20px;
    margin-bottom:25px;
    font-family:Arial, sans-serif;
}

.btn{
    text-decoration:none;
    background:#42154d;
    color:white;
    padding:10px 35px;
    border-radius:4px;
    font-weight:bold;
    font-family:Arial, sans-serif;
}

.btn:hover{
    opacity:0.9;
}

/* Selected Card Effect */

.card:first-child{
    border:3px solid #0a8cff;
}

</style>

</head>
<body>

<div class="navbar">

    <div class="logo">
        WELCOME, <span>admin</span>
    </div>

    <a href="profile.php" class="profile-icon">
        👤
    </a>

</div>

<h1 class="dashboard-title">Dashboard</h1>

<div class="card-container">

    <div class="card">
        <h3>VIEW<br>PROFILES</h3>
        <a href="view_users.php" class="btn">OPEN</a>
    </div>

    <div class="card">
        <h3>ADD<br>USER</h3>
        <a href="add_user.php" class="btn">OPEN</a>
    </div>

</div>

</body>
</html>