<?php
    session_start();
    class userConfig{

        private $user_id;
        private $username;
        private $password;
        private $phone;
        private $passwordLog;
        protected $pdo;

        public function __construct($user_id=0, $username="", $password="", $phone="", $passwordLog="" )
        {
            $this->user_id = $user_id;
            $this->username = $username;
            $this->password = $password;
            $this->phone = $phone;
            $this->passwordLog = $passwordLog;

            $this->pdo = new PDO('mysql:host=localhost;port=3306 ;dbname=agd','root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        // setter function
        public function setUserId($user_id){
            $this->user_id = $user_id;
        }

        public function setUsername($username){
            $this->username = $username;
        }

        public function setPassword($password){
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
        public function setPasswordLogin($passwordLog){
            $this->passwordLog = $passwordLog;
        }

        public function setPhone($phone){
            $this->phone = $phone;
        }

        // getter function
        public function getUserId(){
            return $this->user_id;
        }

        public function getUsername(){
            return $this->username;
        }

        public function getPassword(){
            return $this->password;

        }

        public function getPasswordLog(){
            return $this->passwordLog;

        }



        public function getPhone(){
            return $this->phone;
        }

        public function insertData(){

            // mesti guna ni utk check connection die
            try{
                //check useername exist
                 $query = "SELECT username FROM `users` WHERE username = :username";
                 $stmt = $this->pdo->prepare($query);
                 $stmt->execute(array(
                    ':username' => $this->username
                    ));

                 //user existed
                 if($stmt->rowCount() >= 1){
                    return true;
                 }else{
                    $sql = "INSERT INTO users (username, password, phone) VALUES (:username, :password, :phone)";
                    $stm = $this->pdo->prepare($sql);
                    $stm->execute(array(
                    ':username' => $this->username,
                    ':password' => $this->password,
                    ':phone' => $this->phone
                    ));
                    return false;
                 }

                // 
                
            }catch(Exception $e){
                return $e->getMessage();

            }

        }

        public function update(){
            try{
                $sql = "UPDATE users SET  password = :password, phone = :phone WHERE username = :username";
                $stm = $this->pdo->prepare($sql);
                $stm->execute(array(
                    ':password' =>$this->password,
                    ':phone' =>$this->phone,
                    ':username'=>$this->username
                ));

            }catch(Exception $e){
                return $e->getMessage();
            }
        }

        public function delete(){
            try{
                $sql = "DELETE FROM users WHERE user_id = :user_id";
                $stm = $this->pdo->prepare($sql);
                $stm->execute(array(
                    ':user_id' => $this->user_id
                ));
                // lepas delete mesti nak display yang asalkan
                return $stm->fetchAll();
            }catch(Exception $e){
                return $e->getMessage();
            }
        }

        public function checkUser() {

            $query = "SELECT password FROM users WHERE username = :username";  
            $statement = $this->pdo->prepare($query);  
            $statement->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($this->getUsername());

            if($statement->execute()){
                if($statement->rowCount() == 1){
                    if($row = $statement->fetch(PDO::FETCH_ASSOC)){ 
                        $password = $row['password'];
                        //$password_input = password_hash($password_input, PASSWORD_DEFAULT);
                        if(password_verify($this->getPasswordLog(),$password)){
                            return true;
                        }else{
                            return false;
                        }
                    }
                }
            }

        }
    }

?>