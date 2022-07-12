<?php
$accountrequired = "true";
if ($accountrequired == "false") {
    $_SESSION['loggedin'] = "true";
    $_SESSION['username'] = "Anon";
} else {


if ($_SESSION['username'] == "Anon") {
    header("Location: assets/php/accounts/logout.php");
    die();
}
if ($dir == 0) {
   if (file_exists('accounts/banned/' . $_SESSION['username'])) {
        header("Location: banned.php");
        die();
    } 
    if ($accountrequired == "true") {
        if ($_SESSION['loggedin'] !== "true") {
            header("Location: index.php");
            die();
        }
    }
    if (!file_exists('accounts/passwords/' . $_SESSION['username'])) {
        header("Location: assets/php/accounts/logout.php");
        die();
    }
}
if ($dir == 1) {
    if (!file_exists('../accounts/passwords/' . $_SESSION['username'])) {
        header("Location: assets/php/accounts/logout.php");
        die();
    }
    if (file_exists('../accounts/banned/' . $_SESSION['username'])) {
        header("Location: ../banned.php");
        die();
    } 
    if ($accountrequired == "true") {
        if ($_SESSION['loggedin'] !== "true") {
            header("Location: ../index.php");
            die();
        }
    }
}
}
?>    
