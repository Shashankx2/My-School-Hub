<?php
session_start();

$monthtoget = $_GET['month']; 
$monthalpha = $_GET['monthalpha'];

if($monthalpha == 'Jan')
	$montharray = array(4, 31);
if($monthalpha == 'Feb')
	$montharray = array(0, 28);
if($monthalpha == 'Mar')
	$montharray = array(0, 31);
if($monthalpha == 'Apr')
	$montharray = array(3, 30);
if($monthalpha == 'May')
	$montharray = array(5, 31);
if($monthalpha == 'Jun')
	$montharray = array(1, 30);
if($monthalpha == 'Jul')
	$montharray = array(3, 31);
if($monthalpha == 'Aug')
	$montharray = array(6, 31);
if($monthalpha == 'Sep')
	$montharray = array(2, 31);
if($monthalpha == 'Oct')
	$montharray = array(4, 31);
if($monthalpha == 'Nov')
	$montharray = array(0, 30);
if($monthalpha == 'Dec')
	$montharray = array(2, 31);

echo"
<table border=1 CELLPADDING='13' width='100%' style='border-style: hidden;'>
	<thead style='background-color:#FF7600;color:#fff;'>
		<tr> 
			<td><font>Sun</td>
			<td><font>Mon</td>
			<td><font>Tue</td>
			<td><font>Wed</td>
			<td><font>Thu</td>
			<td><font>Fri</td>
			<td><font>Sat</td>
		</tr>
		<tr>
	</thead>	";

	//  for showing the table
	$column = 0;
	for($i =1 ; $i<= $montharray[0] ; $i++)
	{
		echo "<td> </td>";
		$column++;
	}
	for($j = 1 ; $j<= $montharray[1] ; $j++)
	{
		if($column % 7 == 0)
		{
			echo "</tr><tr>";
		}
		echo "<td id=at".$j.">".$j."</td>";
		$column++;
	}
								
	// for attandence counting
	for($i=0 ; $i<=31 ;$i++)
	{
		$attendence[$i]= "white";
	}
	$conn = mysqli_connect("localhost","root","","test");

	$query = "select STATUS, DAY(DATE) from attendance where (MONTH(DATE) = '$monthtoget') AND (ID = '$_SESSION[id]')";
	$presence =0; $absence =0;										
	if($r = mysqli_query($conn ,$query))
	{
		while($row = mysqli_fetch_array($r))
		{
			$status = $row['STATUS'];
			$day = $row['DAY(DATE)'];
			if($status == '1')
			{
				echo "<script> document.getElementById('at".$day."').style.background = '#43D545';</script>";
				$presence++;
			}
			else if($status == '0'){
				echo "<script> document.getElementById('at".$day."').style.background = '#F54D4D';</script>";
				$absence++;
			}
							
		}
	}

echo"
</table>
<br>
<div style='background-color:#43D545;box-shadow:0px 0px 5px #888;'>Presence - ".$presence."</div><br>
<div style='background-color:#F54D4D;box-shadow:0px 0px 5px #888;'>Absence - ".$absence."</div>

";
?>