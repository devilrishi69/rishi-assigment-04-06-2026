<?php


session_start();
$is_admin = isset($_SESSION['role']) && $_SESSION['role'] == 'admin';


if(isset($_SESSION['username']) && !isset($_SESSION['user_id']))
{
    include("db_connect.php");
}


elseif(isset($_SESSION['user_id']))
{
    if($_SESSION['can_view_all'] != 1)
    {
        die("Access Denied");
    }

    include("db_connect.php");
}

else
{
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM users ORDER BY user_id DESC";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Profiles</title>

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

/* Main Content */

.container{
    width:95%;
    margin:30px auto;
}

.page-title{
    text-align:center;
    color:#2b022f;
    font-size:36px;
    margin-bottom:25px;
}

/* Back Button */

.back-btn{
    display:inline-block;
    text-decoration:none;
    background:#42154d;
    color:white;
    padding:12px 20px;
    border-radius:5px;
    font-weight:bold;
    margin-bottom:20px;
}

.back-btn:hover{
    opacity:0.9;
}

/* Table */

table{
    width:100%;
    border-collapse:collapse;
    background:#d9d9d9;
    border-radius:10px;
    overflow:hidden;
}

th{
    background:#2b022f;
    color:white;
    padding:15px;
    font-size:18px;
}

td{
    padding:12px;
    text-align:center;
    border-bottom:1px solid #b8a6c0;
}

tr:hover{
    background:#ece6ef;
}

img{
    width:80px;
    height:80px;
    object-fit:cover;
    border-radius:8px;
}

/* Buttons */

.edit-btn{
    background:#42154d;
    color:white;
    padding:8px 15px;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
}

.delete-btn{
    background:#7a1631;
    color:white;
    padding:8px 15px;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
}

.edit-btn:hover,
.delete-btn:hover{
    opacity:0.9;
}

.permission-btn{
    background:#42154d;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
}

.permission-btn:hover{
    opacity:0.9;
}
.yes-badge{
    background:#28a745;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:bold;
}

.no-badge{
    background:#dc3545;
    color:white;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:bold;
}
.no-data{
    text-align:center;
    font-weight:bold;
    padding:20px;
}

</style>
</head>
<body>

<div class="navbar">
    <h1>VIEW PROFILES</h1>
</div>

<div class="container">

    <h2 class="page-title">User Profiles</h2>

    <a href="home.php" class="back-btn">
        BACK TO DASHBOARD
    </a>

    <table>

        <tr>
        <?php if($is_admin){ ?>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Student ID</th>
            <th>Gender</th>
            <th>Class</th>
            <th>DOB</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>View Access</th>
            <th>Add Access</th>
            <th>Permissions</th>
            <?php } ?>
        </tr>

        <?php

        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
        ?>

        <tr>

            <td><?php echo $row['user_id']; ?></td>

            <td>
                <img src="uploads/<?php echo $row['photo']; ?>" alt="Photo">
            </td>

            <td><?php echo $row['name']; ?></td>

            <td><?php echo $row['student_id']; ?></td>

            <td><?php echo $row['gender']; ?></td>

            <td><?php echo $row['class']; ?></td>

            <td><?php echo $row['dob']; ?></td>
         
            <?php if($is_admin){ ?>
            <td>
                <a class="edit-btn"
                   href="edit_user.php?id=<?php echo $row['user_id']; ?>">
                   Edit
                </a>
            </td>
            <?php } ?>
            <?php if($is_admin){ ?>
            <td>
                <a class="delete-btn"
                   href="delete_user.php?id=<?php echo $row['user_id']; ?>"
                   onclick="return confirm('Are you sure you want to delete this user?');">
                   Delete
                </a>
        
            </td>
            <?php } ?>
            <td>
<?php
if($row['can_view_all'] == 1)
{
    echo "<span class='yes-badge'>YES</span>";
}
else
{
    echo "<span class='no-badge'>NO</span>";
}
?>
</td>

<td>
<?php
if($row['can_add_user'] == 1)
{
    echo "<span class='yes-badge'>YES</span>";
}
else
{
    echo "<span class='no-badge'>NO</span>";
}
?>
</td>

<?php if($is_admin){ ?>

<td>
<a class="permission-btn"
href="manage_permissions.php?id=<?php echo $row['user_id']; ?>">
Permissions
</a>
</td>

<?php } ?>

        <?php
            }
        }
        else
        {
            echo "<tr><td colspan='10'>No Users Found</td></tr>";
        }
        ?>

    </table>

</div>

</body>
</html>