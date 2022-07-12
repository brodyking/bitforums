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
    
    <?php
            echo $_GET['username'];
        ?>

        <?php
            include 'assets/php/title.php';
        ?></title>
</head>
<body>

    <?php
        include 'assets/php/accounts/verify.php';
    ?>

    <div id="nav">
        <?php
            include 'assets/php/nav.php';
        ?>
    </div>
    <cc>
        <div class="tableft" style="width: 42px;">
            Profile
        </div>
    </cc>
    <div id="content">

    <?php

if (!isset($_GET['username'])) {
    header("Location: boards.php");
    die();
}

if (!file_exists("accounts/" . $_GET['username'] . ".html")) {
    header("Location: boards.php");
    die();
}

if (file_exists("accounts/banned/" . $_GET['username'])) {
    echo '<span style="color: red">This user has been banned!</span>';
}

?>

    <table style="width: 100%;">
        <tr>
            <td class="top" style="width: 25%;">
                Username
            </td>
            <td class="top">
                Stats
            </td>
        </tr>
        <?php
            include 'accounts/' . $_GET['username'] . '.html';
        ?>
        <br>
        <b>Last Active: </b> <?php echo file_get_contents('accounts/activity/' . $_GET['username']); ?>
        </td>
        </tr>
    </table>
    </div>

    <?php
        include 'assets/php/footer.php';
        ?>
</body>
</html>