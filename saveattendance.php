<?php
	session_start();
	$id = $_SESSION['id'];

	$date = $_REQUEST['atyear']."-".$_REQUEST['atmonth']."-".$_REQUEST['atdate'];
	//$date = date("Y-m-d");
	$class = $_REQUEST['classid'];
	$time = date("h:i:s A");
	echo $date;

	//------------ to save attendances into database-------
	
	$conn = mysqli_connect("localhost","root","","test");
	if(! $conn)
	{
		die('Could not connect :' . mysqli_error());
	}
    if($r = mysqli_query($conn,"select * from student where (SID = '$_SESSION[sid]') and (CID = '$class') ")) 
    {
        while($row=mysqli_fetch_array($r))
        { 	
			$stuid = $row['ID'];
			$status = $_POST[$row['ID']];
			echo $stuid;
			echo $status;
			$res = mysqli_query($conn, "insert into attendance (DATE, SID, CID, ID, STATUS) values('$date','$_SESSION[sid]','$class','$stuid','$status')");
        }
	}

	if($res){
		$res1 = mysqli_query($conn, "insert into attendance_done (SID, CID, ID, DATE, TIME) values('$_SESSION[sid]','$class','$id','$date','$time')");
	}
	if($res1)
	{
		header("location:attendance-faculty.php?status=success");
	}
	mysqli_close($conn);

?>