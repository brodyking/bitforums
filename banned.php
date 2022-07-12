<?php
session_start();
$dir = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>
    
        Banned

        <?php
            include 'assets/php/title.php';
        ?></title>
</head>
<body>
    <div id="nav">

    </div>

    <div id="content">
        <h1>You have been banned!</h1>
        <p>Dear <?php echo $_SESSION['username']; ?>, you have been banned for the following reasons:</p>
        <?php
            echo file_get_contents('accounts/banned/' . $_SESSION['username']);
        ?>
        <p>You can <a href="assets/php/accounts/logout.php">click here to return to login</a>.</p>

    </div>

    <?php 

    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
        die();
    }

    if (!file_exists('accounts/banned/' . $_SESSION['username'])) {
        header("Location: index.php");
        die();
    }

    ?>

    <?php
        include 'assets/php/footer.php';
        ?>
</body>
</html>