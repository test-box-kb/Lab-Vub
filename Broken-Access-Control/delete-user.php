<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];

    Delete_user($conn, $id);

    header("Location: Admin.php");
    exit;
}