<?php 
session_start();
include 'config.php';?>
<?php


$message="";
if(count($_POST)>0) {
	//$conn = mysqli_connect("localhost","root","","canteen_delivery_system");
		// if (mysqli_connect_errno())
  // {
  // echo "Failed to connect to MySQL: " . mysqli_connect_error();
  // }
	$a=$_POST['Item_Id'];
	$sql="select * from food_items  where item_name='$a' ";
	$result = mysqli_query($conn,$sql);
	$row=mysqli_num_rows($result);

	if ($row ==0)
 {
		$message = "invalid item name\\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";

	}

	$sql="delete from food_items  where item_name='$a' ";
	$result = mysqli_query($conn,$sql);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Title Page-->
    <title>Remove Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
</head>

<body>
    <div class="container">
                    <h2 class="title">Enter Item Details</h2>
                    <form name="Add_Item" method="post" action="">
					<div class="message"><?php if($message!="") { echo $message; } ?></div>
                        <div class="row ">
                            
                                    <label class="label">Item Name</label>
                                    <input class="form-control" type="text" name="Item_Id" required>
                              

                        </div>


                        <br>
                            <button class="btn btn-warning btn-lg" type="submit" value="Submit"  onclick="return confirm('sure to Delete!');">Submit</button>
                        <br>
                    </form>
         </div>       
     <div class="container" style="margin-top: 10px;padding: 10px;border: black 0.5px solid;">
<table class="table table-bordered">
    <th>Item Name</th>
    <th>Price</th>
    
    <th>Action</th>
   <?php
//$conn = mysqli_connect("localhost","root","","canteen_delivery_system");
        if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
    $sql="SELECT * FROM `food_items` ";
    $res=mysqli_query($conn,$sql);
    
    while($data= mysqli_fetch_array($res)){
        ?>
       <tr>
           <td><?php echo $data['item_name']?></td>
           <td><?php echo $data['price']?></td>
          <!--  <td><?php //echo $data['credit_amount']?></td> -->
           <td><a href="deleteitem.php?username=<?php echo $data['item_name']?>" class="btn btn-warning" onclick="return confirm('sure to Delete');">Delete</a></td>
       </tr>

        <?php
    }

   ?>
</table>

</div>


</body>

</html>
<!-- end document-->
