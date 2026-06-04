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

    
</head>
<body>

<div class="container">

    <h2>Edit User</h2>

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

        <button type="submit">Update User</button>

    </form>

</div>

</body>
</html>