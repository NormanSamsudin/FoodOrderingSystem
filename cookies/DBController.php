<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "db_auth";
	private $conn;
	
    function __construct() {
        $this->conn = $this->connectDB();
	}	
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        $conn = new PDO('mysql:host=localhost;port=3306 ;dbname=cookies','root', '');
		return $conn;
	}
	
    function runBaseQuery($query) {
                // $result = mysqli_query($this->conn,$query);
                // while($row=mysqli_fetch_assoc($result)) {
                // $resultset[] = $row;
                // }		
                // if(!empty($resultset))
                // return $resultset;

                $result = $this->conn->prepare($query);
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $resultset[] = $row;
                }
                if(!empty($resultset)){
                    return $resultset;
                }
                    
    }
    
    
    
    function runQuery($query, $param_value_array, $typeArray) {
        
        $sql = $this->conn->prepare($query);
        // $this->bindQueryParams($sql, $param_type, $param_value_array);
        $this->bindArrayValue($param_value_array, $query,$typeArray);
        $sql->execute($param_value_array);
        // $result = $sql->get_result();
        
        if ($sql->rowCount() > 0) {
            while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                $resultset[] = $row;
            }
        }
        
        if(!empty($resultset)) {
            return $resultset;
        }
    }
    
    // function bindQueryParams($sql, $param_value_array) {
    //     $param_value_reference[] = & $param_type;
    //     for($i=0; $i<count($param_value_array); $i++) {
    //         $param_value_reference[] = & $param_value_array[$i];
    //     }
    //     call_user_func_array(array(
    //         $sql,
    //         'bind_param'
    //     ), $param_value_reference);
    // }

    function bindArrayValue($req, $array, $typeArray = false)
    {
        if(is_object($req) && ($req instanceof PDOStatement))
        {
            foreach($array as $key => $value)
            {
                if($typeArray)
                    $req->bindValue(":$key",$value,$typeArray[$key]);
                else
                {
                    if(is_int($value))
                        $param = PDO::PARAM_INT;
                    elseif(is_bool($value))
                        $param = PDO::PARAM_BOOL;
                    elseif(is_null($value))
                        $param = PDO::PARAM_NULL;
                    elseif(is_string($value))
                        $param = PDO::PARAM_STR;
                    else
                        $param = FALSE;
                       
                    if($param)
                        $req->bindValue(":$key",$value,$param);
                }
            }
        }
    }
    
    function insert($query, $param_value_array, $typeArray) {
        $sql = $this->conn->prepare($query);
        // $this->bindQueryParams($sql, $param_type, $param_value_array);
        $this->bindArrayValue($param_value_array, $query,$typeArray);
        $sql->execute($param_value_array);
    }
    
    function update($query, $param_value_array, $typeArray) {
        $sql = $this->conn->prepare($query);
        // $this->bindQueryParams($sql, $param_type, $param_value_array);
        $this->bindArrayValue($param_value_array, $query,$typeArray);
        $sql->execute($param_value_array);
    }
}
?>