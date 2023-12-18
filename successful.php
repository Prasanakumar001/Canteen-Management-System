<?php 
//session_start();
include 'config.php';?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>payment success</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
   <!--  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
 -->
    <!-- Main CSS-->
    <!-- <link href="css/main.css" rel="stylesheet" media="all"> -->
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">

					<?php
session_start();

$username=$_SESSION['userid'];
$sql12="SELECT * FROM `order_details`  order by `timestamp` desc";
$res12=mysqli_query($conn,$sql12);
$billno=1;
if($data12= mysqli_fetch_array($res12))
{
    
   //  $uname=$data['username'];
    $billno=$data12["Bill"];
    $billno++;

}


if(isset($_POST['submit'])){
    $location=$_POST['location'];
  
}
if(empty($location)){
    $location="canteen";
}

if($_SESSION["Page_NO"]==1)
{

	
    echo "<center>";




    foreach($_SESSION["order_details"] as $key=>$val) {
		if($val>0)
				{
        //$result= mysqli_query($conn," insert into order_details(username,item_name,item_qty,d_address) values('".$_SESSION["userid"]."','$key','$val','".$_SESSION["delivery_add"]."')");
         $result= mysqli_query($conn," insert into order_details(username,item_name,item_qty,location,Bill,Total) values('".$_SESSION["userid"]."','$key','$val','$location','$billno','".$_SESSION["total_bill"]."' )");
        

         $res= mysqli_query($conn,"update food_items set `stock`=stock-'$val' where item_name='$key'");
				}
    }

	$result = mysqli_query($conn," select credit_amount from user where username= '" . $_SESSION["userid"] . "' ");
	$temp=0;


    while($row = mysqli_fetch_assoc($result)) {
         $temp=$row["credit_amount"] ;
    }

	$temp= $temp - $_SESSION["total_bill"];


   $result = mysqli_query($conn," update user SET credit_amount=$temp where username= '" . $_SESSION["userid"] . "' ");

	echo " order placed successfully  " ;
	echo "<br>";
$result = mysqli_query($conn," select credit_amount from user where username= '" . $_SESSION["userid"] . "' ");

	if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
        echo " The current balance is " . $row["credit_amount"]. " ";
    }
} else {
    echo "0 results";
}
$_SESSION["Page_NO"]=2;
}




?>




                        <div class="p-t-15">

                          <a href= "order.php">  <button class="btn btn-outline-warning" >Order Again</button></a> &nbsp;
							<a href= "list_items.php"><button class="btn btn-outline-primary" >HomePage</button></a>
                        </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>



</html>
<!-- end document-->
