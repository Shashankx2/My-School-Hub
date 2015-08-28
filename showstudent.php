<?php
    session_start();
	$flag = 1;
    if($_SESSION['sid'] == "logout")
    {
        header("location:index.php");
        exit();
    }
    $conn = mysqli_connect("localhost","root","","test");

	$getcid = $_REQUEST['cid'];
	echo "<table width='100%' style='font-size:14px;'>";
    if($r = mysqli_query($conn,"select * from student where (SID = '$_SESSION[sid]') AND (CID = '$getcid') order by SNO"))
    {
		while($row=mysqli_fetch_array($r))
		{ 
			if($flag % 2 == 0)
				echo "<tr><td><br>";
			else
				echo "<tr style='background-color:#eee;'><td><br>";
            echo $row['ID']."</td><td><br>".$row['FIRST_NAME']." ".$row['LAST_NAME']."</td><td><br>
			<input type='radio' id='".$flag."p' name='".$row['ID']."' value='1' style='display:none;'>
			<label for='".$row['ID']."p' id='".$row['ID']."lp' style='font-size: 14px;border-style: solid;border-width: 0px;border-radius: 5px;background: #f3f3f3;box-shadow: 0px 0px 5px #888;padding: 4px;' onclick=atradio('".$row['ID']."lp','".$row['ID']."la')>Present</label>
			&nbsp&nbsp
			<input type='radio' id='".$flag."a' name='".$row['ID']."' value='0' style='display:none;'> 
			<label for='".$row['ID']."a' id='".$row['ID']."la' style='font-size: 14px;border-style: solid;border-width: 0px;border-radius: 5px;background: #f3f3f3;box-shadow: 0px 0px 5px #888;padding: 4px;' onclick=atradio('".$row['ID']."la','".$row['ID']."lp')>Absent</label>
			</td></tr>";
			$flag++;
        }
    }
	$flag--;
	echo "<input type='hidden' id='no_of_rows' value='".$flag."'>";
	echo "</table>";
?>
