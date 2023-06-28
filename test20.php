<?php
$list = array();

$myfile = fopen("menu.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  array_push($list, fgets($myfile));
}
fclose($myfile);

echo count($list);
print_r($list);
echo $list[0];


?>
