<?php
//session_start();
require_once('userConfig.php');
require_once("pdo.php");

$_SESSION['username_err'] = $_SESSION['pass_err'] = $_SESSION['phone_err'] = '';

if ( isset($_GET['username']) && isset($_GET['password']) && isset($_GET['phone'])){

    try{

    // Validate name
    $input_username = trim($_GET["username"]);
    if(empty($input_username)){
        $_SESSION['username_err'] = "Please enter a name.";
    } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $_SESSION['username_err'] = "Please enter a valid username";
    } else{
        $username = $input_name;
    }


    // Validate password
    $input_pass = trim($_GET["password"]);
    if(empty($input_pass)){
        $_SESSION['pass_err'] = "Please enter a password.";
    } elseif(!filter_var($input_pass, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $_SESSION['pass_err'] = "Please enter a valid password.";
    } else{
        $password = $input_pass;
    }

    
    // Validate phone
    $input_phone = trim($_GET["phone"]);
    if(empty($input_phone)){
        $_SESSION['phone_err'] = "Please enter a phone.";
    } elseif(!filter_var($input_phone, FILTER_SANITIZE_NUMBER_INT)){
        $_SESSION['phone_err'] = "Please enter a valid phone.";
    } else{
        $phone = $input_phone;
    }

    if(!empty($_SESSION['username_err']) || !empty($_SESSION['pass_err']) || !empty($_SESSION['phone_err'])){
        header("Location: update.php");
    }else{
        //update users
        $sql = "UPDATE users SET  password = :password, phone = :phone WHERE username = :username";
        $stm = $pdo->prepare($sql);
        $stm->execute(array(
            ':password' => password_hash($_GET['password'], PASSWORD_DEFAULT ),
            ':phone' => $_GET['phone'],
            ':username'=> $_GET['username']
        ));

        //success message
        $_SESSION['success'] = "Update success";

        header("Location: profile.php");

    }
    


    }catch(Exception $e){
        $e->getMessage();
    }

}
?>