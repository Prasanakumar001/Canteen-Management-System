<?php 
session_start();
include 'config.php';
//echo $_SESSION['userid'];
?>
<?php
date_default_timezone_set('Asia/Kolkata');

$time= date("h");
$time=15;
//$conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system") or die("Connection Error: " . mysqli_error($conn));

// if($time<="7" || $time<"9"){
// $sql = "SELECT * FROM food_items where include=1 AND (stock!=0 AND cat='Breakfast')";
// }else if($time<="9" || $time<"11"){
// $sql = "SELECT * FROM food_items where include=1 AND (stock!=0 AND cat='BREAK(10.40)')";
// }else if($time<="11" || $time<"14"){
// $sql = "SELECT * FROM food_items where include=1 AND (stock!=0 AND cat='Lunch')";
// }else if($time<="14" || $time<"17"){
// $sql = "SELECT * FROM food_items where include=1 AND (stock!=0 AND cat='Evening')";
// }else{
// $sql = "SELECT * FROM food_items where include=1 AND stock!=0";
// }
$sql = "SELECT * FROM food_items where include=1 AND stock!=0";
$result = mysqli_query($conn,$sql);
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
    <title>KCET-Canteen</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style type="text/css">
       .content{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: -1;
  width: 100%;
  padding: 0 30px;
  color: #1b1b1b;
}
.content div{
  font-size: 100px;
  font-weight: -700;
}
    </style>

</head>
<body style="background: ghostwhite;">
   
            
         
    <!------------------------------content on------------------------->
      
<div class="container" style="background: rgba(255, 255, 255, 0.6);border-radius: 25px;text-align: center;margin-top: 10px;margin-bottom: 10px;padding-bottom: 10px;display: flex;justify-content: center;align-content: center;align-items: center;">
<form action="confirmation.php" method='post'>

  <?php

if ($result->num_rows > 0) {
echo  "<legend>Items Available</legend>";

$i=0;
while($row = mysqli_fetch_array($result)) {
?>
   <div class="input-group mb-3" style="text-align: center;">
  <span class="input-group-text"><?=$row["item_name"];?> </span>
    <input type="number" name="<?=$row["item_name"];?>" value="0" min="0" aria-label="First name" class="form-control">
  <span class="input-group-text">Rs.<?=$row["price"];?> </span>
  <br>
  
 


</div>
<div class="progress">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?=$row["stock"];?>"
  aria-valuemin="0" aria-valuemax="100" style="width:100%;text-align: center;">
  <?=$row["item_name"];?> ,only <?=$row["stock"];?> available
  </div>
</div>
<br>

<?php
$i++;
}}else{

   echo "MAINTENCE BREAK";
}
?>

<br>

<!----Delivery Location: <input type="text" name="delivery"  pattern="[A|a|B|b|N|n|D|d][0-9]{3}" required>------>
<center><button type="submit" class="btn btn-outline-warning" > Order Now</button>
<a href="list_items.php" class="btn btn-outline-primary"> Menu  </a></center>
</div>
</form>



<?php
mysqli_close($conn);
?>



       
               
    <!-----------------------------content off------------------------------->        

    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script type="text/javascript">
       $("*").keypress(function(e)
{
if (e.keyCode == 116) {
     e.preventDefault();
  }

}); 


    </script>


</body>

</html>





