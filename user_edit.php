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
<title>Edit Profile</title>

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
    width:600px;
    margin:40px auto;
    background:#d9d9d9;
    border-radius:15px;
    padding:35px;
}

.container h2{
    text-align:center;
    color:#2b022f;
    margin-bottom:25px;
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

</style>
</head>
<body>

<div class="navbar">
    <h1>EDIT PROFILE</h1>
</div>

<div class="container">

<h2>Update Your Information</h2>

<form action="user_update.php" method="POST">

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name"
               value="<?php echo $user['name']; ?>" required>
    </div>

    <div class="form-group">
        <label>Student ID</label>
        <input type="text" name="student_id"
               value="<?php echo $user['student_id']; ?>" required>
    </div>

    <div class="form-group">
        <label>Gender</label>
        <select name="gender" required>

            <option value="Male"
            <?php if($user['gender']=="Male") echo "selected"; ?>>
            Male
            </option>

            <option value="Female"
            <?php if($user['gender']=="Female") echo "selected"; ?>>
            Female
            </option>

            <option value="Other"
            <?php if($user['gender']=="Other") echo "selected"; ?>>
            Other
            </option>

        </select>
    </div>

    <div class="form-group">
        <label>Class</label>
        <input type="text" name="class"
               value="<?php echo $user['class']; ?>" required>
    </div>

    <div class="form-group">
        <label>Date of Birth</label>
        <input type="date" name="dob"
               value="<?php echo $user['dob']; ?>" required>
    </div>

    <button type="submit" class="btn">
        UPDATE PROFILE
    </button>

</form>

<a href="user_home.php" class="back-btn">
    BACK TO PROFILE
</a>

</div>

</body>
</html>