<?php
//session_start();
//$_SESSION["userid"]
//SELECT * FROM `order_details` WHERE `username` ='pk' order by `timestamp` desc;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>last order</title>
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript">
	window.print();
</script>
</head>
<body>
	<?php 
session_start();
include 'config.php';?>
	<?php
//$conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system") or die("Connection Error: " . mysqli_error($conn));
$username=$_SESSION['userid'];
$sql="SELECT * FROM `order_details` WHERE `username` ='$username' order by `timestamp` desc";
$res=mysqli_query($conn,$sql);
if($data= mysqli_fetch_array($res))
{
	
	 $uname=$data['username'];
    $ts=$data['timestamp']; 
    $oid=$data['Bill'];
    

}
?>
<?php
// Set the new timezone
//date_default_timezone_set('Asia/Kolkata');
?>
	<?php

	echo "<div id='div1' class='container'>";
echo "<table class='table table-bordered'  >";
echo "<tr >"; 
echo "<td  >".'Name'."</td>" ;
echo "<td style='color:red' colspan='2' >".$_SESSION["userid"]."</td>" ;
echo"</tr>";
echo "<tr>";
echo "<td>".'Date & Time' . "</td>";
echo "<td style='color:red' colspan='2'>".$data['timestamp'] . "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>".'Bill No' . "</td>";
echo "<td style='color:red' colspan='2'>".$oid . "</td>";
echo "</tr>";

echo "<tr>

<th>Item name</th>
<th>Quantity</th>




</tr>";



$sql1="SELECT * FROM `order_details` WHERE `location`='home' AND `username` ='$uname' AND `timestamp`='$ts' ";
$res1=mysqli_query($conn,$sql1);
if ($res1->num_rows > 0) {
while($data1= mysqli_fetch_array($res1))
{


	  echo "<tr>";

  echo "<td align='center'>" . $data1['item_name'] . "</td>";

  echo "<td align='center'>" . $data1['item_qty'] . "</td>";
   
     echo "</tr>";
    
	}
}else{
	echo  "no data";
	header("Location: list_items.php");
}

 echo "<tr align='center'>";

echo "<td colspan='2' algin='center'>";
echo "<b>You Are Ordered From Home</b>";
echo "</td>";
// echo "<td colspan='2' align='center' style='color:green;' id='totalcheck'>".$total."</td>";
echo "</tr>";
echo "</table>";
echo "</div>";

?>
</body>
</html>