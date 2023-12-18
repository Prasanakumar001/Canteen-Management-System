<?php 
session_start();
include 'config.php';?>
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
		$message = "invalid item name\\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";

	}

	$sql=" delete  from user  where  username='" . $_POST["Faculty_name"] . "' ";
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
    <title>Remove users</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</head>

<body>
    <div class="container">
                    <h2 class="title">Remove Users</h2>
                    <form name="Add_Item" method="post" action="">
					<div class="message"><?php if($message!="") { echo $message; } ?></div>

                        <div class="row ">
                        
                                
                                    <label class="label">User Name</label>
                                    <input class="form-control" type="text"name="Faculty_name" required>
                                
                            

                        </div>

                      <br>
                        
                            <button class="btn btn-warning btn-lg" type="submit" value="Submit"  onclick="return confirm('sure to Delete!');">Submit</button>
                    <br>
                    </form>
    </div>
    <div class="container" style="margin-top: 10px;padding: 10px;">
<table class="table table-bordered">
    <th>Rollno</th>
    <th>Name</th>
    <th>Credit</th>
    <th>Action</th>
   <?php
//$conn = mysqli_connect("localhost","root","","canteen_delivery_system");
        if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
    $sql="SELECT * FROM `user`  WHERE `type`=0";
    $res=mysqli_query($conn,$sql);
    
    while($data= mysqli_fetch_array($res)){
        ?>
       <tr>
           <td><?php echo $data['username']?></td>
           <td><?php echo $data['username2']?></td>
           <td><?php echo $data['credit_amount']?></td>
           <td><a href="deleteuser.php?username=<?php echo $data['username']?>" class="btn btn-warning" onclick="return confirm('sure to Delete');">Delete</a></td>
       </tr>

        <?php
    }

   ?>
</table>

</div>




</body>


</html>
<!-- end document-->
