<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Lab - OS Command</title>
    </head>
    <body>
    <?php for($i = 0; $i<3; $i++){ ?>
        <h2> OS-Level <?php echo $i;?></h2>
    <form action="OS-command.php" method="POST" >
    <select name="command" >
        <option value="ping">ping</option>
        <option value="nslookup">nslookup</option>
        <option value="dig">dig</option>
    </select>
    <input type="hidden" name="level" value="<?= $i ?>">
    <input type="text" name="host"  placeholder="8.8.8.8">
    <button type="submit">Run</button>
    </form>
    <div>
    <?php
    if(isset($_SESSION["msg"],$_SESSION["level"])&&$_SESSION["level"]==$i){
    echo "<pre>" . $_SESSION["msg"] . "</pre>";
    unset($_SESSION["msg"]);
    unset($_SESSION["level"]);
    }
    ?>
    </div>
    <?php } ?>


    <?php for($i=3; $i<=4;$i++){?>
    <h2> OS-Level <?php echo $i;?></h2>
    <?php if($i==3){
    echo "<pre>" ."input thanh cong la phai chua cum tu \"hacker\"" . "</pre>";
    } ?>
    <?php if($i==4){
    echo "<pre>" ."hint: sleep i think" . "</pre>";
    } ?>
    <form action="OS-command.php" method="POST" >
    <input type="hidden" name="level" value="<?= $i ?>">
    <input type="text" name="host" >
    <button type="submit">Run</button>
    </form>
    <div>
    <?php
    if(isset($_SESSION["msg"],$_SESSION["level"])&&$_SESSION["level"]==$i){
    echo "<pre>" . $_SESSION["msg"] . "</pre>";
    unset($_SESSION["msg"]);
    unset($_SESSION["level"]);
    }
    ?>
    </div>
    <?php } ?>
</body>
</html>