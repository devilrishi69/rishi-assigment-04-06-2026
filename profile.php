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
            font-family:Arial, sans-serif;
        }

        body{
            background:#f4f4f4;
        }

        .container{
            width:500px;
            margin:50px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.2);
            text-align:center;
        }

        h2{
            margin-bottom:20px;
        }

        .profile-info{
            margin:20px 0;
        }

        .profile-info p{
            margin:10px 0;
            font-size:18px;
        }

        .btn{
            display:inline-block;
            text-decoration:none;
            background:#007bff;
            color:white;
            padding:10px 15px;
            border-radius:5px;
        }

        .btn:hover{
            background:#0056b3;
        }

    </style>
</head>
<body>

<div class="container">

    <h2>Admin Profile</h2>

    <div class="profile-info">
        <p><strong>Admin ID:</strong> <?php echo $admin_id; ?></p>
        <p><strong>Username:</strong> <?php echo $username; ?></p>
    </div>

    <a href="home.php" class="btn">Back to Dashboard</a>

</div>

</body>
</html>