<?php
    if (isset($_POST['login']) && !empty($_POST['username']) 
    && !empty($_POST['password'])) {
     
    if(file_exists('accounts/passwords/' . $_POST['username'])) {
        if(file_get_contents('accounts/passwords/' . $_POST['username']) == $_POST['password']) {
            $_SESSION['loggedin'] = "true";
            $_SESSION['username'] = $_POST['username'];
            header("Location: boards.php");
            die();
        } else {
            echo '<br><br>The password you entered was incorrect.';
            $_SESSION['loggedin'] = "false";
        }
        
    } else {
        echo '<br><br>The username you entered was not in our database.';
        $_SESSION['loggedin'] = "false";
    }

    }

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "true") {
        header("Location: boards.php");
        die();
    }
?>