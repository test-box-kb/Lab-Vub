<?php
session_start();
require('db.php');
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location: Vul-sql-Injection.php");
    exit;
}
$sql ="SELECT id, name, brand, price FROM phone" ;
$result = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
$_SESSION['result'] = $data;
if(isset($_POST["search"],$_POST["level"]))
    {
        $command = $_POST["search"];
        
switch($_POST["level"]){
    case 0:
        $query = "SELECT id, name, brand, price FROM phone WHERE name LIKE '%". $command ."%'";

        break;
}
}
header("Location: Vul-sql-Injection.php");
exit;
?>