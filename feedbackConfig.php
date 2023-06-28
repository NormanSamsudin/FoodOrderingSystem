<?php
        //require_once "/Yummy/Yummy/pdo/pdo.php";

        class feedbackConfig{

             
            private $subject;
            private $message;
            private $username;
            protected $pdo;

            //constructor
            public function __construct($subject="", $message="", $username=""){
                $this->subject = $subject;
                $this->message = $message;
                $this->username = $username;

                //initiate connection with database
                $this->pdo = new PDO('mysql:host=localhost;port=3306 ;dbname=agd','root', '');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            }

            //setter
            public function setSubject($subject){
                $this->subject = $subject;
            }

            public function setMessage($message){
                $this->message = $message;
            }

            public function setUsername($username){
                $this->username = $username;
            }

            //getter
            public function getSubject(){
                return $this->subject;
            }

            public function getMessage(){
                return $this->message;
            }

            public function insertData(){

                try{
                    $sql = "INSERT INTO feedbacks (subject, message) VALUES (:subject, :message)";
                    $stm = $this->pdo->prepare($sql);
                    $stm->execute(array(
                        ':subject' => $this->subject,
                        ':message' => $this->message
                    ));
                    
                }catch(Exception $e){
                    return $e->getMessage();
                }
    
            }

        }


?>