<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(empty($_SESSION["email"])){
        include_once "global_header.php";
    } else {
        if($_SESSION["type"] == "admin") {
            include_once "admin_header.php";
        } else {
            include_once "client_header.php";
        }
    }
?>