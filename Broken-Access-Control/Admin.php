<?php 
require "db.php";
require "secure/auth.php";
require "secure/authorization.php";
requireAdmin();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Admin Dashboard</title>
    </head>
    <body>
        <fo
    <a href="profile.php?id=<?php echo $_SESSION['user']['id']; ?>">
    My Profile
</a><br>
<?php
if ($_SESSION['user']['roles'] == 'admin') {
        $users = getAllUsers($conn);
        while($user = $users->fetch_assoc()){
?>
<form action="delete-user.php" method="POST">
    <input type="hidden" name="id" value="<?= $user['id']; ?>">
    <a>            Delete User <?= htmlspecialchars($user['username']); ?>
</a>
        <button type="submit">
            delete
        </button>
</form>
<?php
}}
?>
    </body>
</html>