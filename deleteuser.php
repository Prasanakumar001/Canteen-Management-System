<?php 
include "config.php";


// if the 'username' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['username'])) {
	$userName = $_GET['username'];

	// write delete query
	$sql = "DELETE FROM `user` WHERE `username`='$userName'";

	// Execute the query

	$result = $conn->query($sql);

	if ($result == TRUE) {
		echo "Record deleted successfully.";
		header("Location: remove_users.php");
	}else{
		echo "Error:" . $sql . "<br>" . $conn->error;
	}
}



?>