<?php

	require_once("connection.php");
	
	unset($_SESSION["USER_ID"]);
	
	header("location:login.php?logout=done");



?>