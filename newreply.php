<?php
session_start();
        if (isset($_GET['reply'])) {
            date_default_timezone_set("America/Chicago");
            $postboard = $_GET['postboard'];
            file_put_contents($postboard . '/data/threads/' . $_GET['posttitle'] . '.html', file_get_contents($_GET['postboard'] . '/data/threads/' . $_GET['posttitle'] . '.html') . '<tr><td class="postertd"><a href="../profile.php?username=' . $_SESSION['username'] . '">' . $_SESSION['username'] . '</a></td><td>' . $_GET['replycontent'] . '</td></tr>');
            file_put_contents('accounts/activity/' . $_SESSION['username'], date("m-d-y") . ' ' . date("h:i a"));
            file_put_contents($postboard . "/data/list.html","<tr><td><a href='thread.php?title=" .  $_GET['posttitle'] . "'>" . $_GET['posttitle'] . "</td><td><a href='../profile.php?username=" . $_SESSION['username'] . "'>" . $_SESSION['username'] . "</a></td><td>" . date("m-d-y") . ' ' . date("h:i a") .  "</td></tr>" . file_get_contents($_POST["postboard"] . "/data/list.html"));
            header("Location: " . $postboard . "/thread.php?title=" . $_GET['posttitle']);
            die();
        
        }
        ?>