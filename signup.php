<?php
session_start();
require_once 'assets/functions.php';

$error = false;

if(isset($_POST['username'])
    && isset($_POST['name'])
    && isset($_POST['email'])
        && isset($_POST['password'])) {

           $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
              $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
              $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
              $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
              

        if(addUser($_POST)){
            $_SESSION['username']=$_POST['username'];
            $_SESSION['name']=$_POST['name'];
            $_SESSION['email']=$_POST['email'];
           header('Location: index.php');
               exit;
            
        }else{
            $error = true;
            
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
    <p><a href="login.php">Logga in om du har ett konto</a></p>
    <?php
    if($error)
        echo "<p>Kontrollera dina uppgifter</p>";
    ?>
   <form method="post" action="">
  <label for="username">Username:</label>
  <input type="text" id="username"  name=username required>
  <br>
  <label for="name">name:</label>
  <input type="text" id="name"  name=name required>
  <br>
 <label for="email">email:</label>
  <input type="email" id="email"  name=email required>
  <br>
  <label for="password">Password:</label>
  <input type="password" id="password"  name=password required>
  <br>
  <input type="submit" name="submit" value="login">




   </form> 
</body>
</html>