<?php
    session_start();
    if($_SESSION['sid'] == "logout")
    {
        header("location:index.php");
        exit();
    }
    $conn = mysqli_connect("localhost","root","","test");

	$getcid = $_REQUEST['cid'];
	//$date = $_REQUEST['date'];
	echo "<table width='100%'>";
    if($r = mysqli_query($conn,"select * from student where (SID = '$_SESSION[sid]') AND (CID = '$getcid') order by SNO"))
    {
		while($row=mysqli_fetch_array($r))
		{ 
			echo "<tr><td><br>";
            echo $row['ID']."</td><td><br>".$row['FIRST_NAME']." ".$row['LAST_NAME']."</td><td><br>
			<input type='text' id='".$row['ID']."' name='".$row['ID']."'>
			
			</td></tr>";
        }
    }
    //echo "<tr><center><Button id='atsubmit' class='btn btn-orange' role='button' style='display:none;'>Submit</Button></center></tr>";
	echo "</table>";
?>
