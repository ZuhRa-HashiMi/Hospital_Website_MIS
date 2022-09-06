<?php

	require_once("connection.php");
	
	$staff_id = getValue($_GET["staff_id"]);
	$absent_year = getValue($_GET["absent_year"]);
	$absent_month = getValue($_GET["absent_month"]);
	$absent_day = getValue($_GET["absent_day"]);
	
	$result = mysqli_query($con, "DELETE FROM attendances WHERE staff_id = $staff_id AND absent_year = $absent_year AND absent_month = $absent_month AND absent_day = $absent_day");
	
	if($result) {
		header("location:attendance_detail.php?delete=done&staff_id=$staff_id&absent_year=$absent_year&absent_month=$absent_month");
	}
	else {
		header("location:attendance_detail.php?error=notdelete&staff_id=$staff_id&absent_year=$absent_year&absent_month=$absent_month");
	}
	

?>