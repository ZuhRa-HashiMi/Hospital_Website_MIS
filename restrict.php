<?php

	if(!isset($_SESSION)) { 
		session_start();
	}

	if(!isset($_SESSION["user_id"])) {
		header("location:login.php?notlogin=true");
	}
?>