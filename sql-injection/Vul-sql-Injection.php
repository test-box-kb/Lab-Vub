<?php
session_start();
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
    <?php for($i=0; $i <5; $i++) {?>
    <form action="sql-injection.php" method="POST">
    <h2>SQL-Injection level <?php echo $i ?></h2>
    <input type="hidden" name="level" value="<?php echo $i ?>" >
    <label class="search">Search data: </label>
    <input type="text" name="search" placeholder="search...">
    <button type="submit"> submit</button>
    </form>
    <?php
    
        foreach ($_SESSION['result'] as $row) { ?>
            <label><b>Name:</b> <b><?= $row['name'] ?></b></label>
            <label> <b>Brand: </b><?= $row['brand'] ?></label>
            <label><b>Price:</b> <?= $row['price'] ?></label>
            <br>
    <?php
        }
            unset($_SESSION['result']);
    ?>
    <?php
    }
    ?>
    </body>
</html>