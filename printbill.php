
       <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>
<style type="text/css">
    table

{

border-style:solid;

border-width:2px;

border-color:pink;

}
th,td,tr{
    
    text-align: center;
}


</style>
<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    
                    <?php
session_start();
echo "<table class='table table-bordered'>";
echo "<tr>"; 
echo "<td >".'Name'."</td>" ;
echo "<td colspan='2'>".$_SESSION["userid"]."</td>" ;
echo"</tr>";
echo "<tr>";
//echo "<td>";
echo "<td>".'Date' . "</td>";
echo "<td colspan='2'>".date("d/m/y") . "</td>";

echo "</tr>";
echo "<tr>";
echo "<td>".'Time' . "</td>";
echo "<td colspan='2'>".date("h:i:s A") . "</td>";
echo "</tr>";
echo "<tr>
<th>Item name</th>
<th>Quantity</th>
<th>Price</th>



</tr>";

$total =0;
$_SESSION["Page_NO"]=1;
$_SESSION["Bal"]=0;
$_SESSION["Bill"]=0;
$most="";
$conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system") or die("Connection Error: " . mysqli_error($conn));
foreach($_POST as $x => $x_value) {
$temp = str_replace("_"," ","$x");

$age[$temp] = $x_value;
}
foreach($age as $x => $x_value) {
//echo "Key=" . $x . ", Value=" . $x_value;
$result = mysqli_query($conn," select price,item_name  from food_items  where item_name='" . $x . "'");
//echo "<center>";
 // $_SESSION["delivery_add"]="na";
//echo "<table style='border:1px solid black;'>";

while($row = mysqli_fetch_assoc($result))
{   
    $item_name=$row["item_name"];
    $cost=$row["price"];
 

   $most=intval($cost) * intval($x_value);
  
  if($most==0){
   
    echo $most="";
 }else{
      echo "<tr>";

  echo "<td align='center'>" . $row["item_name"] . "</td>";
  echo "<td align='center'>" . $x_value . "</td>";
  echo "<td align='center'>" . $most . "</td>";
   
     echo "</tr>";
 

  }
  $total  = $total + ( intval($cost) * intval($x_value));
}

//if($x =='delivery')
//{
  //$_SESSION["delivery_add"]=$x_value;
//}
}
 


$_SESSION["order_details"] = $age;
$_SESSION["total_bill"] = $total;
echo "<tr>";

echo "<td>";
echo "Total";
echo "</td>";
echo "<td colspan='2' align='center'>".$total."</td>";
echo "</tr>";
echo "</table>";
echo "<center>";
echo "Total for the amount is  $total ";
echo "<br>";
$temp;
    $result = mysqli_query($conn," select credit_amount from user where username= '" . $_SESSION["userid"] . "' ");
  if (mysqli_num_rows($result) > 0) {

    while($row = mysqli_fetch_assoc($result)) {
        echo " The current balance is " . $row["credit_amount"]. " ";
        echo "<br>";
        echo "<br>";

        $temp = $row["credit_amount"];
        if($temp < $total)
        {
        $_SESSION["Bal"]=$row["credit_amount"];
        $_SESSION["Bill"]=$total;
        header("Location: /dbms/unsuccessful.php");
        }

    }


}
 ?>
                    
                      
                        
                        
                        <div class="p-t-15">
                        
                          <a href ="successful.php">  <button class="btn btn-outline-warning" >Confirm</button></a> &nbsp;
                            <a href='order.php'><button class="btn btn-outline-success" >Go Back</button></a>
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