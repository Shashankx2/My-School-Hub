<?php
	session_start();
	$id = $_SESSION['id'];
	
	if($_REQUEST['target'] == "savemypersonalinfo")
	{
			$query = "update student set DOB = '$_POST[editdob]', GENDER = '$_POST[editgender]', FATHER_NAME = '$_POST[editfather]', MOTHER_NAME = '$_POST[editmother]' where (ID = '$id') ";
	}
	else if($_REQUEST['target'] == "savecontactinfo")
	{
			$query = "update student set EMAIL = '$_POST[editemail]', MOBILE = '$_POST[editmobile]', PMOBILE = '$_POST[editpmobile]' where (ID = '$id') ";
	}
	//------------ to insert value into database-------
	
	$conn = mysqli_connect("localhost","root","","test");
	if(! $conn)
	{
		die('Could not connect :' . mysqli_error());
	}

		$res = mysqli_query($conn, $query);

		if(res && ($_REQUEST['target'] == "savemypersonalinfo")){
			header("location:editprofile.php?target=mypersonalinfo");
		}
		else if(res && ($_REQUEST['target'] == "savecontactinfo")){
			header("location:editprofile.php?target=contactinfo");
		}

	mysqli_close($conn);
?>