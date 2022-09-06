<?php

	require_once("connection.php");
	
	$expense_id = getValue($_GET["expenes_id"]);
	
	$result = mysqli_query($con, "DELETE FROM expenes WHERE expenes_id = $expense_id");
	
	if($result) {
		header("location:expense_list.php?delete=done");
	}
	else {
		header("location:expense_list.php?error=notdelete");
	}
	

?>