<?php
require("Connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="">
    <link rel="stylesheet" type="text/css" href="mycss.css">
</head>

<body>
    <h1 class="login-form">
        <h2>ADMIN LOGIN PANEL</h2>
        <form action="post">
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Admin Name" name="AdminName">
            </div>

            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="AdminPassword">
            </div>

            <button type="submit" name="Signin">Sign In</button>

            <div class="extra">
                <a href="#">Forgot Password</a>
            </div>
        </form>
    </h1>
</body>

</html>