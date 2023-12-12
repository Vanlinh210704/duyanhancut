<?php
    session_start();
    if(isset($_SESSION['first_name'])){
        unset($_SESSION['first_name']);
        header('location: interface.html');
    } elseif(isset($_SESSION['user_name'])) {
        unset($_SESSION['user_name']);
        header('location: interface.html');
    }
    exit();
?>