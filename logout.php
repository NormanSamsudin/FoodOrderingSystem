<?php
session_start();
session_destroy();

    unset($_COOKIE['user']); 
    setcookie('user', ''); 
    unset($_COOKIE['pass']); 
    setcookie('pass', '');
    unset($_SESSION['username']);

header("Location: index.php");

?>