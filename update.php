   <?php
    include 'config.php';
if (isset($_GET['username'])) {
	$userName = $_GET['username'];
//$message="";
if(count($_POST)>0) {


	// if the 'username' variable is set in the URL, we know that we need to edit a record


	
		$result = mysqli_query($conn,"UPDATE `food_items` SET `item_name`='"  . $_POST["Item_name"] . "',`price`='"  . $_POST["Item_cost"] . "',`description`= '" . $_POST["des"] . "',`cat`='"  . $_POST["cat"] . "' WHERE `item_name`='$userName'   ");
    //echo $msg1;
	if (!$result) {
		//$message = "invalid item\\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";
	    }else{
	    	header("location: update_items.php");
	    }
}
}
?>  