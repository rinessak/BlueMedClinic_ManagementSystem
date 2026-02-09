<?php
include "inc/functions.php";
    if(isset($_POST['login'])){
        login($_POST['email'],$_POST['fjalekalimi']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="style.css">
</head>
<body id="logIn-Form">
    <div class="login-container">
        <h2>Login Form</h2>
        <form class="login-form"  id="login-form" action="" method="POST">
            <input type="email" name="email" placeholder="email" required>
            <input type="password" name="fjalekalimi" placeholder="Password" required>
            <button type="submit" name="login" value="Login">Login</button></br></br>
            <hr>
            <a href='signUp.php'>Create a new account</a></p>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js">

    </script>
</body>
</html>
