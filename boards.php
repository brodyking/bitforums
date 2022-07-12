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
    
        Boards

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
        <div class="tableft">
            Boards
        </div>
    </cc>
    <div id="content">
        <h1>BitForums</h1>
        <p>Welcome to BitForums, the modern imageboard for the 21st century!</p>
        <table>
            <tr>
                <td class="top"><b>Board Name</b></td><td class="top"><b>Description</b></td>
            </tr>
            <tr>
                <td><a href="b/">/b/ - Random</a></td>
                <td>Discussion about anything!</td>
            </tr>
        </table>
    </div>

    <?php
        include 'assets/php/footer.php';
        ?>
</body>
</html>
