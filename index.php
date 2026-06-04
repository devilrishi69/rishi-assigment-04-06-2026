<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    
</head>
<body>

    <div class="login-container">

        <h2>Admin Login</h2>

        <?php
        if(isset($_GET['error']))
        {
            echo "<p class='error'>Invalid Username or Password</p>";
        }
        ?>

        <form action="login_process.php" method="POST">

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit">Login</button>

        </form>

    </div>

</body>
</html>