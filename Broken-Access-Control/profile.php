<?php 
session_start();
require 'db.php';
$id = $_GET['id'];
$user = profile($conn,$id);
?>
<p> USERNAME: <?= $user["username"] ?> <br>
    ROLE: <?= $user["roles"] ?>
</p>