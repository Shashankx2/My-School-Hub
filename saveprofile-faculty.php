<?php
	session_start();
	$id = $_SESSION['id'];
	
	$dob = $_POST['ayear']."-".$_POST['amonth']."-".$_POST['adate'];
	
	if($_REQUEST['target'] == "savemypersonalinfo")
	{
			$query = "update faculty set DOB = '$dob', GENDER = '$_POST[editgender]', FATHER_FIRST_NAME = '$_POST[editfatherfirstname]', FATHER_LAST_NAME = '$_POST[editfatherlastname]', MOTHER_FIRST_NAME = '$_POST[editmotherfirstname]', MOTHER_LAST_NAME = '$_POST[editmotherlastname]' where (ID = '$id') ";
	}
	else if($_REQUEST['target'] == "savecontactinfo")
	{
			$query = "update faculty set EMAIL = '$_POST[editemail]', MOBILE = '$_POST[editmobile]', ADDRESS = '$_POST[editaddress]' where (ID = '$id') ";
	}
	//------------ to insert value into database-------
	
	$conn = mysqli_connect("localhost","root","","test");
	if(! $conn)
	{
		die('Could not connect :' . mysqli_error());
	}

		$res = mysqli_query($conn, $query);

		if(res && ($_REQUEST['target'] == "savemypersonalinfo")){
			header("location:editprofile-faculty.php?target=mypersonalinfo");
		}
		else if(res && ($_REQUEST['target'] == "savecontactinfo")){
			header("location:editprofile-faculty.php?target=contactinfo");
		}

	mysqli_close($conn);
?>