<?php
    session_start();
    if(!isset($_SESSION["Manager"])) {
        
        header("Location:../login.php");

        exit();
    }
?>