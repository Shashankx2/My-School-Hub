<?php
	session_start();
	$sno = 0;
	$count = 0;
	$update = $_POST["message"];
	$id = $_SESSION['id'];
	$updateid = 0;

	if($update == NULL)
	{
			//header("location:homepage.php");
	}
	//------------ to insert value into database-------
	
	$conn = mysqli_connect("localhost","root","","test");
	if(! $conn)
	{
		die('Could not connect :' . mysqli_error());
	}
	$name = $_SESSION['fname']." ".$_SESSION['lname'];

		$date = date('g:i a l F');
		$res = mysqli_query($conn, "insert into updates (SID, CID, ID, NAME, TIME, CONTENT, DATE, PHOTO) values('$_SESSION[sid]','$_SESSION[cid]','$_SESSION[id]','$name','$date','$update','date','$_SESSION[photo]')");
		
		$update = mysqli_query($conn, "select * from updates");
		while($row = mysqli_fetch_array($update))
		{
			$updateid = $updateid + 1;
		}

		$matter = $name." "."shared something with you";
		$res2 = mysqli_query($conn, "insert into notifications (SID, CID, ID, MATTER, TIME, PHOTO) values('$_SESSION[sid]','$_SESSION[cid]','$_SESSION[id]','$matter','$date','$_SESSION[photo]')");

		// REDIRECTING TO THE PAGE ACCORDING TO THE USER ID

		if($id{0} == 1){
			header("location:homepage.php");
		}
		else if($id{0} == 2)
		{
			header("location:homepage-faculty.php");
		}

		// iNSERTING INTO TEMPORARY NOTIFICATION TABLES ACCORDING TO THE ID

		if($id{0} == 1)
		{
			$rest3 = mysqli_query($conn, "select * from student");
			while($row = mysqli_fetch_array($rest3))
			{
				if($row['CID'] == $_SESSION['cid'] && $row['SID'] == $_SESSION['sid'])
				{
					if($row['ID'] != $_SESSION['id'])
					{
						$res4 = mysqli_query($conn, "insert into temp_notifications (UPDATE_ID,STUDENT_ID, SID, CID, NOTIFICATOR_ID, MATTER, TIME, PHOTO) values('$updateid', '$row[ID]','$_SESSION[sid]','$_SESSION[cid]','$_SESSION[id]','$matter','$date','$_SESSION[photo]')");
					}
				}	
			}
		}
		else if($id{0} == 2)
		{
			$rest3 = mysqli_query($conn, "select * from faculty");
			while($row = mysqli_fetch_array($rest3))
			{
				if($row['SID'] == $_SESSION['sid'])
				{
					if($row['ID'] != $_SESSION['id'])
					{
						$res4 = mysqli_query($conn, "insert into temp_notifications (UPDATE_ID,STUDENT_ID, SID, CID, NOTIFICATOR_ID, MATTER, TIME, PHOTO) values('$updateid', '$row[ID]','$_SESSION[sid]','$_SESSION[cid]','$_SESSION[id]','$matter','$date','$_SESSION[photo]')");
					}
				}	
			}
		}
		

	mysqli_close($conn);
?>