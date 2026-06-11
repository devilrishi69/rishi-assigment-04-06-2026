<?php

session_start();

if (!isset($_SESSION['username']))
{
    header("Location: index.php");
    exit();
}

include("db_connect.php");

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE user_id='$id'";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Permissions</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Georgia, serif;
}

body{
    background:#b8a6c0;
}

.navbar{
    background:#2b022f;
    color:white;
    height:85px;
    display:flex;
    align-items:center;
    padding-left:30px;
}

.navbar h1{
    font-size:42px;
}

.container{
    width:600px;
    margin:50px auto;
    background:#d9d9d9;
    padding:35px;
    border-radius:15px;
    box-shadow:0 4px 15px rgba(0,0,0,0.2);
}

.container h2{
    text-align:center;
    color:#2b022f;
    margin-bottom:30px;
}

.user-info{
    text-align:center;
    margin-bottom:25px;
    font-size:20px;
    font-weight:bold;
    color:#42154d;
}

.permission-box{
    margin-bottom:20px;
    padding:15px;
    background:#ece7ef;
    border-radius:8px;
}

.permission-box label{
    font-size:18px;
    font-weight:bold;
    cursor:pointer;
}

.permission-box input{
    transform:scale(1.3);
    margin-right:10px;
}

.btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:5px;
    background:#42154d;
    color:white;
    font-size:16px;
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
    background:#2b022f;
    color:white;
    padding:12px;
    border-radius:5px;
    margin-top:12px;
    font-weight:bold;
}

</style>

</head>
<body>

<div class="navbar">
    <h1>PERMISSIONS</h1>
</div>

<div class="container">

    <h2>Manage User Permissions</h2>

    <div class="user-info">
        <?php echo $user['name']; ?>
    </div>

    <form action="update_permissions.php" method="POST">

        <input type="hidden"
               name="user_id"
               value="<?php echo $user['user_id']; ?>">

        <div class="permission-box">
            <label>
                <input type="checkbox"
                       name="can_view_all"
                       value="1"
                       <?php if($user['can_view_all']==1) echo "checked"; ?>>
                View All Users
            </label>
        </div>

        <div class="permission-box">
            <label>
                <input type="checkbox"
                       name="can_add_user"
                       value="1"
                       <?php if($user['can_add_user']==1) echo "checked"; ?>>
                Add Users
            </label>
        </div>

        <button type="submit" class="btn">
            SAVE CHANGES
        </button>

    </form>

    <a href="view_users.php" class="back-btn">
        BACK TO USERS
    </a>

</div>

</body>
</html>