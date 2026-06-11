<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: user_login.php");
    exit();
}

include("db_connect.php");

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Dashboard</title>

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
    justify-content:space-between;
    padding:0 25px;
}

.navbar h1{
    font-size:42px;
}

/* Profile Card */

.container{
    width:650px;
    margin:50px auto;
}

.card{
    background:#d9d9d9;
    border-radius:15px;
    padding:30px;
}

.card h2{
    text-align:center;
    color:#2b022f;
    margin-bottom:25px;
}

.photo{
    display:block;
    width:150px;
    height:150px;
    object-fit:cover;
    border-radius:10px;
    margin:0 auto 20px auto;
}

.info{
    margin-bottom:12px;
    font-size:18px;
}

.label{
    font-weight:bold;
    color:#2b022f;
}

/* Buttons */

.btn{
    display:block;
    width:100%;
    text-align:center;
    text-decoration:none;
    background:#42154d;
    color:white;
    padding:12px;
    border-radius:5px;
    margin-top:15px;
    font-weight:bold;
}

.logout{
    background:#7a1631;
}

.btn:hover{
    opacity:0.9;
}

</style>
</head>
<body>

<div class="navbar">
    <h1>WELCOME, <?php echo $user['username']; ?></h1>
</div>

<div class="container">

    <div class="card">

        <h2>My Profile</h2>

        <img
            src="uploads/<?php echo $user['photo']; ?>"
            class="photo"
            alt="Profile Photo">

        <div class="info">
            <span class="label">Name:</span>
            <?php echo $user['name']; ?>
        </div>

        <div class="info">
            <span class="label">Student ID:</span>
            <?php echo $user['student_id']; ?>
        </div>

        <div class="info">
            <span class="label">Gender:</span>
            <?php echo $user['gender']; ?>
        </div>

        <div class="info">
            <span class="label">Class:</span>
            <?php echo $user['class']; ?>
        </div>

        <div class="info">
            <span class="label">Date of Birth:</span>
            <?php echo $user['dob']; ?>
        </div>

        <div class="info">
            <span class="label">Username:</span>
            <?php echo $user['username']; ?>
        </div>

        <a href="user_edit.php" class="btn">
    EDIT PROFILE
</a>

<?php if($_SESSION['can_view_all'] == 1) { ?>
    <a href="view_users.php" class="btn">
        VIEW USERS
    </a>
<?php } ?>

<?php if($_SESSION['can_add_user'] == 1) { ?>
    <a href="add_user.php" class="btn">
        ADD USER
    </a>
<?php } ?>

<a href="user_logout.php" class="btn logout">
    LOGOUT
</a>

    </div>

</div>

</body>
</html>