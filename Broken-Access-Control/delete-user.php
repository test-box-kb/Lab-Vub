<?php
session_start();
require 'db.php';
$id = $_GET['id'];
Delete_user($conn, $id);
header("Location: dashboard.php");
exit;
?>