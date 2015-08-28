<?php
session_start();
 if($_SESSION['id'] == "logout")
{
    header("location:index.php");
    exit();
}
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

							echo "

								<div id='attendancearea'>
                                <table border=0 align='center' width='50%' style='border-style: hidden;background:#bbb'>
									<thead style='background-color:#FF7600;color:#fff;font-size: 11px;'>
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
									</thead>	
									<tbody style='font-size: 12px;'>
								";

									//  for showing the table
									$column = 0;

									for($i =1 ; $i<= $montharray[0] ; $i++)
									{
										echo "<td>
										
										</td>";
										$column++;
									}
									for($j = 1 ; $j<= $montharray[1] ; $j++)
									{
										if($column % 7 == 0)
										{
											echo "</tr><tr>";
										}
										echo "<td id='calendertd'>
										<a id = hre".$j." href='#' style='text-decoration:none;'><div  id=at".$j." style='background-color: #fff;padding-right: 10px;padding-bottom: 13px;font-weight:bold;'>".$j."</div></a>
										</td>";
										$column++;
									}
								
										// for attandence counting
										for($i=0 ; $i<=31 ;$i++)
										{
											$attendence[$i]= "white";
										}
										$conn = mysqli_connect("localhost","root","","test");

										$query = "select DAY(DATE) from attendance_done where (MONTH(DATE) = '$monthtoget') AND (CID = '0001091')";
								
										if($r = mysqli_query($conn ,$query))
										{
											while($row = mysqli_fetch_array($r))
											{
												$day = $row['DAY(DATE)'];

													echo "<script>document.getElementById('at".$day."').style.background = '#43D545';
																document.getElementById('hre".$day."').href = 'editattendance.php';
														</script>";

											}
		
												
										}

										echo "</tbody></table>

										</div>
";	
?>