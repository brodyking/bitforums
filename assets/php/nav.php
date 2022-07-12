<?php

    if ($dir == 0) {
        echo '<nav id="nav">            
        <ul>
        <cc>
            <li style="float:left;padding:10px;"><a style="color: white;font-size: 23px;padding: 0px;" href="index.php">Bit<span style="color: #33aadd;">Forums</span></a></li>
            <li><a href="settings.php">' . $_SESSION['username'] . '</a></li>
            <li><a href="page.php?pageid=Faq">FAQ</a></li>
            <li><a href="boards.php">Boards</a></li>
        </cc>   
        </ul>
        </nav>';
    }
    if ($dir == 1) {
        echo '<nav id="nav">            
        <ul>
        <cc>
            <li style="float:left;padding:10px;"><a style="color: white;font-size: 23px;padding: 0px;" href="../index.php">Bit<span style="color: #33aadd;">Forums</span></a></li>
            <li><a href="../settings.php">' . $_SESSION['username'] . '</a></li>
            <li><a href="../page.php?pageid=Faq">FAQ</a></li>
            <li><a href="../boards.php">Boards</a></li>
        </cc>   
        </ul>
        </nav>';
    }
?>