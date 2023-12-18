<?php 
session_start();
include 'config.php';?>
<?php
//$conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system") or die("Connection Error: " . mysqli_error($conn));
$result = mysqli_query($conn, "SELECT * FROM food_items ");
?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style type="text/css">

  ::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

   ::-webkit-scrollbar
{
    width: 4px;
    background-color: #F5F5F5;
}

  ::-webkit-scrollbar-thumb
{
    background-color: #000000;
}
</style>
<style>

.checkbox_item .title{
  padding-bottom: 15px;
  border-bottom: 1px solid #e5e9ec;
  font-size: 20px;
  font-weight: bold;
  letter-spacing: 3px;
  margin-bottom: 10px;
  text-align: center;
}

.checkbox_item .checkbox_wrap{
  position: relative;
  display: block;
  cursor: pointer;
  width: 100px;
  margin: 0 auto 0px;
}

.checkbox_item:last-child .checkbox_wrap{
  margin-bottom: 0;
}

.checkbox_item .checkbox_wrap .checkbox_inp{
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  z-index: 1;
}

.checkbox_item .checkbox_wrap .checkbox_mark{
  display: inline-block;
  position: relative;
  border-radius: 25px;
}

.checkbox_item .checkbox_wrap .checkbox_mark:before,
.checkbox_item .checkbox_wrap .checkbox_mark:after{
  content: "";
  position: absolute;
  transition: all 0.5s ease;
}



/* basic styles */
.checkbox_item.citem_1 .checkbox_wrap .checkbox_mark{
  background: #f0f0f0;
  width: 50px;
  height: 25px;
  padding: 2px;
}

.checkbox_item.citem_1 .checkbox_wrap .checkbox_mark:before{
  top: 2px;
  left: 3px;
  width: 22px;
  height: 22px;
  background: #fff;
  border-radius: 50%;
}

.checkbox_item.citem_1 .checkbox_wrap .checkbox_inp:checked ~ .checkbox_mark{
  background: #34bfa3;
}

.checkbox_item.citem_1 .checkbox_wrap .checkbox_inp:checked ~ .checkbox_mark:before{
  left: 28px;
}
</style>
</head>

<body>
<div style="background: rgba(255, 255, 255, 0.6);margin-top: 10px;border-radius: 15px;text-align: center;" class="container">
<form action="include.php" method='post'>
  <div class="container" style="display: flex;justify-items: center;align-items: center;flex: 1;flex-wrap: wrap;">
<?php
$i=0;

if ($result->num_rows > 0) {
while($row = mysqli_fetch_array($result)) {
?>


<div class="card" style="max-width: 18rem;width:  200px;margin: 5px;">
 
  <div class="card-body ">
    <h5 class="card-title"><?=$row["item_name"];?> </h5>
    <p style="text-align:center;">
  <img src="<?php echo 'item_image/'.$row['image'].'';?>" alt="<?php echo $row['item_name'];?>" width="100px" height="100px">
</p>
  </div>
  <div class="card-footer bg-transparent border-success" style="width: 100%;text-align: center;">
    <div class="checkbox_item citem_1" >
   
    <label class="checkbox_wrap">
       <input type="checkbox" style="" class="checkbox_inp" name="<?=$row["item_name"];?>"  />
     <!--  <input type="checkbox" name="checkbox" class="c"> -->
      <span class="checkbox_mark"></span>
    </label>
     <div class="title">Rs.<?=$row["price"];?> </div>
     <p><?php echo $row["cat"];?></p>
  </div>

    <a href="delete_item.php?username=<?php echo $row['item_name']?>" class="btn btn-sm btn-outline-warning" onclick="return confirm('sure to Delete');">Delete</a>
   </div>


</div>

<?php
$i++;
}}else{echo "<center>No Data Found</center>";}
?>
<br>
<br>
</div>
<center><button type="submit" class="btn btn-danger " style="margin: 10px;" onclick="return confirm('Are You Sure');" > Confirm  </submit>


</form>


<!----stock.php--------------------->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Stock Management
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">STOCK MANAGEMENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
      //  $conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system") or die("Connection Error: " . mysqli_error($conn));
        $result = mysqli_query($conn, "SELECT * FROM food_items where include='1'");
        ?>
        <div class="container" style="background: rgba(255, 255, 255, 0.6);border-radius: 25px;text-align: center;margin-top: 10px;margin-bottom: 10px;padding-bottom: 10px;display: flex;justify-content: center;align-content: center;align-items: center;">
          <form action="stockupdate.php" method='post'>

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
          <center>
          <!-- <a href="list_items.php" class="btn btn-outline-primary"> Menu  </a></center> -->
          </div>
        



          <?php
          mysqli_close($conn);
          ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
       <button type="submit" class="btn btn-outline-warning" > Save</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!------------------------stock end------------------------------->










































</div>
<br>

