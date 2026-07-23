<?php
session_start();
require "seccure/auth.php";
require "db.php";
?>
<!DOCTYPE html>
<head>
    <title>Broken Access Control</title>
</head>
<body>
    <h2>Dashboard</h2>

<a href="profile.php?id=<?php echo $_SESSION['user']['id']; ?>">
    My Profile
</a><br>
<?php
if ($_SESSION['user']['roles'] == 'admin') {
        $users = getAllUsers($conn);
        while($user = $users->fetch_assoc()){
?>

<a href="delete-user.php?id=<?= $user['id'];?>">Delete User <?= $user['username'] ?></a> <br>
<?php
}}
?>
</body>