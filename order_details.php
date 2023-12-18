<?php
session_start();


?>

<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title></title>
<style type="text/css">
  tr,th,td{
    text-align: center;
  }
</style>
    <style type="text/css">
        .content{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: -1;
  width: 100%;
  padding: 0 30px;
  color: #1b1b1b;
}
.content div{
  font-size: 32px;
  font-weight: -700;
}


.watermark {
    opacity: 0.6;
    text-align: center;
    color: BLACK;
    position: fixed;
    display: flex;
    bottom: 10px;
    right: 10px;
    flex: 1;
    justify-content: center;
    align-items: center;
    text-transform: uppercase;
}

    </style>
</head>
<body style="background:ghostwhite;">
    <div class="watermark">
           <i><u>  <?php echo $_SESSION["userid"];?></u></i>
    </div>
  <div class="contnt">
   <div class="container" style="background: rgba(255, 255, 255, 0.6);border-radius: 25px;text-align: center;margin-top: 10px;margin-bottom: 10px;padding-bottom: 10px;padding-top: 10px;">
<div id="div1"  style="margin-top: 5px;border-radius: 15px;padding-top: 15px;">
 
<!-- <table  class="table  table-primary table-striped" style="margin-top: 15px;border-radius: 15px;">

<tr>
<th>Item_name</th>
<th>QTY</th>
<th>Time</th>
<th>Bill No</th>
<th>Location</th>
</tr> -->
<?php 
//session_start();
include 'config.php';?>
<?php
//$conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system");
// Check connection
//if ($conn->connect_error) {
//die("Connection failed: " . $conn->connect_error);

$sql = "SELECT *  FROM order_details where Status='0' and username= '" . $_SESSION["userid"] . "' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
   echo "<table  class='table  table-warning table-striped'  style='margin-top: 15px;border-radius: 15px;'>";

echo "<tr>";
echo "<th>";
echo "Item_name";
echo "</th>";
echo "<th>";echo "Quantity";
echo "</th>";
echo "<th>";echo "Amount";
echo "</th>";
echo  "<th>";
echo "Time";
//echo"</th>";
//echo "Date" ;
//echo "</th>";
echo "<th>";
echo "Bill No";
echo "</th>";
echo "<th>";echo "Location";echo "</th>";
echo "</tr>";
while($row = $result->fetch_assoc()) {
  $temp1 = substr($row["timestamp"],11,9);
echo "<tr><td>" . $row["item_name"]. "</td><td>".$row["item_qty"]."</td><td>".$row["Total"]."</td><td>".$temp1."</td>";
echo "<td>" . $row["Bill"]. "</td><td>".$row["location"]."</td></tr>";
}
echo "</table>";
} else { echo "NO ORDERS FOUND"; }
$conn->close();
?>
</table>
</div>

<div id="div2" style="display: none;margin-top: 5px;border-radius: 15px;padding-top: 15px;">

<?php
$conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT *  FROM order_details where username= '" . $_SESSION["userid"] . "' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
  echo "<table  class='table  table-success table-striped'  style='margin-top: 15px;border-radius: 15px;'>";

echo "<tr>";
echo "<th>";
echo "Item_name";
echo "</th>";
echo "<th>";echo "Quantity";
echo "</th>";
echo "<th>";echo "Amount";
echo "</th>";
echo  "<th>";
echo "Time";
echo"</th>";
echo "<th>";
echo "Date" ;
echo "</th>";
echo "<th>";
echo "Bill No";
echo "</th>";
echo "<th>";echo "Location";echo "</th>";
echo "</tr>";
while($row = $result->fetch_assoc()) {
  $temp1 = substr($row["timestamp"],11,9);
  $temp2= substr($row["timestamp"],0,10);
echo "<tr><td>" . $row["item_name"]. "</td><td>".$row["item_qty"]."</td><td>".$row["Total"]."</td><td>".$temp1."</td><td>".$temp2."</td>";
echo "<td>" . $row["Bill"]. "</td><td>".$row["location"]."</td></tr>";
}
echo "</table>";
} else { echo "NO ORDERS FOUND"; }
$conn->close();
?>



</table>

</div>
</div>
<center>
<!--  <button onclick="fun1()" id="but1" style=" display: inline-block;" class="btn btn-warning" > All order details</button>
  <button onclick="fun2()" id="but2" style="display: none;" class="btn btn-danger"> Ongoing order details</button> -->
</center>

 

  <script>
    function fun1()
    {
      document.getElementById("div1").style.display = "none";
      document.getElementById("div2").style.display = "inline";
      document.getElementById("but1").style.display = "none";
      document.getElementById("but2").style.display = "inline";
    }
    function fun2()
    {
      document.getElementById("div2").style.display = "none";
      document.getElementById("div1").style.display = "inline";
      document.getElementById("but2").style.display = "none";
      document.getElementById("but1").style.display = "inline";
    }
  </script>
</div>

</body>
</html
