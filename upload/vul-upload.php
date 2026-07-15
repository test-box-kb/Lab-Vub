<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>File Upload</title>
    <style>
        .result{
            min-height:80px;
        }
</style>
    </head>
    <body>
<?php
for ($i = 0; $i<=4; $i++) {
$hint = [
"everything",
"allowed: .jpg, .jpeg, .png, .gif",
"allowed: image/jpeg,image/png,image/gif",
"File signature",
"4"
];
?>
    <h1> File Upload Level <?php echo $i;?></h1>
    <h2> <?php echo "HINT: ".$hint[$i] ?> </h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="level" value="<?php echo $i;?>">
        <input type="file" name="file">
        <button type="submit">Upload</button>
    </form>
    <div class="result">
        <?php
    if(($_SESSION['value']?? -1)!= -1 && $_SESSION['value'] == $i)
        {
            echo "<hr>";
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            unset($_SESSION['value']);
        }
        ?>
        </div>
<?php
}
?>

</body>
</html>