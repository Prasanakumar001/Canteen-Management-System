<?php
session_start();
include 'config.php';
?>
<?php


$message="";
if(count($_POST)>0) {
	//$conn = mysqli_connect("localhost","root","","canteen_delivery_system");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	$a=$_POST['Faculty_name'];
	$sql="select * from user   where username='$a' ";
	$result = mysqli_query($conn,$sql);
	$row=mysqli_num_rows($result);

	if ($row ==0)
 {
		$message = "invalid user name\\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";
    

	}else{



	$current = mysqli_query($conn," select credit_amount from user where username='" . $_POST["Faculty_name"] . "'  ");
	$temp = $_POST['Credit_amount'];
	$row = mysqli_fetch_row($current);
	$base_pay = $row[0];
	$base_pay = $base_pay + $temp;
	$result = mysqli_query($conn," update user set credit_amount = $base_pay where username='" . $_POST["Faculty_name"] . "' ");
}



}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Title Page-->
    <title>Add Credit</title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
     <div class="container">
                   <h2 class="title">RECHARGE YOUR BALANCE</h2>

                <form name="Add_Item" method="post" >
                 <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Name</label>
                <input  class="form-control" type="text" name="Faculty_name" autofocus required >
                <div id="emailHelp" class="form-text"><?php if($message!="") { echo $message; } ?></div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Credit Amount</label>
                <input min="0" class="form-control" type="text" name="Credit_amount" pattern="[0-9]*" required>
              </div>
              
              <button type="submit" class="btn btn-primary"  value="Submit">Submit</button>
            </form>

</div>
    <div class="container" style="margin-top: 10px;padding: 10px;border: black 0.5px solid;">
        <form class="d-flex me-md-2"  method="get">
        <input class="form-control me-2 " type="text" placeholder="Search" name="Search_input" value="" list="datalistOptions1">
        <button class="btn btn-outline-success  me-md-2" name="Search" type="submit">Search</button>
        <datalist id="datalistOptions1"  >
           
                     <?php
       
         $records = mysqli_query($conn,"SELECT username from user  where `type`=0");

       
  while($data = mysqli_fetch_array($records))
        {
          ?>
  <option  value="<?php echo $data['username']; ?>"></option>

   

        <?php
        }

        ?>
    </datalist>
      </form>
      <!----------avoid mulitple data----------->
  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
    var found = [];
    $("datalist option").each(function() {
      if($.inArray(this.value, found) != -1) $(this).remove();
      found.push(this.value);

    });

   </script>
    <!----------avoid mulitple data----------->
  
<!-- <table class="table table-bordered">
    <th>Rollno</th>
    <th>Name</th>
    <th>Credit</th> -->
  <!--   <th>Action</th> -->
   <?php
          
 //$s1=" ";  
if(isset($_GET['Search'])){

  
$s1 = $_GET['Search_input'];
//echo $s1;
}
//echo $s1;
$i=0;
if(empty($s1)){
    $sql="SELECT * FROM `user`  WHERE `type`=0";
}else {
      
    $sql="SELECT * FROM `user`  WHERE   `type`=0 and username ='" . $s1 . "'  ";

 }
    $res=mysqli_query($conn,$sql);
     if($res->num_rows>0){    

  echo "<table style='margin: 10px;padding: 10px;' class='table table-bordered'>";

// echo"<th>";echo"<input type='checkbox' class='selectAll' />";echo"</th>";
echo"<th>";echo "Rollno";echo"</th>";
echo"<th>";echo"Name";echo"</th>";
echo"<th>";echo "Credit";echo "</th>";
//echo"<th>";echo "Amount";echo "</th>";
//echo"<th>";echo "Date & Time";echo "</th>";
//echo"<th>";echo "Location";echo "</th>";
    
    while($data= mysqli_fetch_array($res)){
        ?>
       <tr>
           <td><?php echo $data['username']?></td>
           <td><?php echo $data['username2']?></td>
           <td><?php echo $data['credit_amount']?></td>
        <!--    <td><a href="deleteuser.php?username=<?php echo $data['username']?>" class="btn btn-warning" onclick="return confirm('sure to Delete');">Delete</a></td> -->
       </tr>

        <?php
    }}else{
  echo "<table align='center'> <td style='text-align:center;font-size:24px;'>No data found<td></table>";
}


   ?>
</table>

</div>

</body>
   


</html>
<!-- end document-->
