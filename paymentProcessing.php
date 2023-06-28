<?php
require_once("paymentconfig.php");

/*if(isset($_SESSION['username'])) {

  header('Location: index.php?username='. $_SESSION['username']);
  return;}*/

$list = array();
$qttList = array();
/*$date = date_create("",timezone_open("Asia/Kuala_Lumpur"));
date_format($date,"Y-m-d");*/

$var = new paymentConfig();
$var->setOrderId($_SESSION['orderid']);
$var->setStatus("Pending");
$var->insertOrder();

$myfile = fopen("menuId.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  array_push($list, fgets($myfile));
}
fclose($myfile);

$myfile = fopen("order.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  array_push($qttList, fgets($myfile));
}
fclose($myfile);

$size = count($list) - 1;
for($i=0,$j=1; $i<$size; $i++,$j+=3) {
  $var->setMenuId($list[$i]);
  $var->setUsername($_SESSION['username']);
  $var->setQuantity($qttList[$j]);
  $var->insertOrderMenu();
}

if($_GET['payType'] == 'cash') {
  unlink("menuId.txt");
  unlink("order.txt");
  header('Location: paymentCashier.php');
  return;
}

else if($_GET['payType'] == 'qr') {
  unlink("menuId.txt");
  unlink("order.txt");
  header('Location: paymentQR.php');
  return;
}

else {
  unlink("menuId.txt");
  unlink("order.txt");
  header('Location: paymentBank.php');
  return;
}

/*if(isset($_POST('paid'))){
    $_SESSION['menuConfirmed'];
    $_SESSION['qttConfirmed'];
    $_SESSION['priceConfirmed'];

    if(isset($_SESSION['menuConfirmed']) && isset($_SESSION['qttConfirmed']) && isset($_SESSION['priceConfirmed'])){

        $rannum1 = "asdasdasd";
        $rannum1 = "asdasdasd";
        $rannum1 = "asdasdasd";


        //primary key order id
        $query1 = "INSERT INTO `orders`(`status`) VALUES (':status')";
        $sql = "INSERT INTO assessmentmark VALUES (:student_id, :test1, :lab_test, :lab_assignment, :group_project, :final_examination, :total, :grade)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':student_id' => $_POST['student_id'],
            ':test1' => $_POST['test1'],
            ':lab_test' => $_POST['lab_test'],
            ':lab_assignment' => $_POST['lab_assignment'],
            ':group_project' => $_POST['group_project'],
            ':final_examination' => $_POST['final_examination'],
            ':total' => $totals,
            ':grade' => $grade));

        //foreign key order id
        $query2 = "INSERT INTO `order_menu_users`(`order_id`, `menu_id`, `username`, `date`, `quantity`) VALUES (':order_id',':menu_id',':username',':date',':quantity')";





    }

}else{

}*/

?>
