<?php
	session_start();
	$faculty_id = $_SESSION['id'];
	$maxmarks = $_REQUEST['maxmarks'];
	$class = $_REQUEST['classid'];
	$subject = $_REQUEST['asubjectlist'];
	$time = date("h:i:sa");
	$testid = $subject.$time;
	$date = date("Y-m-d");
	$name = $_SESSION['fname']." ".$_SESSION['lname'];

	//------------ TO SAVE MARKS INTO DATABASE-------
	
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
			$marks = $_POST[$row['ID']];
			$res = mysqli_query($conn, "insert into marks (SID, CID, TEST_ID, SUBJECT_NAME, FACULTY_ID, STUDENT_ID, MAXIMUM_MARKS, MARKS_OBTAINED, DATE) values('$_SESSION[sid]','$class','$testid','$subject','$_SESSION[id]','$row[ID]','$maxmarks','$marks','$date')");
        }
	}

	$matter = $name." "."posted the test results";
	$res2 = mysqli_query($conn, "insert into notifications (SID, CID, ID, MATTER, TIME, PHOTO) values('$_SESSION[sid]','$_SESSION[cid]','$_SESSION[id]','$matter','$date','$_SESSION[photo]')");

	$rest3 = mysqli_query($conn, "select * from student");
			while($row = mysqli_fetch_array($rest3))
			{
				if($row['CID'] == $class && $row['SID'] == $_SESSION['sid'])
				{
					$res4 = mysqli_query($conn, "insert into temp_notifications (UPDATE_ID,STUDENT_ID, SID, CID, NOTIFICATOR_ID, MATTER, TIME, PHOTO) values('$testid', '$row[ID]','$_SESSION[sid]','$class','$_SESSION[id]','$matter','$date','$_SESSION[photo]')");
				}	
			}

	if($r)
	{
		header("location:homepage-faculty.php");
	}
	mysqli_close($conn);

?>