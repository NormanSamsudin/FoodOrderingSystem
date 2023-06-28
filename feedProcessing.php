<?php
    require_once("feedbackConfig.php");
    session_start();
    
    if(isset($_POST['subject']) && isset($_POST['message'])){
        if(strlen($_POST['subject']) < 1 || strlen($_POST['message'] < 1)){
            $failure = "User name and password are required";
        }
        else{
            $feed = new feedbackConfig();
            $feed->setSubject($_POST['subject']);
            $feed->setMessage($_POST['message']);
            $feed->insertData();
            $_SESSION['feedback'] = "Feedback was submitted";
            header("Location: index.php#feedback");
            return;
        }
    }
?>
