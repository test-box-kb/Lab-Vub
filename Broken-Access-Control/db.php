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
    $data = [];
    if ($result === false) {
    die(mysqli_error($conn));
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_free_result($result);
    return $data;
}

function login(mysqli $conn, string $username, string $passwd)
{
    $sql = "SELECT id,username,roles FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
    die($conn->error);
    }
    $stmt->bind_param("ss",$username,$passwd);
    $stmt->execute();
    $result = mysqli_fetch_assoc($stmt->get_result());
    $stmt->close();
    return $result;
    }
function Delete_user(mysqli $conn, int $id)
{
    $sql = "DELETE FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
    die($conn->error);
    }
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $stmt->close();
}
function profile($conn, int $id)
{
        $sql = "SELECT username, roles FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
    die($conn->error);
    }
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $result = mysqli_fetch_assoc($stmt->get_result());
    $stmt->close();
    return $result;
}
function getAllUsers(mysqli $conn)
{
    $sql = "SELECT id, username, roles FROM users";
    $result = $conn->query($sql);
    return $result;
}
?>