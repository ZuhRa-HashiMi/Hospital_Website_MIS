<?php 
  $con = mysqli_connect("localhost", "root", "");
	mysqli_select_db($con, "script");
    if (!isset($_SESSION)) {
	   session_start();
	   }
	   

	   
    function getValue($value) {
		global $con;
		return mysqli_real_escape_string($con, $value);
	}
	
  ?>
