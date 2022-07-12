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
    
        Settings

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
        <div class="tableft" style="width: 53px;">
            Settings
        </div>
    </cc>
    <div id="content">

        <?php
            if ($accountrequired == "false") {
                header("Location: page.php?pageid=Anonymous Mode");
                die();
            }
        ?>

        <h1>User Preferences</h1>
        <p></p>
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Account')" id="accountlink">Account</button>
            <button class="tablinks" onclick="openCity(event, 'Appearance')"><a style="color: black;font-weight: normal;" href="profile.php?username=<?php echo $_SESSION['username']; ?>">Profile</a></button>
        </div>

    <div id="Account" class="tabcontent">
    <h3>Change Username</h3>
    <form class = "form-signin" role = "form" action = "settings.php" method = "post" id="form">
        <input type = "text" class = "form-control" name = "username" placeholder = "New Username" required><br>
        <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
        name = "usernamechange">Change Username</button>
    </form>
    <?php
        if (isset($_POST['usernamechange']) && !empty($_POST['username'])) {
        if(file_exists('accounts/passwords/' . $_POST['username'])) {
            echo 'The username you entered is already taken!';
        } else {
            fopen("accounts/passwords/" . $_POST['username'], "w");

            file_put_contents('accounts/passwords/' . $_POST['username'],file_get_contents('accounts/passwords/' . $_SESSION['username']));

            unlink('accounts/passwords/' . $_SESSION['username']);


            fopen("accounts/" . $_POST['username'] . '.html', "w");

            file_put_contents('accounts/' . $_POST['username'] . '.html',file_get_contents('accounts/' . $_SESSION['username'] . '.html'));

            unlink('accounts/' . $_SESSION['username']);

            fopen("accounts/activity/" . $_POST['username'], "w");

            file_put_contents('accounts/activity/' . $_POST['username'],file_get_contents('accounts/activity/' . $_SESSION['username']));

            unlink('accounts/activity/' . $_SESSION['username']);

            if (file_exists('accounts/emails/' . $_SESSION['username'])) {
                fopen("accounts/emails/" . $_POST['username'], "w");
                file_put_contents("accounts/emails/" . $_POST['username'], file_get_contents('accounts/emails/') . $_SESSION['username']);
                
                unlink('accounts/emails/' . $_SESSION['username']);
            }

            unlink('accounts/passwords/' . $_SESSION['username']);

            header("Location: assets/php/accounts/logout.php");

        }


        }
    ?>

<h3>Change Email</h3>
    <form class = "form-signin" role = "form" action = "settings.php" method = "post" id="form">
        <input type = "email" class = "form-control" name = "email" placeholder = "New Email" required><br>
        <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
        name = "emailchange">Change Email</button>
    </form>
    <?php
        if (isset($_POST['emailchange']) && !empty($_POST['email'])) {
            fopen("accounts/emails/" . $_SESSION['username'], "w");

            file_put_contents('accounts/emails/' . $_SESSION['username'],$_POST['email']);

        }
    ?>

<h3>Change Password</h3>
    <form class = "form-signin" role = "form" action = "settings.php" method = "post" id="form">
        <input type = "email" class = "form-control" name = "password" placeholder = "New Password" required><br>
        <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
        name = "passwordchange">Change Password</button>
    </form>
    <?php
        if (isset($_POST['passwordchange']) && !empty($_POST['password'])) {
            fopen("accounts/passwords/" . $_SESSION['username'], "w");

            file_put_contents('accounts/passwords/' . $_SESSION['username'],$_POST['password']);

        }
    ?>


    <h3>Logout of Account</h3>
    <a href="assets/php/accounts/logout.php">
        <button style="font-weight: bold" type = "submit" name = "usernamechange">Return to Login</button>
    </a>
    </div>

    <div id="Appearance" class="tabcontent">
    <p></p> 
    </div>

    <div id="Notice" class="tabcontent">
    <p>Pick a tab at the top to view different settings.</p> 
    </div>

    <div id="JSNotice" class="tabcontent" style="display: block;">
    <p>This page requires javascript. Please turn off your adblock or move to a new browser.</p> 
    </div>

    </div>

    <?php
        include 'assets/php/footer.php';
        ?>

    


<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
openCity(event, 'Notice');
</script>

<style>

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
    color: black;
    font-weight: normal;
    width: auto;
    height: auto;
    margin: 0px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
</body>
</html>