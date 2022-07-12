<?php
session_start();
$dir = 1;
$bp = "b";
$bn = "Random"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>
    
        <?php 
        echo $bn;
        ?>

        <?php
            include '../assets/php/title.php';
        ?></title>
</head>
<body>

    <?php
        include '../assets/php/accounts/verify.php';
    ?>

    <div id="nav">
        <?php
            include '../assets/php/nav.php';
        ?>
    </div>
    <cc>
        <div class="tableft" style="width: 74px;">
            Thread List
        </div>
    </cc>
    <div id="content">
        <h1><?php 
        echo '/' . $bp . '/ - ' . $bn;
        ?></h1>
        <a href="../newpost.php?bp=<?php echo $bp; ?>">
        <button class="threadpost" style="font-weight: bold">Create new thread</button>
        </a>
        <p> This list is shows activity. There will be duplicate thread links!</p>
        <table style="width: 100%;">
            <tr>
                <td class="top">
                    Thread name
                </td>
                <td class="top">
                    Poster
                </td>
                <td class="top">
                    Last Updated
                </td>
            </tr>
                <?php 
                    echo file_get_contents('data/list.html');
                ?>
        </table>

    </div>

    <?php
        include '../assets/php/footer.php';
        ?>
</body>
</html>