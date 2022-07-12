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
        echo $_GET["title"];
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
        <div class="tableft" style="width: 48px;">
            Thread
        </div>
    </cc>
    <div id="content">
        <h1><?php 
        echo $_GET["title"];
        ?></h1><i style="font-size: 0.9em;">(Return to <a href="index.php">/<?php echo $bp; ?>/</a>)</i><br>
                <a href="../newpost.php?bp=<?php echo $bp; ?>">
        </a><br>
        <table style="width: 100%;">
        <tr>
            <td class="top" style="width: 25%;">Poster's Username</td>
            <td class="top">Post Content</td>
        </tr>
    <?php

        //if (!isset($_GET["title"])) {
        //    header("Location: index.php");
        //}

        //if (!file_exists('data/threads/' . $_GET["title"] . '.html')) {
        //    header("Location: ../page.php?pageid=404");
        //}

        echo file_get_contents('data/threads/' . $_GET["title"] . '.html');

    ?>
    </table>
    </div>
    <div class="content">
    <h1>Create new Reply</h1>
    <form class = "form-signin" role = "form" 
    action = "../newreply.php" method = "get" id="form">
    <textarea style="width: 100%;height: 125px;" type="text" class="form-control" name="replycontent" placeholder="Content" required=""></textarea>
    <input type="text" value="<?php echo $_GET['title'] ?>" name="posttitle" style="display: none;" required readonly>
    <input type="text" value="<?php echo $bp ?>" name="postboard" style="display: none;" required readonly>

            <button class = "btn btn-lg btn-primary btn-block" type = "submit" style="width: 100%;"
    name = "reply">Register</button>
    </form>
    </div>

    <?php
        include '../assets/php/footer.php';
        ?>
</body>
</html>