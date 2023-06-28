<?php
require_once("pdo.php");
session_start();

if ( isset($_POST['delete']) ) {


    $sql = "DELETE FROM order_menu_users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':username' => $_SESSION['username']));


    $sql = "DELETE FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':username' => $_SESSION['username']));
    header( 'Location: index.php' ) ;
    return;
    }
 ?>
