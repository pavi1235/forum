<?php
require_once 'assets/functions.php';
session_start();
$errors = array();
if (isset($_POST['submit'])) {

{
    $username = $_POST['username'];
    $password = $_POST['password'];
}
if (login($username,$password))
    {
    $_SESSION ['username'] = $username;
     header('Location: index.php');
    exit();
    }
    else
        {
            echo " invalid username or password";
        }
}


 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><a href="signup.php">Sign up</a></p>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>