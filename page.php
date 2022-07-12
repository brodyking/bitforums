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
            echo $_GET['pageid'];
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
        <div class="tableft" style="width: 88px;">
            Special Page
        </div>
    </cc>
    <div id="content">
    <?php
            include 'pages/' . $_GET['pageid'] . '.html';
        ?>
    </div>

    <?php
        include 'assets/php/footer.php';
        ?>
</body>
</html>