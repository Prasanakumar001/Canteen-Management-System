<?php 
session_start();
include 'config.php';?>
<?php
//$conn = mysqli_connect("localhost", "root", "", "canteen_delivery_system") or die("Connection Error: " . mysqli_error($conn));
$result = mysqli_query($conn, "SELECT * FROM order_details where Status='0' ORDER BY timestamp DESC ");
?>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body >
  <div style=" overflow: hidden;
  background-color: ;
  position: fixed;
  top: 0;
  width: 100%;">
     <form class="d-flex me-md-2"  method="post">
        <input class="form-control me-2 " type="text" placeholder="Search" name="Search_input" value="" list="datalistOptions1">
        <button class="btn btn-outline-success  me-md-2" name="Search" type="submit">Search</button>
        <datalist id="datalistOptions1"  >
           
                     <?php
       
         $records = mysqli_query($conn,"SELECT username from order_details");

       
  while($data = mysqli_fetch_array($records))
        {
          ?>
  <option  value="<?php echo $data['username']; ?>"></option>

   

        <?php
        }

        ?>
    </datalist>
      </form>
      <!----------avoid mulitple data----------->
  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
    var found = [];
    $("datalist option").each(function() {
      if($.inArray(this.value, found) != -1) $(this).remove();
      found.push(this.value);

    });

   </script>
    <!----------avoid mulitple data----------->
  

    
  </div>
<!--   <div style=" overflow: hidden;
  background-color: ;
  position: fixed;
  top: 50px;
  width: 100%;">
  <div class="d-grid gap-2 d-md-flex justify-content-md-center" >
<form action="confirmed.php" method='post' class="d-flex">

<button type="submit" class="btn btn-sm btn-warning"> Confirm </button>
  </div>
  </div> -->



<div class="container" style="background:rgba(255, 255, 255, 0.6);border-radius: 15px;  padding: 16px;
  margin-top: 60px;">

<fieldset style="border-radius: 5px;">
 
				<script type="text/javascript">
    $('.selectAll').change(function() {
  $(this).closest('table').find('.list-item :checkbox').not(this).prop('checked', this.checked);
});
        </script>
        <?php 
 //$s1=" ";  
if(isset($_POST['Search'])){

  
$s1 = $_POST['Search_input'];
//echo $s1;
}
//echo $s1;
$i=0;
if(empty($s1)){
  $result = mysqli_query($conn, "SELECT * FROM order_details  ");
}else {
  $result = mysqli_query($conn,"SELECT * FROM order_details where username ='" . $s1 . "'  ");
}

      if($result->num_rows>0){    

  echo "<table style='margin: 10px;padding: 10px;' class='table table-bordered'>";

// echo"<th>";echo"<input type='checkbox' class='selectAll' />";echo"</th>";
echo"<th>";echo "Rollno";echo"</th>";
echo"<th>";echo"Item Name";echo"</th>";
echo"<th>";echo "Quantity";echo "</th>";
echo"<th>";echo "Amount";echo "</th>";
echo"<th>";echo "Date & Time";echo "</th>";
echo"<th>";echo "Location";echo "</th>";

while($row = mysqli_fetch_array($result)) {
?>
<tr >
 <!--  <td>
   <div class='list-item'>
  <input type="checkbox"  style="widows: 100px" class='checkbox1' name="//$row["Order_id"];?>" id="product"  > </div></td> -->
  <td><?=$row["username"];?></td> 
  <td> <?=$row["item_name"];?></td> 
  <td ><?=$row["item_qty"];?></td>
   <td ><?=$row["Total"];?></td>
  <td ><?=$row["timestamp"];?></td>
  <td ><?=$row["location"];?></td>
   <!---<td> <?//=substr($row["d_address"],1,3)?> </td>-->

</tr>


<tr>
<?php
$i++;
} }else{
  echo "<table align='center'> <td style='text-align:center;font-size:24px;'>No data found<td></table>";
}
?>
</tr>
</table>

<br>
<br>

</fieldset>
</div>

</form>

<br>


<?php
mysqli_close($conn);
?>
