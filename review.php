<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Review Management</title>
		  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
	th,tr,th,td{
		text-align: center;
	}
</style>
</head>
<body>
<div class="container">
    <center><h2>Reviews</h2></center>
    <table class="table table-bordered">
    	<th>Name</th>
    	<th>Comment</th>
    	<th>Action</th>

   <?php 
   include 'config.php';
    $sql2="select * from review";
    $resss=mysqli_query($conn,$sql2);
    if (mysqli_num_rows($resss) > 0) {
    while($data1=mysqli_fetch_array($resss)){
        ?>
        <tr>
        <td><?php echo $data1['name'];?></td>
        <td><?php echo $data1['comment'];?></td>
        <td>
        <a class="btn btn-outline-warning" href="deletereview.php?username=<?php echo $data1['id']?>"  onclick="return confirm('sure');">Delete</a>
        </td>
    </tr>
        <?php
    }}else{
        echo "<center>No review Found </center>";
    }
   ?>

</table>



</div>
</body>
</html>