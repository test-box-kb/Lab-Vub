<?php
session_start();
$uploadDir= "uploads/";
$uploadDir2= "uploadfile/";

$filename= $_FILES["file"]["name"];
$destination = $uploadDir . $filename;
$destination2 = $uploadDir2 . $filename;
$level = $_POST['level'];
$_SESSION['value'] = $level;
switch ($level){
    case 0:
        move_uploaded_file($_FILES["file"]["tmp_name"], $destination);
        $_SESSION['msg']= "upload seccessfully!"."<br>";
        $_SESSION['msg'].= "path: upload/".htmlspecialchars($destination);
    break;
    case 1:
        $allowed_extension = ["ipg","ipeg","png","gif"];
        $extension = strtolower((explode(".",$filename)[1]));
        if(in_array($extension,$allowed_extension)){
        move_uploaded_file($_FILES["file"]["tmp_name"], $destination);
        $_SESSION['msg']= "upload seccessfully!"."<br>";
        $_SESSION['msg'].= "path: upload/".htmlspecialchars($destination);
        } else $_SESSION['msg']= "upload false!"."<br>";
        break;
    case 2:
        $allowed_MIME_TYPE = ['image/jpeg','image/png','image/gif'];
        $finfo =  $_FILES["file"]["type"];
        if(in_array($finfo,$allowed_MIME_TYPE)){
        move_uploaded_file($_FILES["file"]["tmp_name"], $destination);
        $_SESSION['msg']= "upload seccessfully!"."<br>";
        $_SESSION['msg'].= "path: upload/".htmlspecialchars($destination);
        } else $_SESSION['msg']= "upload false!"."<br>";
        break;
    case 3:
        $allowed_MIME_TYPE = ['image/jpeg','image/png','image/gif'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo,$_FILES["file"]["tmp_name"]);
        if(in_array($mime,$allowed_MIME_TYPE)){
        move_uploaded_file($_FILES["file"]["tmp_name"], $destination);
        $_SESSION['msg']= "upload seccessfully!"."<br>";
        $_SESSION['msg'].= "path: upload/".htmlspecialchars($destination);
        } else $_SESSION['msg']= "upload false!"."<br>";
        break;
    case 4:
        move_uploaded_file($_FILES["file"]["tmp_name"], $destination2);
        $_SESSION['msg']= "upload seccessfully!"."<br>";
        $_SESSION['msg'].= "path: upload/".htmlspecialchars($destination2);
        break;
}

header("location: vul-upload.php");
exit;
?>