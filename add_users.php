<?php
session_start();
include 'config.php';
?>
<?php


$message="";
if(count($_POST)>0) {
	// $conn = mysqli_connect("localhost","root","","canteen_delivery_system");
	// 	if (mysqli_connect_errno())
 //  {
 //  echo "Failed to connect to MySQL: " . mysqli_connect_error();
 //  }
		$result = mysqli_query($conn," insert into user values ('" . $_POST["userName"] . "','" . $_POST["password"] . "','" . $_POST["privilage"] . "','0','" . $_POST["userName2"] . "')");

	}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

</head>

<body>
    <div class="container">
     <h2 class="title">Enter User Details</h2>
    <form  name="frmUser" method="post" >
          <div class="mb-3 ">
    <label for="exampleInputPassword1" class="form-label">rollno</label>
    <input  class="form-control"  type="text" name="userName"  required>
  </div>
  <div class="mb-3 ">
    
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text" name="userName2"  class="form-control" required>
    <div id="emailHelp" class="form-text"><?php if($message!="") { echo $message; } ?></div>
  </div>

  <div class="mb-3 ">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input  class="form-control"  type="password" name="password" required>
  </div>
  <div class="mb-3 ">
 
 <label for="exampleInputEmail1" class="form-label">TYPE</label>
   <select name="privilage" class="form-control" required>
       <option value="0">Student</option>
         <option value="1">Admin</option>

   </select>
  </div>
  <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
</form>
   </div>



</html>
<!-- end document-->
