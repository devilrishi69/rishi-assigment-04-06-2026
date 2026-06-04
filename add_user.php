<?php
session_start();

if (!isset($_SESSION['username'])) {
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

    
</head>
<body>

<div class="container">

    <h2>Add User</h2>

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

        <button type="submit">Save User</button>

    </form>

    <a href="home.php" class="back-btn">← Back to Dashboard</a>

</div>

</body>
</html>