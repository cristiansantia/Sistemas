<?php
    session_start();
    if (!isset($_SESSION['logged'])) {
        if ($_SESSION['logged'] == true) {
        	echo $_SESSION['logged'];
        } else {
            header("location: ./index.php?alert=2");
        }
    }
?>