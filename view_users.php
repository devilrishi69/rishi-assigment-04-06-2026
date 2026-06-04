<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include("db_connect.php");

$sql = "SELECT * FROM users ORDER BY user_id DESC";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>

    
</head>
<body>

    <h2>All Users</h2>

    <div class="top-bar">
        <a href="home.php" class="btn">Back to Dashboard</a>
    </div>

    <table>

        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Student ID</th>
            <th>Gender</th>
            <th>Class</th>
            <th>DOB</th>
            <th>Edit</th>
            <th>Delete</th>
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

            <td>
                <a class="edit-btn"
                   href="edit_user.php?id=<?php echo $row['user_id']; ?>">
                   Edit
                </a>
            </td>

            <td>
                <a class="delete-btn"
                   href="delete_user.php?id=<?php echo $row['user_id']; ?>"
                   onclick="return confirm('Are you sure you want to delete this user?');">
                   Delete
                </a>
            </td>

        </tr>

        <?php
            }
        }
        else
        {
            echo "<tr><td colspan='9'>No Users Found</td></tr>";
        }
        ?>

    </table>

</body>
</html>