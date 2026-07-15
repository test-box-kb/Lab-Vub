<?php
$conn =  new mysqli(
    "db",
    "root",
    "root",
    "SQL_INJECTION"
);
if ($conn -> connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

function getAllphone(mysqli $conn)
{
    $query = "SELECT id, name, brand, price FROM phone";
    $data = [];
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
    }
    return $data ;
}

function searchPhone(mysqli $conn, string $keyword)
{
    $query = "SELECT id, name, brand, price FROM phone WHERE name LIKE '%$keyword%'";
    $data = [];
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
    }
}
?>