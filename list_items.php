<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
$time= date("h");
//$time=14;
?>

<!DOCTYPE html>
<html>
<head>
<title>Menu</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
    blockquote {
  min-height: 5em;
  padding   : 1em 4em;
  font      : 1em/150% sans-serif;
  position  : relative;
  background-color: lightgoldenrodyellow;
}

blockquote::before,
blockquote::after {
  position: absolute;
  height  : 3rem;
  font    : 6rem/100% Georgia, "Times New Roman", Times, serif;
}

blockquote::before {
  content: '“';
  top    : 0.3rem;
  left   : 0.9rem;
}

blockquote::after {
  content: '”';
  bottom : 0.3rem;
  right  : 0.8rem;
}

blockquote:lang(fr)::before {
  content: '«';
  top    : -1.5rem;
  left   : 0.5rem;
}

blockquote:lang(fr)::after {
  content: '»';
  bottom : 2.6rem;
  right  : 0.5rem
}

blockquote i {
  display   : block;
  font-size : 0.8em;
  margin-top: 1rem;
  text-style: italic;
  text-align: right;
}
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

.watermark {
    opacity: 0.6;
    text-align: center;
    color: BLACK;
    position: fixed;
    display: flex;
    bottom: 10px;
    right: 10px;
    flex: 1;
    justify-content: center;
    align-items: center;
    text-transform: uppercase;
}

</style>
</head>
<body style="background: ghostwhite;">
   <div class="watermark" style="padding: 10px;">
  <i><u>  <?php echo $_SESSION["userid"];?></u></i>
  </div>
  <div class="container" style="background: ;margin-top: 10px;text-align: center;">

<div style="display: flex;flex:1;flex-wrap: wrap; align-items: center;justify-content: center;">
<?php 
//session_start();
include 'config.php';?>
<?php
//$conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system");



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

$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) 
{
?>
<div class="card" style="width: 15rem;margin: 10px;border:2.5px solid #38d39f;box-shadow: inset -5px -5px white;border-radius: 15px;">
    <img style="border-top-right-radius:15px;border-top-left-radius:15px "src="<?php echo 'item_image/'.$row['image'].'';?>" class="card-img-top" alt="<?php echo $row['item_name'];?>" width="100px" height="100px">
  <div class="card-body " >
    <h5 class="card-title"><?php echo $row['item_name'];?></h5>
    <p class="card-text">Rs.<?php echo $row['price'] ;?></p>
    <p class="card-text"><?php echo $row['cat'] ;?></p>
    <hr>
      <p class="card-text"><?php echo $row['description'] ;?></p>
    <a href="order.php" class="btn btn-outline-primary">Order Now</a>
  </div>
</div>
<?php
} 
}
else { echo "MAINTENCE BREAK"; }
//$conn->close();

?>

</div>

   <div class="d-grid gap-2 d-md-flex justify-content-md-center" style="margin-top:15px">
  
     <a style="margin-bottom:10px" href="last_order.php" class="btn btn-warning me-md-2"><i>Access Home Orders</i>
      </a>
     <button type="button" class="btn btn-primary" style="margin-bottom:10px"  data-bs-toggle="modal" data-bs-target="#exampleModal">
     Leave Your Comments
      </button>

     </div>
  
</div>
<!---------------------------------------review table------------------------------>
<center><h2>Reviews</h2></center>
<div class="container" id="Review" style="display: flex;flex:1;flex-wrap:wrap;justify-content: center;align-items: center;">
    

   <?php 
    $sql2="select * from review";
    $resss=mysqli_query($conn,$sql2);
    if (mysqli_num_rows($resss) > 0) {
    while($data1=mysqli_fetch_array($resss)){
        ?>
        <div class="card" style="width: 18rem;margin: 10px;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $data1['name'];?></h5>
<!--     <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
    <p class="card-text"><?php echo $data1['comment'];?></p>
    <!-- <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a> -->
  </div>
</div>
              <?php
    }}else{
        echo "<div class='container'>";
        echo "<center>";
        echo "No review Found ";
        echo "</center>";
        echo "</div>";
    }
   ?>




</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Write Your Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
<form method="post">
<div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="comment"></textarea>
  <label for="floatingTextarea">Comments</label>
  <input type="hidden" value="<?php echo $_SESSION["userid"];?>" name="username">
  
</div>

<?php
if(isset($_POST['comments'])){
    $name=$_POST['username'];
    $comm=$_POST['comment'];
    $sql1="INSERT INTO `review`(`name`, `comment`) VALUES ('$name','$comm')";
    $ress=mysqli_query($conn,$sql1);
    if($ress=true){
    header("location:list_items.php");
    }
}
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <input type="submit" name="comments" value="Submit" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>




</body>
</html>
