<?php
mysqli_report(MYSQLI_REPORT_OFF);
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
    if ($result === false) {
    die(mysqli_error($conn));
    }
        $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_free_result($result);
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
        mysqli_free_result($result);

    return $data;
}
function searchPhoneLevel1(mysqli $conn, string $keyword) // \"%$ " %\" OR brand LIKE '%$ " %' OR price LIKE '%$" %'
{
    $keyword = preg_replace("/['\\\\]/", "", $keyword);
    $sql = "SELECT id, name, brand, price FROM phone WHERE name LIKE \"%$keyword%\" OR brand LIKE '%$keyword%' OR price LIKE '%$keyword%'";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
        mysqli_free_result($result);

    return $data;
}
function searchPhoneLevel2(mysqli $conn, string $keyword)
{
    $keyword = preg_replace("/(union|select|where|or|--|#)/i","",$keyword);
    $sql = "SELECT id, name, brand, price FROM phone WHERE name LIKE '%$keyword%' OR brand LIKE '%$keyword%' OR price LIKE '%$keyword%'";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
        mysqli_free_result($result);

    return $data;
}
function searchPhoneLevel3(mysqli $conn, string $keyword)
{
    $sql = "SELECT 1,null,null,null FROM phone WHERE name='$keyword'";
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
        mysqli_free_result($result);

    return $data;
}
?>