
<?php 
session_start();
include 'config.php';?>
<?php
//$conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system") or die("Connection Error: " . mysqli_error($conn));
$result = mysqli_query($conn, "SELECT * FROM food_items where include='1'");
?>
<html>
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body style="background: skyblue;">
   <div class="container" style="background: rgba(255, 255, 255, 0.6);border-radius: 25px;text-align: center;margin-top: 10px;margin-bottom: 10px;padding-bottom: 10px;display: flex;justify-content: center;align-content: center;align-items: center;">
<form action="stockupdate.php" method='post'>

  <legend>stock</legend>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
   <div class="input-group mb-3" style="text-align: center;">
  <span class="input-group-text"><?=$row["item_name"];?> </span>
    <input type="number" name="<?=$row["item_name"];?>" value="0" min="0" aria-label="First name" class="form-control">
  <span class="input-group-text">Rs.<?=$row["price"];?> </span>
 


</div>

<?php
$i++;
}
?>

<br>

<!----Delivery Location: <input type="text" name="delivery"  pattern="[A|a|B|b|N|n|D|d][0-9]{3}" required>------>
<center><button type="submit" class="btn btn-outline-warning" > Order Now</button>
<!-- <a href="list_items.php" class="btn btn-outline-primary"> Menu  </a></center> -->
</div>
</form>



<?php
mysqli_close($conn);
?>
