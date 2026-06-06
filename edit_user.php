<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("db_connect.php");

if (!isset($_GET['id'])) {
    header("Location: view_users.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE user_id='$id'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) != 1)
{
    echo "User not found!";
    exit();
}

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>


 <style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Georgia, serif;
}

body{
    background:#b8a6c0;
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
    padding:0 30px;
}

.navbar h1{
    font-size:42px;
}

/* Main Form Card */

.container{
    width:650px;
    margin:40px auto;
    background:#d9d9d9;
    padding:35px;
    border-radius:15px;
    box-shadow:0 4px 15px rgba(0,0,0,0.2);
}

.container h2{
    text-align:center;
    color:#2b022f;
    margin-bottom:25px;
    font-size:30px;
}

/* Form */

.form-group{
    margin-bottom:18px;
}

label{
    display:block;
    margin-bottom:6px;
    font-weight:bold;
    color:#2b022f;
    font-size:16px;
}

input,
select{
    width:100%;
    padding:12px;
    border:none;
    border-radius:5px;
    background:#ece7ef;
    font-size:15px;
}

input:focus,
select:focus{
    outline:none;
    box-shadow:0 0 5px rgba(66,21,77,0.5);
}

/* Buttons */

.btn{
    width:100%;
    padding:16px;
    border:none;
    border-radius:5px;
    background:#42154d;
    color:white;
    font-size:18px;
    font-weight:bold;
    cursor:pointer;
    margin-top:10px;
}


.btn:hover{
    opacity:0.9;
}

.back-btn{
    display:block;
    width:100%;
    text-align:center;
    text-decoration:none;
    background:#2b022f;
    color:white;
    padding:12px;
    border-radius:5px;
    font-weight:bold;
    margin-top:12px;
}

.back-btn:hover{
    opacity:0.9;
}

/* Photo Preview */

.current-photo{
    display:block;
    width:140px;
    height:140px;
    object-fit:cover;
    border-radius:10px;
    margin:0 auto 20px auto;
    border:3px solid #42154d;


    
}

</style>

    
</head>
<body>

<div class="container">

 <h2>Edit User Profile</h2>

    <form action="update_user.php" method="POST">

        <input type="hidden" name="user_id"
               value="<?php echo $row['user_id']; ?>">

        <div class="form-group">
            <label>Name</label>
            <input type="text"
                   name="name"
                   value="<?php echo $row['name']; ?>"
                   required>
        </div>

        <div class="form-group">
            <label>Student ID</label>
            <input type="text"
                   name="student_id"
                   value="<?php echo $row['student_id']; ?>"
                   required>
        </div>

        <div class="form-group">
            <label>Gender</label>
            <select name="gender" required>

                <option value="Male"
                <?php if($row['gender']=="Male") echo "selected"; ?>>
                Male
                </option>

                <option value="Female"
                <?php if($row['gender']=="Female") echo "selected"; ?>>
                Female
                </option>

                <option value="Other"
                <?php if($row['gender']=="Other") echo "selected"; ?>>
                Other
                </option>

            </select>
        </div>

        <div class="form-group">
            <label>Class</label>
            <input type="text"
                   name="class"
                   value="<?php echo $row['class']; ?>"
                   required>
        </div>

        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date"
                   name="dob"
                   value="<?php echo $row['dob']; ?>"
                   required>
        </div>

        <button type="submit" class="btn">Update User</button>

    </form>

</div>

</body>
</html>