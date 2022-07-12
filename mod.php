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
    
    Manage

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
        <div class="tableft" style="width: 55px;">
            Manage
        </div>
    </cc>
    <div id="content">
        <?php
            if ($_SESSION['username'] == "admin") {
                echo 'heyy';
            } else {
                echo 'You must be a admin or mod to view this page.';
            }
        ?>
    </div>

    <?php
        include 'assets/php/footer.php';
        ?>
</body>
</html>