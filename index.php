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
    
        Login

        <?php
            include 'assets/php/title.php';
        ?></title>
</head>
<body>
    <div id="nav">

    </div>

    <div id="content">
        <h1>Login</h1>
        <form class = "form-signin" role = "form" 
            action = "index.php" method = "post" id="form">
                    <input type = "text" class = "form-control" 
            name = "username" placeholder = "Username" 
            required><br>
                    <input type = "password" class = "form-control"
            name = "password" placeholder = "Password" required><br>
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
            name = "login">Login</button>
            </form>

            Dont have an account? <a href="register.php">Register here</a>.

            <?php
                include 'assets/php/accounts/login.php';
            ?>

    </div>

    <?php
        include 'assets/php/footer.php';
        ?>
</body>
</html>
