<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>update item</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<!-- Button trigger modal -->
 <div class="container" style="margin-top: 10px;padding: 10px;border: black 0.5px solid;">
<table class="table table-bordered">
    <th>Item Name</th>
    <th>Price</th>
    
    <th>Action</th>
   <?php
   include 'config.php';
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
           <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data['item_name'];?>">
  Update
</button>
</td>

       </tr>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $data['item_name'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!------------------->
                <form name="Update_Item" method="post" action="update.php?username=<?php echo $data['item_name']?>" enctype="multipart/form-data">
          <!--     <div class="mb-3">
                                           <label class="form-label">file name</label>
                                             <input class="form-control" type="file" name="image" value=" <?php //echo $data['image'];?>"><br>
                                             <input type="hidden" class="form-control" name="size" value="1000000" >
                                         </div> -->
                    <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Item Name</label>
                <input  name="Item_name" class="form-control"  value="<?php echo $temp=$data['item_name'];?>"required >
               
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Item Cost</label>
                <input type="number" min="1" class="form-control" pattern="[0-9]*" name="Item_cost"  value="<?php echo $data['price'];?>" required>
              </div>
              <div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" value="<?php echo $data['description']?>" name="des"><?php echo $data['description']?></textarea>
  <label for="floatingTextarea">Description</label>
</div>
<br>
<div class="mb-3">
 <select name="cat" class="form-control" required>
  <option value="<?php echo $data['cat']?>" style="color:green;"><?php echo $data['cat']?></option>
                 <option value="Breakfast">Breakfast</option><option value="BREAK(10.40)">BREAK(10.40)</option><option value="Lunch">Lunch</option><option value="Evening">evening</option>
               </select>
            </div>









        <!------------------------------>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">
               Update
           </button>
              <!-- <button type="submit" class="btn btn-primary"  value="update">Update</button> -->
            </form>
      </div>
    </div>
  </div>
</div>


        <?php
    }

   ?>
</table>

</div>




   

 