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

function getAllPhone(mysqli $conn)
{
    $sql = "SELECT id, name, brand, price FROM phone";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

function searchPhoneLevel0(mysqli $conn, string $keyword)
{
    $sql = "SELECT id, name, brand, price FROM phone WHERE name LIKE '%$keyword%' OR brand LIKE '%$keyword%' OR price LIKE '%$keyword%'";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}
?>