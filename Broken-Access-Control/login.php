<?php 
session_start();
require "db.php";
if(isset($_POST['username'],$_POST['password'])){
    $username = $_POST["username"];
    $passwd = $_POST["password"];

$user = login($conn, $username, $passwd);
if($user){
    $_SESSION['user'] = $user;
    header("Location: dashboard.php");
    exit;
}else{
    $_SESSION['msg'] = 'Login Failed!';
}}
?>
<!DOCTYPE html>
<head>
            <title> LOGIN - BROKEN ACCESS CONTROL</title>

</head>
<body>
<form method="POST">
    <h2>LOGIN</h2>
        <a><b>USERNAME</b></a><br>
    <input type="text" name="username"><br>
    <a><b>PASSWORD</b></a><br>
    <input type="password" name="password"><br>
    <button type="submit">LOGIN</button>
</form>
<?php 
        if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
            
?>
</body>