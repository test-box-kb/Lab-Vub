<?php
require "db.php";
$data = [];
$data = getAllPhone($conn);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $keyword = $_POST["search"] ?? "";
    $level = (int)($_POST["level"]);
    switch ($level) {
        case 0:
            $data = searchPhoneLevel0($conn, $keyword);
            break;
        default:
            $data = getAllPhone($conn);
    }
}
else{
    $data = getAllPhone($conn);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> SQL-Injection</title>
        <style>
            .search{
    margin-right:10px;
        }
        </style>
    </head>
    <body>
        <?php for($i=0; $i <5;$i++){ ?>
            <h3>SQL INJECTION LEVEL <?= $i ?></h3>
<form method="POST">
    <input type="hidden" name="level" value=" <?= $i ?> ">
    <input type="text" name="search" placeholder="Search phone">
    <button>
        Search
    </button>
</form>
<?php if(isset($_POST["level"])&& $_POST["level"]==$i){
    foreach ($data as $row) { ?>
<p>
<b><?= $row["name"] ?></b>
<?= $row["brand"] ?>
<?= $row["price"] ?>
</p>
<?php }}} ?>
    </body>
</html>