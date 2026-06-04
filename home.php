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
    <title>Dashboard</title>

    
</head>
<body>

    <div class="navbar">
        <h2>User Management System</h2>
        <h3>Welcome, <?php echo $username; ?></h3>
    </div>

    <div class="container">

        <h1>Dashboard</h1>

        <div class="card-container">

            <div class="card">
                <h3>Add User</h3>
                <a href="add_user.php" class="btn">Open</a>
            </div>

            <div class="card">
                <h3>View Users</h3>
                <a href="view_users.php" class="btn">Open</a>
            </div>

            <div class="card">
                <h3>Profile</h3>
                <a href="profile.php" class="btn">Open</a>
            </div>

            <div class="card">
                <h3>Logout</h3>
                <a href="logout.php" class="btn">Logout</a>
            </div>

        </div>

    </div>

</body>
</html>