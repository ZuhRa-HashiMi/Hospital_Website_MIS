<?php

	require_once("connection.php");
	
	unset($_SESSION["user_id"]);
	
	header("location:login.php?logout=done");



?>