<?php

	require_once("connection.php");
	
	$department_id = getValue($_GET["department_id"]);
	
	$result = mysqli_query($con, "DELETE FROM department WHERE department_id = $department_id");
	
	if($result) {
		header("location:department_list.php?delete=done");
	}
	else {
		header("location:department_list.php?error=notdelete");
	}
	

?>