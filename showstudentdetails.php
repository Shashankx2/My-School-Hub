<?php
    session_start();
    if($_SESSION['sid'] == "logout")
    {
        header("location:index.php");
        exit();
    }
    $conn = mysqli_connect("localhost","root","","test");

	$getcid = $_REQUEST['classid'];

	echo "<div style='background-color: #FF7600;margin-bottom: 10px;box-shadow: 0px 0px 3px #888;color: #fff;'>
			<span class='templatemo-service-item-header'>Student Details : Class- ".$getcid."</span>
		  </div>";
    if($r = mysqli_query($conn,"select * from student where (SID = '$_SESSION[sid]') AND (CID = '$getcid') order by SNO"))
    {
		while($row=mysqli_fetch_array($r))
		{ 
			echo "<a href='studentdetails.php?id=".$row['ID']."' target='_blank'>
			<div id='studentshow' style='background:#eee;margin-bottom: 11px;padding: 10px;box-shadow: 0px 0px 3px #888;'>
			<table style='font-size:13px;'>
				<tr><td><img height = 65 width = 65 src='images/students/".$row['PHOTO']."' style='border-radius: 33px;'></td><td>
				".$row['FIRST_NAME'] ." ". $row['LAST_NAME']."<br/>
				".$row['SCHOOL']."<br/>
				ID : ".$row['ID']." <br/>
				School ID : ".$row['SID']."
				</td></tr>
			</table>
			</div></a>
			";
        }
    }
	echo "</table>";
?>
