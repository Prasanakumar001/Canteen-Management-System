<?php
session_start();
include 'config.php';
?>
<?php


$message="";
if(count($_POST)>0) {
  //$conn = mysqli_connect("localhost","root","","canteen_delivery_system");
    $image=$_FILES['image']['name'];
    $tempname = $_FILES["image"]["tmp_name"]; 
    $target="item_image/".$image;
      if (move_uploaded_file($tempname, $target))  {
            $sql="INSERT INTO `food_items`(`item_name`, `price`, `Include`, `image`,`cat`) VALUES ('"  . $_POST["Item_name"] . "','" . $_POST["Item_cost"] . "','1','$image','"  . $_POST["cat"] . "')";
 
            $result = mysqli_query($conn,$sql);
            $msg1 = "Image uploaded successfully";
        }else{
            $msg1 = "Failed to upload image";
        }
    if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }


  
    echo $msg1;

  if ($result==false) {
    $message = "invalid item\\nTry again.";
    echo "<script type='text/javascript'>alert('$message');</script>";
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
    <title>add item</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
</head>

<body>
                 <div class="container">
                   <h2 class="title">Enter Item Details</h2>

                <form name="Add_Item" method="post" action="" enctype="multipart/form-data">
              <div class="mb-3">
                                           <label class="form-label">file name</label>
                                             <input class="form-control" type="file" name="image" ><br>
                                             <input type="hidden" class="form-control" name="size" value="1000000" >
                                         </div>
                    <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Item Name</label>
                <input  name="Item_name" class="form-control" required >
                <div id="emailHelp" class="form-text"><?php if($message!="") { echo $message; } ?></div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Item Cost</label>
                <input type="number" min="0" class="form-control" pattern="[0-9]*" name="Item_cost" required>
              </div>
               <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Catergroy</label>
               <select name="cat" class="form-control" required>
                 <option value="Breakfast">Breakfast</option><option value="Snacks Time">BREAK(10.40)</option><option value="Lunch">Lunch</option><option value="Evening">Snacks Time(4.00)</option>
               </select>
              </div>
              
              <button type="submit" class="btn btn-primary"  value="Submit">Submit</button>
            </form>

</div>



</html>
<!-- end document-->
