<?php
    session_start();

    if(!isset($_SESSION['user'])){
        header("Location: list_flower.php");

    }
    session_destroy();
    unset($_SESSION['user']);
    header("Location: list_flower.php");


?>