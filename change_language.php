<?php

if(!isset($_SESSION)) { 
		session_start();
	}

	$lang = $_GET["lang"];
	
	if($lang == "en") {
		$_SESSION["local"] = "local/en.php";
	}
	else if($lang == "fa") {
		$_SESSION["local"] = "local/fa.php";
	}
	else if($lang == "ps") {
		$_SESSION["local"] = "local/ps.php";
	}

	$previousURL = $_SERVER["HTTP_REFERER"];
	
	header("location:$previousURL");
	







?>