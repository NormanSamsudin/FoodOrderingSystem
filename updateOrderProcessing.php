<?php
session_start();
require_once('pdo.php');
try{
    if (isset($_GET['order_id']))
    {
        $sql = "UPDATE orders SET status = 'Paid' WHERE order_id = :order_id";
        $stm = $pdo->prepare($sql);
        $stm->execute(array(
                ':order_id' => $_GET['order_id']
            ));
        header("Location: dashboard.php?" . $_GET['order_id']);
    }else{
        header("Location: dashboard.php");
    }
}catch(Exception $e){
    $e->getMessage();
}

?>