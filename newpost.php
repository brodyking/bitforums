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
    
    New Post

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
        <div class="tableft" style="width: 63px;">
            New Post
        </div>
    </cc>
    <div id="content">
    <h1>New Thread Form</h1>

    <?php 

        if (!isset($_GET["bp"])) {
            $_GET["bp"] = "b";
        }

    ?>

    <form role="form" action="newpost.php" method="post" enctype="multipart/form-data">
                    <input style="width: 100%;" type = "text" class = "form-control" 
                    name="posttitle" placeholder = "Post Title"
                    required>
                    <textarea style="width: 100%;" type='text' class = "form-control" 
                    name = "postcontent" placeholder = "Content" 
                    required></textarea>
                    <input style="width: 100%;" type="file" name="fileToUpload" id="fileToUpload">
                    <input type="text" value="<?php echo $_GET['bp'] ?>" name="postboard" style="display: none;" required readonly>
                    <button style="width: 100%;" class = "btn btn-lg btn-primary btn-block" type = "submit" 
                    name = "submit">Submit</button>
                    <?php 
                    if (isset($_get['token']) && $_GET['token'] === "manage420") {
                        echo '<button class = "btn btn-lg btn-primary btn-block" type = "submit" 
                        name = "submitasmod"><rt>Mod Submit</rt></button>';
                    }
                    ?>
                </form>


                <?php
// Check if image file is a actual image or fake image
$target_file = null;
$uploadOk = 0;
if (isset($_POST["submit"])) {
    if(isset($_POST["posttitle"]) && isset($_POST["postboard"]) && isset($_POST["postcontent"])) {
        date_default_timezone_set("America/Chicago");
        file_put_contents('lastupdated.txt',date("m-d-y"));
        if (empty($_FILES['fileToUpload']['name'])) {
            $uploadOk = 0;
        } else {
            $target_dir = $_POST["postboard"] . "/data/uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check file size
            //if ($_FILES["fileToUpload"]["size"] > 500000) {
            //  echo "Sorry, your file is too large.";
            // $uploadOk = 0;
            //}
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
        }


        if (strpos($_POST['postcontent'], "<") !== false or strpos($_POST['posttitle'], "<") !== false) {
            $uploadOk = 0;
            echo 'This post contains illegal chareracters. You are not allowed to use open brakets.';
        }

        if (file_exists($_POST["postboard"] . "/data/threads/" . $_POST["posttitle"] . ".html")) {
            $uploadOk = 0;
            echo 'That post already exsists!';
        }



        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<script>
            window.location.href = '" , htmlspecialchars($_SERVER['PHP_SELF']) , "'
            </script>";
            echo "<br><br>It seems like you have javascript disabled, which prevented a redirect.<br><br>Please <a href='board.php'>click here</a> to visit the board.";// if everything is ok, try to upload file
        }
        if ($uploadOk == 1) {
            if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "Sorry, there was an error uploading your file.";
            } else {
            
            
            // If post was successful.

            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

            file_put_contents($_POST["postboard"] . "/data/list.html","<tr><td><a href='thread.php?title=" .  $_POST["posttitle"] . "'>" . $_POST["posttitle"] . "</td><td><a href='../profile.php?username=" . $_SESSION['username'] . "'>" . $_SESSION['username'] . "</a></td><td>" . date("m-d-y") . ' ' . date("h:i a") .  "</td></tr>" . file_get_contents($_POST["postboard"] . "/data/list.html"));
            file_put_contents($_POST["postboard"] . "/data/threads/" . $_POST["posttitle"] . ".html","<tr><td class='postertd'><a href='../profile.php?username=" . $_SESSION['username'] . "'>" . $_SESSION['username'] . "</a></td><td><img style='width: 50%;' src='data/uploads/" . htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])) . "'><br><br>" . $_POST["postcontent"] . "</td></tr>");
            
            date_default_timezone_set("America/Chicago");
            file_put_contents('accounts/activity/' . $_SESSION['username'], date("m-d-y") . ' ' . date("h:i a"));

            echo "<script>
            window.location.href = '" . $_POST["postboard"] . "/index.php';
            </script>";
            echo "<br><br>It seems like you have javascript disabled, which prevented a redirect.<br><br>Please <a href='" . $_POST["postboard"] . "/index.php'>click here</a> to visit the board.";  }
        }  
    } else {
        echo "Illegal Chareracters found!";
    } 
}
?>


    </div>

    <?php
        include 'assets/php/footer.php';
        ?>
</body>
</html>