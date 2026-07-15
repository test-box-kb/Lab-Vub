<?php
session_start();
    if (isset($_POST["host"], $_POST["level"])) 
        {
            $_SESSION["level"] = $_POST["level"];
            $input = $_POST["host"];
    }
        if(isset($_POST["command"],$_POST["host"])){
            $command = $_POST["command"];
            
            if($command=="ping")
                {
                    $command.=" -c 3 ".$_POST["host"];
                }else $command.=" ".$_POST["host"];
        $output=[];
        }
    switch($_POST["level"]){
        case 0:
            exec($command. " 2>&1", $output);
            $_SESSION["msg"] = implode("\n", $output);
            break;
        case 1:
            if(!str_contains($command,';')){
            exec($command. " 2>&1", $output);
            $_SESSION["msg"] = implode("\n", $output);
            } else $_SESSION["msg"]  = "hacker detected!";
            break;
        case 2:
            if((!preg_match('/[;$`]/', $command))){
            exec($command. " 2>&1", $output);
            $_SESSION["msg"] = implode("\n", $output);
            } else $_SESSION["msg"]  = "hacker detected!";
            break;
        case 3:
            if(str_contains($input,'hacker')){
            $_SESSION["msg"] = "Seccessfully!";
            } else $_SESSION["msg"] = "fail!";
            break;
        case 4:
            $_SESSION["msg"] = "Seccessfully!";
            break;
}
header("Location: Vul-OS-Command.php");
exit;
    ?>