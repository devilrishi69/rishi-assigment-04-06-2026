<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Login</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Georgia, serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#b7a8c1;
}

.login-container{
    width:340px;
    background:#e4dfe8;
    border-radius:6px;
    padding:35px 30px;
    box-shadow:0 2px 10px rgba(0,0,0,0.2);
    display:flex;
    flex-direction:column;
    align-items:center;
}

.welcome-box{
    width:100%;
    background:#a9a6b5;
    color:white;
    text-align:center;
    font-size:28px;
    font-weight:bold;
    padding:12px;
    margin-bottom:35px;
    border:1px solid #9792a3;
}

.form-box{
    width:100%;
    border:1px solid #b09ec0;
    padding:28px 16px;
    margin-bottom:25px;
}

.form-group{
    margin-bottom:15px;
}

.form-group:last-child{
    margin-bottom:0;
}

input{
    width:100%;
    height:42px;
    border:none;
    outline:none;
    background:#c6c2c4;
    text-align:center;
    color:white;
    font-size:18px;
    font-weight:bold;
}

input::placeholder{
    color:white;
}

.btn{
    width:100%;
    height:42px;
    border:none;
    cursor:pointer;
    color:white;
    font-size:20px;
    font-weight:bold;
    background:#7d72a3;
    margin-bottom:10px;
}

.btn:hover{
    opacity:0.9;
}

form{
    width:100%;
}

.back-link{
    display:block;
    width:100%;
    text-align:center;
    text-decoration:none;
    background:#42154d;
    color:white;
    padding:10px;
    font-weight:bold;
    margin-top:10px;
}

.back-link:hover{
    opacity:0.9;
}

.admin-link{
    margin-top:25px;
}

</style>
</head>
<body>

<div class="login-container">

    <div class="welcome-box">
        USER LOGIN
    </div>

    <form action="user_login_process.php" method="POST">

        <div class="form-box">

            <div class="form-group">
                <input
                    type="text"
                    name="username"
                    placeholder="USERNAME"
                    required>
            </div>

            <div class="form-group">
                <input
                    type="password"
                    name="password"
                    placeholder="PASSWORD"
                    required>
            </div>

        </div>

        <button type="submit" class="btn">
            LOGIN
        </button>

    </form>

    <a href="register.php" class="back-link">
        REGISTER
    </a>

    <a href="index.php" class="back-link admin-link">
        ADMIN LOGIN
    </a>

</div>

</body>
</html>