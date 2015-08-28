<!DOCTYPE html>
<?php
session_start();
 if($_SESSION['id'] == "logout")
{
    header("location:index.php");
    exit();
}
else if($_SESSION['id']{0} != 2)
{
    header("location:pagenotfound.php");
    exit();
}
else
{ 
 $conn = mysqli_connect("localhost","root","","test");
  if(! $conn )
  {
     die('Could not connect: ' . mysqli_error());
  }
  $query = "SELECT * FROM faculty where (ID = '$_SESSION[id]' )";
        if($r = mysqli_query($conn,$query))
        {
             while($row=mysqli_fetch_array($r))
             {
				$_SESSION['fname'] = $row['FIRST_NAME'];
				$_SESSION['lname'] = $row['LAST_NAME'];
				$_SESSION['sid'] = $row['SID'];
				$_SESSION['school'] = $row['SCHOOL'];		
				$_SESSION['cid'] = "faculty";
				$_SESSION['email'] = $row['EMAIL'];
				$_SESSION['photo'] = $row['PHOTO'];
				$_SESSION['count'] = 10;
				$_SESSION['count_notifications'] = 10;
				$_SESSION['count_notices'] = 10;

             } 
        }
}

// now get the information of the student of which id is asked
 $conn = mysqli_connect("localhost","root","","test");
  if(! $conn )
  {
     die('Could not connect: ' . mysqli_error());
  }
  $query = "select * from student where (ID = '$_REQUEST[id]' )";
        if($r = mysqli_query($conn,$query))
        {
             while($row=mysqli_fetch_array($r))
             {
				$stu_fname = $row['FIRST_NAME'];
				$stu_lname = $row['LAST_NAME'];
				$stu_sid = $row['SID'];
				$stu_cid = $row['CID'];
				$stu_school = $row['SCHOOL'];		
				$stu_email = $row['EMAIL'];
				$stu_photo = $row['PHOTO'];
				$stu_mobile = $row['MOBILE'];	
				$stu_pmobile = $row['PMOBILE'];				
				$stu_email = $row['EMAIL'];				
				$stu_password = $row['PASSWORD'];	
				$stu_dob = $row['DOB'];	
				$stu_gender = $row['GENDER'];
				$stu_father_first_name = $row['FATHER_FIRST_NAME'];
				$stu_father_last_name = $row['FATHER_LAST_NAME'];
				$stu_mother_first_name = $row['MOTHER_FIRST_NAME'];
				$stu_mother_last_name = $row['MOTHER_LAST_NAME'];
				$stu_address = $row['ADDRESS'];				
				$stu_count = 10;
				$stu_count_notifications = 10;
				$stu_count_notices = 10;
             } 
        }
// for setting the details for attendance calender

if($_REQUEST['month'] == 'Jan'){
		$montharray = array(4, 31);
		$monthtoget = 01;
}
else if($_REQUEST['month'] == 'Feb'){
		$montharray = array(0, 28);
		$monthtoget = 02;
}
else if($_REQUEST['month'] == 'Mar'){
		$montharray = array(0, 31);
		$monthtoget = 03;
}
else if($_REQUEST['month'] == 'Apr'){
		$montharray = array(3, 30);
		$monthtoget = 04;
}
else if($_REQUEST['month'] == 'May'){
		$montharray = array(5, 31);
		$monthtoget = 05;
}
else if($_REQUEST['month'] == 'Jun'){
		$montharray = array(1, 30);
		$monthtoget = 06;
}
else if($_REQUEST['month'] == 'Jul'){
		$montharray = array(3, 31);
		$monthtoget = 07;
}
else if($_REQUEST['month'] == 'Aug'){
		$montharray = array(6, 31);
		$monthtoget = 08;
}
else if($_REQUEST['month'] == 'Sep'){
		$montharray = array(2, 31);
		$monthtoget = 09;
}
else if($_REQUEST['month'] == 'Oct'){
		$montharray = array(4, 31);
		$monthtoget = 10;
}
else if($_REQUEST['month'] == 'Nov'){
		$montharray = array(0, 30);
		$monthtoget = 11;

}
else if($_REQUEST['month'] == 'Dec'){
		$montharray = array(2, 31);
		$monthtoget = 12;
}
else{
	header("Location:pagenotfound.php");
}

?>
<html lang="en">
    <head>
        <title>Student Detail - <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?></title>
        <meta name="keywords" content="urbanic, responsive, bootstrap, fluid layout, orange, white, free website template, templatemo" />
		<meta name="description" content="Urbanic is free responsive template using Bootstrap which is compatible with mobile devices. This layout is provided by templatemo for free of charge." />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->
        
        
        <!-- Google Web Font Embed -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.css" rel='stylesheet' type='text/css'>
        

        <!-- Custom styles for this template -->
        <link href="../js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
        <link href="../css/templatemo_style.css"  rel='stylesheet' type='text/css'>
		<link href="../css/circle.css"  rel='stylesheet' type='text/css'>		

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body style="background:#94BEDA;">

                        <!--Logo Bar-->

		<div class="templatemo-top-bar" id="templatemo-top">
            <div class="container">
                <div class="subheader">
                    <div id="phone" class="pull-left">
                            <img src="../images/phone.png" alt="phone"/>
                            010-020-0340
                    </div>
                    <div id="email" class="pull-right">
                            <img src="../images/email.png" alt="email"/>
                            contact@website.com
                    </div>
                </div>
            </div>
        </div>

                        <!--Profile Bar-->

                        <!--Profile Bar-->

        <div class="templatemo-top-menu" style="border-bottom: 2px solid #888888;">
            <div class="container">
                <!-- Static navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
								<a href="../profile-faculty.php">
									<table>
									<tr><td><img height = 60 width = 60 src="../images/students/<?php echo $_SESSION['photo']; ?>" style="border-radius: 33px;"></td>
									<th><?php echo $_SESSION['fname'] ." ". $_SESSION['lname']; ?><br/>
									<?php echo $_SESSION['school']; ?><br/>
									<?php echo "ID : ".$_SESSION['id']; ?><br/>
									<?php echo "School ID : ".$_SESSION['sid']; ?>
									</td></tr>
									</table>
								</a>
                        </div>
                        <div class="navbar-collapse collapse" >
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 14px;">
                                <li><a href="../homepage-faculty.php" onclick='navforwardhomefaculty()'>HOME</a></li>
                                <li><a href="../profile-faculty.php" onclick='navforwardpfaculty()'>PROFILE</a></li>
								<li class="active"><a href="../attendance-faculty.php" onclick='navforwardattfaculty()'>ATTENDANCE</a></li>
								<li><a href="../assignment-faculty.php" onclick='navforwardasfaculty()'>ASSIGNMENT</a></li>
								<li><a href="../notice-faculty.php" onclick='navforwardnfaculty()'>NOTICES</a></li>
								<li><a href="../music.php" onclick='navforwardm()'>MUSIC</a></li>
								<li><a href="../notes.php" onclick='navforwardn()'>NOTES</a></li>
                                <li><a href="../login.php" onclick='navforwardl()'>LOGOUT</a></li>
                                <li><a href="../contact.php">CONTACT</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div><!--/.container-fluid -->
                </div><!--/.navbar -->
            </div> <!-- /container -->
        </div>
        

                        <!--Main Homepage-->
        
        <div class="templatemo-service">
            <div class="container">
                <div class="row">

                                        <!-- Information division -->                    
                    
                    <div class="col-md-41">
                        <div class="templatemo-service-item" style='background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;'>
						<?php
						echo "
							<div class='profile-header' style='background-color: #FF7600;padding: 7px;color:#fff;margin-bottom:10px;'>
                                    <span class='blog_header'>
									
										".$stu_fname." ".$stu_lname."  
									</span>
							</div>					

							<a class='colorbox' href='../images/Students/".$stu_photo."' data-group='gallery-graphic'>
                                <div class='templatemo-project-box'>
									<img src='../images/Students/".$stu_photo."' class='img-responsive' alt='gallery' height='150' width='150'/>
									<div class='project-overlay'>
									</div>
                                </div>
                            </a>
							<br>
						<table style='font-size:13px'>
						<tr>
							<td><b>ID : </b> </td><td> ".$_REQUEST['id']."</td>
						</tr>
						<tr>
							<td><b>Class : </b> </td><td> ".$stu_cid."</td>
						</tr>
						<tr>
							<td><b>School : </b> </td><td> ".$stu_school."</td>
						</tr>
						<tr>
							<td><b>School ID : </b> </td><td> ".$stu_sid."</td>
						</tr>						
						</table>
						";
						?>

                        </div>
                        <br class="clearfix"/>
                    </div>
					<!-- Info ends -->

                    <!--Attendance DIVISION-->
                    
                    <div class="col-md-45">
                        <div class="templatemo-service-item" style='background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;'>
						
							<div class="navbar-collapse collapse" style='font-size: 13px;font-weight: bold;'>
								<ul class="nav navbar-nav" style="margin-top: 14px;">
									<li>
										<a href="../studentdetails.php?id=<?php echo $_REQUEST['id']; ?>">PROFILE</a>
									</li>
									<li style='background:#FF7600;'>
										<a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=<?php echo date('M'); ?>" style='color:#fff;'>ATTENDANCE</a>
									</li>
									<li>
										<a href="assignment-details.php?id=<?php echo $_REQUEST['id']; ?>">TESTS</a>
									</li>
									<li>
										<a href="assignment-details.php?id=<?php echo $_REQUEST['id']; ?>">REMARKS</a>
									</li>									
								</ul>
							</div>
							<!-- for monthly attendance and percentage-->
							<div style='box-shadow: 0px 0px 3px #888;padding:5px;margin-bottom:15px;'>
								<div style='background-color: #FF7600;color: #fff;margin-bottom: 10px;'>
									<span class='templatemo-service-item-header'>
										Monthly Attendance Progress : <?php echo $_REQUEST['month']." - ".date('Y'); ?>
									</span>
								</div>
							
								<table border=1 width='60%' style="border-style: hidden;box-shadow:0px 0px 3px #888;margin-bottom:15px;" align='center'>
									<tbody border='1' style='font-size: 16px;font-weight: bold;'>
                                    <tr> 
                                    <td><a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=Jan">JAN</a></td>
                                    <td><a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=Feb">FEB</a></td>
                                    <td><a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=Mar">MAR</a></td>
                                    <td><a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=Apr">APR</a></td>
                                    <td><a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=May">MAY</a></td>
                                    <td><a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=Jun">JUN</a></td>
                                    <td><a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=Jul">JUL</a></td>
                                    <td><a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=Aug">AUG</a></td>
                                    <td><a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=Sep">SEP</a></td>
                                    <td><a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=Oct">OCT</a></td>
                                    <td><a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=Nov">NOV</a></td>
                                    <td><a href="attendance-details.php?id=<?php echo $_REQUEST['id']; ?>&month=Dec">DEC</a></td>

                                    </tr>
									</tbody>
                                </table>

								<table width='90%'><!-- table for big table -->
								<tr><td>
									<table border=0 CELLPADDING='13' width='50%' style="border-style:hidden;box-shadow:0px 0px 3px #888;background-color:#bbb;">
										<thead style='background-color:#FF7600;color:#fff;'>
										<tr> 
										<td><font>Sun</td>
										<td><font>Mon</td>
										<td><font>Tue</td>
										<td><font>Wed</td>
										<td><font>Thu</td>
										<td><font>Fri&nbsp</td>
										<td><font>Sat</td>
										</tr>
										<tr>
										</thead>	
										<?php
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
											echo "<td id='calendertd' style='padding:1px;'>
											<a id = hre".$j." href='#' style='text-decoration:none;'><div  id=at".$j." style='background-color: #fff;padding-right: 10px;padding-bottom: 16px;'>".$j."</div></a>
											</td>";
											$column++;
										}
									
											// for attandence counting
											for($i=0 ; $i<=31 ;$i++)
											{
												$attendence[$i]= "white";
											}
											$conn = mysqli_connect("localhost","root","","test");
											//mysqli_select_db('test');
											$query = "select STATUS, DAY(DATE) from attendance where (SID = '$stu_sid') AND (MONTH(DATE) = '$monthtoget') AND (ID = '$_REQUEST[id]')";
											$presence =0; $absence =0;										
											if($r = mysqli_query($conn ,$query))
											{
												while($row = mysqli_fetch_array($r))
												{
													$status = $row['STATUS'];
													$day = $row['DAY(DATE)'];
													if($status == '1'){
														echo "<script> document.getElementById('at".$day."').style.background = '#43D545';</script>";
														$presence++;
													}
													else if($status == '0'){
														echo "<script> document.getElementById('at".$day."').style.background = '#F54D4D';</script>";
														$absence++;
													}
			
													
												}
											}

									echo "</table>
								</td><td>
									";
									if(($presence + $absence) == 0 )
										$percentage = 0;
									else
										$percentage = floor($presence*100/($presence + $absence));
									echo"<table align='center'><tr><td>
									    <div class='c100 p".$percentage." big'>
											<span>".$percentage."%</span>
											<div class='slice'>
												<div class='bar'></div>
												<div class='fill'></div>
											</div>
										</div></td></tr>
										<tr><td>
											<div style='background-color:#43D545;box-shadow:0px 0px 5px #888;'>Presence - ".$presence."</div><br>
											<div style='background-color:#F54D4D;box-shadow:0px 0px 5px #888;'>Absence - ".$absence."</div>
										</td></tr>
										</table>

								</td></tr>
								</table>
										";	
									?>
									
							</div>
							<!-- for total attendance and the progress graph-->
							<div style='box-shadow: 0px 0px 3px #888;padding:5px;'>
								<div style='background-color: #FF7600;color: #fff;margin-bottom: 10px;'>
									<span class='templatemo-service-item-header'>
										Total Attendance Progress
									</span>
								</div>	
								<?php
									$conn = mysqli_connect("localhost","root","","test");
									$query = "select STATUS, DAY(DATE) from attendance where (SID = '$stu_sid') AND (ID = '$_REQUEST[id]')";
									$presence =0; $absence =0;										
									if($r = mysqli_query($conn ,$query))
									{
										while($row = mysqli_fetch_array($r))
										{
											$status = $row['STATUS'];
											$day = $row['DAY(DATE)'];
											if($status == '1'){
												$presence++;
											}
											else if($status == '0'){
												$absence++;
											}												
										}
									}								
									if(($presence + $absence) == 0 )
										$percentage = 0;
									else
										$percentage = floor($presence*100/($presence + $absence));
									echo"<table align='center'><tr><td>
									    <div class='c100 p".$percentage." big'>
											<span>".$percentage."%</span>
											<div class='slice'>
												<div class='bar'></div>
												<div class='fill'></div>
											</div>
										</div></td></tr>
										<tr><td>
											<div style='background-color:#43D545;box-shadow:0px 0px 5px #888;'>Presence - ".$presence."</div><br>
											<div style='background-color:#F54D4D;box-shadow:0px 0px 5px #888;'>Absence - ".$absence."</div>
										</td></tr>
										</table>";	
								?>
							</div>
                            <br class="clearfix"/>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="templatemo-footer" >
            <div class="container">
                <div class="row">
                    <div class="text-center">

                        <div class="footer_container">
                            <ul class="list-inline">
                                <li>
                                    <a href="#">
                                        <span class="social-icon-fb"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="social-icon-rss"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="social-icon-twitter"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="social-icon-linkedin"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="social-icon-dribbble"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="height30"></div>
                            <a class="btn btn-lg btn-orange" href="#" role="button" id="btn-back-to-top">Back To Top</a>
                            <div class="height30"></div>
                        </div>
                        <div class="footer_bottom_content">Copyright © 2015 <a href="#">Educationhub</a> </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js"  type="text/javascript"></script>
        <script src="../js/stickUp.min.js"  type="text/javascript"></script>
        <script src="../js/colorbox/jquery.colorbox-min.js"  type="text/javascript"></script>
        <script src="../js/templatemo_script.js"  type="text/javascript"></script>
        <script src="../js/ajaxscript.js"  type="text/javascript"></script>        

    </body>
<script type='text/javascript' src='../js/logging.js'></script>
</html>
