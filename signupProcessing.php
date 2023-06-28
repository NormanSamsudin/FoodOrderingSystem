<?php
// require_once("userConfig.php");
// session_start();


// // Check to see if we have some POST data, if we do process it
// if ( isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['phone'])) {


//     $var1 = new userConfig();
//     $var1->setUsername($_POST['username']);
//     $var1->setPassword($_POST['pass']);
//     $var1->setPhone($_POST['phone']);
//     $var1->insertData();
//     $_SESSION['username'] = $var1->getUsername();
    
//     //Redirect the browser to game.php
//     header("Location: menu.php");
    
//}




     
      //}
?>


<!-- ==================================================================================================================== -->

<?php
require_once("userConfig.php");
session_start();




// // Check to see if we have some POST data, if we do process it
if ( isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['phone'])) {

    // Validate name
    $input_username = trim($_POST["username"]);
    if(empty($input_username)){
        $_SESSION['username_err2'] = "Please enter a name.";
    } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $_SESSION['username_err2'] = "Please enter a valid username";
    } 


    // Validate password
    $input_pass = trim($_POST["pass"]);
    if(empty($input_pass)){
        $_SESSION['pass_err2'] = "Please enter a password.";
    } elseif(!filter_var($input_pass, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $_SESSION['pass_err2'] = "Please enter a valid password.";
    } 

    
    // Validate phone
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $_SESSION['phone_err2'] = "Please enter a phone.";
    } elseif(!filter_var($input_phone, FILTER_SANITIZE_NUMBER_INT)){
        $_SESSION['phone_err2'] = "Please enter a valid phone.";
    }


    if( !empty($_SESSION['username_err2']) || !empty($_SESSION['pass_err2']) || !empty($_SESSION['phone_err2']) ){
      header("Location: tmpsignup.php");
    }else{
        try{
        $var1 = new userConfig();
        $var1->setUsername($_POST['username']);
        $var1->setPassword($_POST['pass']);
        $var1->setPhone($_POST['phone']);

        $isExisted = $var1->insertData();
        
        if($isExisted){
            $_SESSION['exist_err'] = "Username already exist";
            header("Location: tmpsignup.php");
        }else{
            $_SESSION['username'] = $var1->getUsername();
    
            if($_SESSION['username'] == 'admin'){
                header("Location: dashboard.php");
            }else{
                //Redirect the browser to game.php
                header("Location: menu.php");
            }
        }

      
        }catch(Exception $e){
            // $_SESSION['exist_err'] = "Username already exist";
            // header("Location: tmpsignup.php");
            $e->getMessage();
        }
        
    }
  
      }
?>