<?php
require "DBController.php";
class Auth {
    function getMemberByUsername($username) {
        $db_handle = new DBController();
        $query = "Select * from users where username = :username";
        $array = array('username' => $username);
        $typeArray = array('username' => PDO::PARAM_STR);
        $result = $db_handle->runQuery($query, $array, $typeArray);
        return $result;
    }
    
	function getTokenByUsername($username,$expired) {
	    $db_handle = new DBController();
	    $query = "Select * from tbl_token_auth where username = :username and is_expired = :is_expired";
	    $array = array('username' => $username, 'is_expired' => $expired);
        $typeArray = array('username' => PDO::PARAM_STR, 'is_expired' => PDO::PARAM_BOOL);
        $result = $db_handle->runQuery($query, $array,$typeArray);
	    return $result;
    }
    
    //done
    function markAsExpired($tokenId) {
        $db_handle = new DBController();
        $query = "UPDATE tbl_token_auth SET is_expired = :is_expired WHERE id = :id";
        $expired = 1;
        $array = array('is_expired' => $expired, 'id' => $tokenId);
        $typeArray = array('is_expired' => PDO::PARAM_INT, 'id' => PDO::PARAM_INT);
        $result = $db_handle->update($query, $array, $typeArray);
        return $result;
    }
    
    //done
    function insertToken($username, $random_password_hash, $random_selector_hash, $expiry_date) {
        $db_handle = new DBController();
        $query = "INSERT INTO tbl_token_auth (username, password_hash, selector_hash, expiry_date) values (:username, :password_hash, :selector_hash, :expiry_date)";
        $array = array('username'=> $username, 'password_hash' => $random_password_hash, 'selector_hash' => $random_selector_hash, 'expiry_date' => $expiry_date);
        $typeArray = array('username'=> PDO::PARAM_STR, 'password_hash' => PDO::PARAM_STR, 'selector_hash' =>  PDO::PARAM_STR, 'expiry_date' => PDO::PARAM_INT);
        $result = $db_handle->insert($query, $array, $typeArray);
        return $result;
    }
    

}

    /**
* ## EXEMPLE ##
* $array = array('language' => 'php','lines' => 254, 'publish' => true);
* $typeArray = array('language' => PDO::PARAM_STR,'lines' => PDO::PARAM_INT,'publish' => PDO::PARAM_BOOL);
* $req = 'SELECT * FROM code WHERE language = :language AND lines = :lines AND publish = :publish';
* You can bind $array like that :
* bindArrayValue($array,$req,$typeArray);
* The function is more useful when you use limit clause because they need an integer.
* */
?>

