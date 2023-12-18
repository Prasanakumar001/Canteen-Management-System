<?php
session_start();
include 'config.php';
$total =0;
$_SESSION["Page_NO"]=1;
//$conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system") or die("Connection Error: " . mysqli_error($conn));
//$result = mysqli_query($conn," update food_items set include=0 where 1");
foreach($_POST as $x => $x_value) {
$temp = str_replace("_"," ","$x");

$age[$temp] = $x_value;
echo $temp;
echo $stock=$age[$temp];
//$tem=$_post['$temp'];
//if($x_value=="on"){
$result = mysqli_query($conn," update food_items set `stock`='".$stock."' where item_name='" . $temp . "'");
header('location:include_food.php');
//}


}







 ?>