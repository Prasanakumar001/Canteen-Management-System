<?php 
session_start();
include 'config.php';?>
<?php
//session_start();
$total =0;
$_SESSION["Page_NO"]=1;
//$conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system") or die("Connection Error: " . mysqli_error($conn));
$result = mysqli_query($conn," update food_items set include=0,stock=0 where 1");
foreach($_POST as $x => $x_value) {
$temp = str_replace("_"," ","$x");

$age[$temp] = $x_value;
if($x_value=="on"){
$result = mysqli_query($conn," update food_items set include=1,stock=0 where item_name='" . $temp . "'");
header('location:include_food.php');
}


}







 ?>

