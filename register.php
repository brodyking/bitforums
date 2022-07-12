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
    
        Register

        <?php
            include 'assets/php/title.php';
        ?></title>
</head>
<body>
    <div id="nav">

    </div>

    <div id="content">
        <h1>Create an Account</h1>
        <p>Welcome to Bitchan.org! This site requires a login to prevent spam.
            This account should not tie to your real life identity and should not re-use any passwords you use on other sites.
            We are not responsible for data lost in exploits, etc.</p>
        <form class = "form-signin" role = "form" 
            action = "register.php" method = "post" id="form">
                    <input type = "text" class = "form-control" 
            name = "username" placeholder = "Username" 
            required><br>
            <input type = "text" class = "form-control"
            name = "email" placeholder = "Email (optional)"><br>
                    <input type = "password" class = "form-control"
            name = "password" placeholder = "Password" required><br>
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
            name = "register">Register</button>
            </form>

    <?php


        if (isset($_POST['register']) && !empty($_POST['username']) 
        && !empty($_POST['password'])) {
        
            if(file_exists('accounts/passwords/' . $_POST['username'])) {
                echo 'A account with your username already exsists.';
            } else {
                date_default_timezone_set("America/Chicago");
                fopen("accounts/passwords/" . $_POST['username'], "w");

                file_put_contents('accounts/passwords/' . $_POST['username'],$_POST['password']);
            
                fopen("accounts/" . $_POST['username'] . ".html", "w");

                file_put_contents('accounts/' . $_POST['username'] . '.html', '<tr><td class="top"><a href="#">' . $_POST['username'] . '</a></td><td><b>Joined: </b>' . date("m-d-y"));
            
                fopen("accounts/activity/" . $_POST['username'], "w");

                file_put_contents('accounts/activity/' . $_POST['username'], date("m-d-y") . ' ' . date("h:i a"));
            


                if (!empty($_POST['email'])) {
                    fopen("accounts/emails/" . $_POST['username'], "w");
                    file_put_contents('accounts/emails/' . $_POST['username'],$_POST['email']);
                }

                $_SESSION['loggedin'] = "true";
                $_SESSION['username'] = $_POST['username'];

                header("Location: boards.php");
                die();
            }

        }

    ?>

    </div>

    <?php
        include 'assets/php/footer.php';
        ?>
</body>
</html>