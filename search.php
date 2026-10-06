<?php
require_once 'assets/functions.php';

$username = $_GET['username'] ?? '';
$records = null;

if ($username !== '') {
    $records = getForumPostsByUser($username);
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
       <p><a href="index.php">Tillbaka till huvudsidan</a></p>
     <form method="get" action="search.php">
    <label for="username">Användarnamn:</label>
    <input type="text" id="username" name="username" required>
    <input type="submit" value="Sök">
       
</form>

     <?php if ($records !== null): ?>
    <?php while ($post = $records->fetch(PDO::FETCH_ASSOC)): ?>
        <p>
            <strong><?php echo htmlspecialchars($post['username']); ?></strong><br>
            <?php echo nl2br(htmlspecialchars($post['message'])); ?><br>
            <?php echo htmlspecialchars($post['time']); ?>
        </p>
    <?php endwhile; ?>
<?php endif; ?>
</body>
</html>