<?php
	session_start();
	if($_SESSION['keeplogin'] == "loginkeeping")
	{
		$sid = $_SESSION['id'];
		if($sid{0} == 1)
		{
		header("location:homepage.php");
		exit();
		}
		else if($sid{0} == 2)
		{
			header("location:homepage-faculty.php?count=0");
			exit();	
		}
	}		
	else
	{
		header("location:login.php");
	}
?>
