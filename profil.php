<?php
session_start();
require_once 'assets/functions.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];


if (isset($_POST['submit'])) {
    updateUser(
        $username,
        $_POST['name'],
        $_POST['email'],
      password_hash($_POST['password'], PASSWORD_DEFAULT)
    );
}
$user = getUser($username);
?>

<!DOCTYPE html>
<html lang="sv">
<body>

<form action="" method="post">
    <p>Användarnamn: <?php echo $username; ?></p>

    <label for="name">Namn:</label>
    <input type="text" id="name" name="name" required>

    <br>

    <label for="email">E-post:</label>
    <input type="email" id="email" name="email" required>

    <br>

    <label for="password">Lösenord:</label>
    <input type="password" id="password" name="password" required>

    <br>

    <input type="submit" name="submit" value="Spara ändringar">
</form>

</body>
</html>