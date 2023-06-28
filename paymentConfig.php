<?php
    session_start();
    class paymentConfig{

        private $order_id;
        private $status;
        private $menu_id;
        private $username;
        private $date;
        private $quantity;
        protected $pdo;

        public function __construct($order_id="", $status="", $menu_id="", $username="", $date="", $quantity="")
        {
            $this->order_id = $order_id;
            $this->status = $status;
            $this->menu_id = $menu_id;
            $this->username = $username;
            $this->date = $date;
            $this->quantity = $quantity;

            $this->pdo = new PDO('mysql:host=localhost;port=3306 ;dbname=agd','root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        // setter function
        public function setOrderId($order_id){
            $this->order_id = $order_id;
        }

        public function setUsername($username){
            $this->username = $username;
        }

        public function setMenuId($menu_id){
            $this->menu_id = (int)$menu_id;
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function setDate($date){
            $this->date = $date;
        }

        public function setQuantity($quantity){
            $this->quantity = (int)$quantity;
        }

        // getter function
        public function getOrderId(){
            return $this->order_id;
        }

        public function getUsername(){
            return $this->username;
        }

        public function getMenuId(){
            return $this->menu_id;

        }

        public function getStatus(){
            return $this->status;
        }

        public function getDate(){
            return $this->date;
        }

        public function getQuantity(){
            return $this->quantity;
        }

        public function insertOrder(){

            // mesti guna ni utk check connection die
            try{
                $sql = "INSERT INTO orders VALUES (:order_id, :status)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(array(
                    ':order_id' => $this->order_id,
                    ':status' => $this->status));
            }catch(Exception $e){
                return $e->getMessage();
            }

        }

        public function insertOrderMenu() {

            // mesti guna ni utk check connection die
            try{
                $sql = "INSERT INTO order_menu_users VALUES (:order_id, :menu_id, :username, (SELECT curdate()), :quantity)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(array(
                    ':order_id' => $this->order_id,
                    ':menu_id' => $this->menu_id,
                    ':username' => $this->username,
                    ':quantity' => $this->quantity));
            }catch(Exception $e){
                return $e->getMessage();
            }

        }

        /*public function fetchall(){
            try{
                $stm = $this->pdo->prepare("SELECT username, phone, password FROM users");
                $stm->execute();
                while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                    echo $row['username'];
                    echo $row['password'];
                    echo $row['phone'];
                }
                return $stm->fetchAll();


            }catch(Exception $e){
                return $e->getMessage();
            }
        }

        public function fetchOrderMenu(){
            try{

                $sql = "SELECT * FROM order_menu_users";
                $stm = $this->pdo->query($sql);
                return $stm->fetchAll();

            }catch(Exception $e){
                return $e->getMessage();
            }
        }

        public function fetchOne(){
            try{
                $sql = "SELECT * FROM users WHERE user_id = :user_id";
                $stm = $this->pdo->prepare($sql); //prepare method akan return statement object
                $stm->execute(array(
                    ':user_id'=> $this->user_id
                ));
            }catch(Exception $e){
                return $e->getMessage();
            }
        }

        public function update(){
            try{
                $sql = "UPDATE users SET username = :username, password = :password, phone = :phone";
                $stm = $this->pdo->prepare($sql);
                $stm->execute(array(
                    ':username'=>$this->username,
                    ':password' =>$this->password,
                    ':phone' =>$this->phone
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

        public function checkUser($username, $password_input) {

            $query = "SELECT password FROM users WHERE username = :username";
            $statement = $this->pdo->prepare($query);
            $statement->bindParam(":username", $param_username, PDO::PARAM_STR);
            $param_username = trim($username);

            if($statement->execute()){
                if($statement->rowCount() == 1){
                    if($row = $statement->fetch(PDO::FETCH_ASSOC)){
                        $password = $row['password'];
                        $_SESSION['passsssssss'] = $password_input;
                        if(password_verify($password_input,$password)){
                            return false;
                        }else{
                            return true;
                        }
                    }
                }
            }

        }*/

    }

?>
