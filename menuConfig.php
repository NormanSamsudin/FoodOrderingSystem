<?php
    // require_once "/Yummy/Yummy/pdo/pdo.php";

    class menuConfig{

        private $menu_id;
        private $menu_type;
        private $name;
        private $price;
        protected $pdo;

        public function __construct($menu_id, $menu_type, $name, $price)
        {
            $this->menu_id = $menu_id;
            $this->menu_type = $menu_type;
            $this->name = $name;
            $this->price = $price;

            // initiate connection with database
            $this->pdo = new PDO('mysql:host=localhost;port=3306 ;dbname=ayam_geprek_dahsyat','fred', 'zap');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }

        //setter
        public function setMenuId($menu_id){
            $this->menu_id = $menu_id;
        }

        public function setMenuType($menu_type){
            $this->menu_type = $menu_type;
        }

        public function setName($name){
            $this->name = $name;
        }

        public function setPrice($price){
            $this->price = $price;
        }

        //getter
        public function getMenuId(){
            return $this->menu_id;
        }

        public function getMenuType(){
            return $this->menu_type;
        }
        public function getName(){
            return $this->name;
        }
        public function getPrice(){
            return $this->price;
        }
        
        //tak perlu lagi sbb menu kita masukkan dalam database pakai php myadmin jer
        public function insertData(){

        }

        //fetch by menu_type
        public function fetchByMenuType(){
            try{
                $sql = "SELECT * FROM menu WHERE menu_type = :menu_type";
                $stm = $this->pdo->prepare($sql);
                $stm->execute(array(
                    ':menu_type' => $this->menu_type
                ));

            }catch(Exception $e){
                return $e->getMessage();
            }
        }

        


    }
?>