<html>
<?php
session_start();
$sno = $_GET['sno'];
$target = $_GET['target'];

$conn = mysqli_connect("localhost","root","","test");
if(! $conn){
	die('Could not connect :' . mysqli_error());
}

	  //------------------------- now delete from the database ---------------------

	if($target == 'assignment')
		$res = mysqli_query($conn, "delete from assignment where SNO = '$sno' ");
	else if($target == 'notice')
		$res = mysqli_query($conn, "delete from notice where SNO = '$sno' ");

	if($res){
		if($target == 'assignment'){
			header("location:mynotice-faculty.php");
		}
		else if($target == 'notice'){
			header("location:mynotice-faculty.php");
		}
	}
	
mysqli_close($conn);  
?> 
</html>