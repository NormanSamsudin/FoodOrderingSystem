<?php
session_start();
$total = null;

$nameList = array();
$priceList = array();
$order = array();

if(file_exists("order.txt")) {
  //Append menu name
  $myfile = fopen("name.txt", "r") or die("Unable to open file!");
  // Output one line until end-of-file
  while(!feof($myfile)) {
    array_push($nameList, fgets($myfile));
  }
  fclose($myfile);

  //Append price
  $myfile = fopen("price.txt", "r") or die("Unable to open file!");
  // Output one line until end-of-file
  while(!feof($myfile)) {
    array_push($priceList, fgets($myfile));
  }
  fclose($myfile);

  //open order file to read previous order menu
  $file = fopen("order.txt", "r") or die("Unable to open file!");

  // store the previous order menu in order array
  while(!feof($file)) {
    array_push($order, fgets($file));
  }
  fclose($file);

  //open ordere file to write previous order menu without total value
  $file = fopen("order.txt", "w") or die("Unable to open file!");

  //overwrite the previous order into order file
  (int)$total = $order[count($order)-1];
  for($i=0; $i<count($order)-1; $i++) {
    $txt = $order[$i];
    fwrite($file, $txt);
  }
  fclose($file);

  //append new order with previous order
  $file = fopen("order.txt", "a") or die("Unable to open file!");
  $myfile = fopen("menuId.txt", "a") or die("Unable to open file!");

  for($i=0; $i<12; $i++) {
    if($_POST['quantity'.$i] > 0) {
      $txt = $nameList[$i];
      fwrite($file, $txt);
      $txt = $_POST['quantity'.$i]."\n";
      fwrite($file, $txt);
      $subtotal = (int)$priceList[$i]*(int)$_POST['quantity'.$i];
      $total+= $subtotal;
      $txt = $subtotal."\n";
      fwrite($file, $txt);
      $txt = $i + 1 ."\n"; //menuId
      fwrite($myfile, $txt);
    }
  }

  fwrite($file, $total);
  fclose($file);
  fclose($myfile);
  header('Location: payment.php');
  return;
}

else {
//Append menu name
$myfile = fopen("name.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  array_push($nameList, fgets($myfile));
}
fclose($myfile);

//Append price
$myfile = fopen("price.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  array_push($priceList, fgets($myfile));
}
fclose($myfile);

//Check quantity
$file = fopen("order.txt", "a") or die("Unable to open file!");
$myfile = fopen("menuId.txt", "a") or die("Unable to open file!");

for($i=0; $i<12; $i++) {
  if($_POST['quantity'.$i] > 0) {
    $txt = $nameList[$i];
    fwrite($file, $txt);
    $txt = $_POST['quantity'.$i]."\n";
    fwrite($file, $txt);
    $subtotal = (int)$priceList[$i]*(int)$_POST['quantity'.$i];
    $total+= $subtotal;
    $txt = $subtotal."\n";
    fwrite($file, $txt);
    $txt = $i + 1 ."\n"; //menuId
    fwrite($myfile, $txt);
  }
}

fwrite($file, $total);
fclose($file);
fclose($myfile);
header('Location: payment.php');
return;
}

/*if(isset($_POST['name'])) {
  unlink("order.txt");//unlink dekat payment page
  header('Location: test.php');
  return;
}


if(!isset($_POST['name'])) {
  $file = fopen("order.txt", "a") or die("Unable to open file!");
  while($a<3) {
  $text = "Ayam Geprek ";
  fwrite($file, $text);
  $text = "10.00 ";
  fwrite($file, $text);
  $text = "2\n";
  fwrite($file, $text);
  $a++;
  }
  fclose($file);
  header('Location: test.php');
  return;
}*/


?>
