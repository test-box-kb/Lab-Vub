<?php
require "secure/auth.php";
require "db.php";

?>
<!DOCTYPE html>
<head>
    <title>Broken Access Control</title>
</head>
<body>
    <h2>Dashboard</h2>
<a>hong co gi dau kiem admin di</a><br>
<form action="logout.php" method="post">
    <button type="submit">Logout</button>
</form>
</body>