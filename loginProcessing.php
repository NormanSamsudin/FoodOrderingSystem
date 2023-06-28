<?php 
session_start();
try  { 
    // make conection
    require_once("userConfig.php");


         
            // kalau username and password empty
           if(isset($_POST["username"]) && isset($_POST["password"]))  
           {

                // Validate name
                $input_username = trim($_POST["username"]);
                if(empty($input_username)){
                    $_SESSION['username_err2'] = "empty name";
                } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                    $_SESSION['username_err2'] = "username accept character only";
                } 


                // Validate password
                $input_pass = trim($_POST["password"]);
                if(empty($input_pass)){
                    $_SESSION['pass_err2'] = "empty password.";
                } elseif(!filter_var($input_pass, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                    $_SESSION['pass_err2'] = "password accept character only";
                } 



                if( !empty($_SESSION['username_err2']) || !empty($_SESSION['pass_err2']) ){
                    header("Location: tempLogin.php");
                }else{
                    
                $var1 = new userConfig();
                $var1->setUsername($_POST['username']);
                $var1->setPasswordLogin($_POST['password']);
                
                $statement = $var1->checkUser();

                if($statement)  
                {  
                    error_log("Login success " . $var1->getUsername() .  $var1->getPasswordLog());

                    if(isset($_POST['remember'])){
                        //set up cookie
                        setcookie("user", $var1->getUsername(), time() +  (86400 * 30));
                        setcookie("pass", $var1->getPasswordLog(), time() + (86400 * 30));
                    }
                    
                     $_SESSION["username"] = $var1->getUsername();
                     // redirect to menu.php
                     if($_SESSION['username'] == "admin"){
                        header("Location: dashboard.php");
                     }else{
                        header("Location: menu.php");
                     }
                     
                }  
                else  
                {  
                    error_log("Login failed " . $var1->getUsername() .  $var1->getPasswordLog());
                    $_SESSION['log_err2']= "Invalid Username or Password";
                     //$message = '<label>Invalid Username or Password</label>';
                     header("Location: tempLogin.php");
                }  
                }


           }  
        
 }  
 catch(PDOException $error)  
 {  
    header("Location: tempLogin.php");
    $message = $error->getMessage();  
 }  
 ?>  

<!-- ======================================================================== -->

<?php
// session_start();

// require_once "/xamppp/htdocs/Yummy/Yummy/cookies/Auth.php";
// require_once "/xamppp/htdocs/Yummy/Yummy/cookies/Util.php";


// $auth = new Auth();
// $db_handle = new DBController();
// $util = new Util();


// require_once "authCookieSessionValidate.php";

// if ($isLoggedIn) {
//     $util->redirect("menu.php");//asal dashboard.php
// }

// if(isset($_POST["username"]) && isset($_POST["password"]))   {
//     $isAuthenticated = false;
    
// //     $username = $_POST["username"];
// //     $password = $_POST["password"];

//     $var1 = new userConfig();
//     $var1->setUsername($_POST['username']);
//     $var1->setPassword($_POST['password']);
    
//     $statement = $var1->checkUser($var1->getUsername(), $var1->getPassword());
//     $user = $auth->getMemberByUsername($username);
    
//     if($statement){
//      $isAuthenticated = true;
//     }  
    
//     if ($isAuthenticated) {
//         $_SESSION["user_id"] = $user[0]["user_id"];
        
//         // Set Auth Cookies if 'Remember Me' checked
//         if (! empty($_POST["remember"])) {
//             setcookie("user_login", $username, $cookie_expiration_time);
            
//             $random_password = $util->getToken(16);
//             setcookie("random_password", $random_password, $cookie_expiration_time);
            
//             $random_selector = $util->getToken(32);
//             setcookie("random_selector", $random_selector, $cookie_expiration_time);
            
//             $random_password_hash = password_hash($random_password, PASSWORD_DEFAULT);
//             $random_selector_hash = password_hash($random_selector, PASSWORD_DEFAULT);
            
//             $expiry_date = date("Y-m-d H:i:s", $cookie_expiration_time);
            
//             // mark existing token as expired
//             $userToken = $auth->getTokenByUsername($username, 0);
//             if (! empty($userToken[0]["id"])) {
//                 $auth->markAsExpired($userToken[0]["id"]);
//             }
//             // Insert new token
//             $auth->insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date);
//         } else {
//             $util->clearAuthCookie();
//         }
//         $util->redirect("menu.php");//asal die dashboard.php
//     } else {
//         $message = "Invalid Login";
//         $util->redirect("tempLogin.php");
//     }
// }
?>