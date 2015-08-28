<!DOCTYPE html>
<?php
session_start();
 if($_SESSION['id'] == "logout")
{
    header("location:index.php");
    exit();
}
else if($_SESSION['id']{0} != '1')
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
  $query = "SELECT * FROM student where (ID = '$_SESSION[id]' )";
        if($r = mysqli_query($conn,$query))
        {
             while($row=mysqli_fetch_array($r))
             {
                $_SESSION['fname'] = $row['FIRST_NAME'];
                $_SESSION['lname'] = $row['LAST_NAME'];
                $_SESSION['sid'] = $row['SID'];
                $_SESSION['school'] = $row['SCHOOL'];       
                $_SESSION['cid'] = $row['CID'];
                $_SESSION['email'] = $row['EMAIL'];
                $_SESSION['photo'] = $row['PHOTO'];
                $_SESSION['count'] = 10;
                $_SESSION['count_notifications'] = 10;
                $_SESSION['count_notices'] = 10;

             } 
        }
}
if(date('M') == 'Jan')
	$montharray = array(4, 31);
if(date('M') == 'Feb')
	$montharray = array(0, 28);
if(date('M') == 'Mar')
	$montharray = array(0, 31);
if(date('M') == 'Apr')
	$montharray = array(3, 30);
if(date('M') == 'May')
	$montharray = array(5, 31);
if(date('M') == 'Jun')
	$montharray = array(1, 30);
if(date('M') == 'Jul')
	$montharray = array(3, 31);
if(date('M') == 'Aug')
	$montharray = array(6, 31);
if(date('M') == 'Sep')
	$montharray = array(2, 31);
if(date('M') == 'Oct')
	$montharray = array(4, 31);
if(date('M') == 'Nov')
	$montharray = array(0, 30);
if(date('M') == 'Dec')
	$montharray = array(2, 31);

?>
<html lang="en">
    <head>
        <title>Attendence - <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?></title>
        <meta name="keywords" content="urbanic, responsive, bootstrap, fluid layout, orange, white, free website template, templatemo" />
		<meta name="description" content="Urbanic is free responsive template using Bootstrap which is compatible with mobile devices. This layout is provided by templatemo for free of charge." />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->
        
        
        <!-- Google Web Font Embed -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css'>
        

        <!-- Custom styles for this template -->
        <link href="js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
        <link href="css/templatemo_style.css"  rel='stylesheet' type='text/css'>
		<link href="css/circle.css"  rel='stylesheet' type='text/css'>

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
                            <img src="images/phone.png" alt="phone"/>
                            010-020-0340
                    </div>
                    <div id="email" class="pull-right">
                            <img src="images/email.png" alt="email"/>
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
                                <a href="">
                                    <table>
                                    <tr><td><img height = 60 width = 60 src="images/students/<?php echo $_SESSION['photo']; ?>" style="border-radius: 33px;"></td>
                                    <th><?php echo $_SESSION['fname'] ." ". $_SESSION['lname']; ?><br/>
                                    <?php echo $_SESSION['school']; ?><br/>
                                    <?php echo "ID : ".$_SESSION['id']; ?><br/>
                                    <?php echo "Class : ".$_SESSION['cid']; ?></td></tr>
                                    </table>
                                </a>
                        </div>
                        <div class="navbar-collapse collapse" >
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 14px;">
                                <li><a href="homepage.php" onclick='navforwardhome()'>HOME</a></li>
                                <li><a href="profile.php" onclick='navforwardp()'>PROFILE</a></li>
								<li class="active"><a href="attendance.php" onclick='navforwardatt()'>ATTENDANCE</a></li>
								<li><a href="assignment.php" onclick='navforwardas()'>ASSIGNMENT</a></li>
								<li><a href="notice.php" onclick='navforwardn()'>NOTICES</a></li>
								<li><a href="music.php" onclick='navforwardm()'>MUSIC</a></li>
								<li><a href="notes.php" onclick='navforwardno()'>NOTES</a></li>								
                                <li><a href="logout" onclick='navforwardl()'>LOGOUT</a></li>
                                <li><a href="#templatemo-contact">CONTACT</a></li>
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

                                        <!-- NOTICES DIVISION -->                    
                    
                    <div class="col-md-41">
                        <div class="templatemo-service-item" style="background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;">
                            
                            <div>
                                <img src="images/battery.png" alt="icon"/>
                                <span class="templatemo-service-item-header">NOTICES</span>
                            </div>
                            <br>
                            <div>
                                
                                    <?php
                                    
                                        
                                        $conn = mysqli_connect("localhost","root","","test");
                                        if(! $conn )
                                        {           
                                            die('Could not connect: ' . mysqli_error());
                                        }
                                        if($res = mysqli_query($conn,"select * from notice where (SID = '$_SESSION[sid]' AND CID = '$_SESSION[cid]') order by SNO desc limit 10"))
                                        {
                                            while($row=mysqli_fetch_array($res))
                                            { 
                                                            echo "<div float = 'left' style = 'border-bottom:solid 1px rgba(161, 151, 151, 0.4);'><table><tr>";
                                                            echo "<td><a href = 'displaynotice.php?sno=$row[SNO]'><p style = 'margin-top: 0px;margin-bottom: 0px;'><font color = 'BLACK'>".$row['TITLE']."</font></p></a> ";
                                                            echo "<font size=2>".$row['DATE']."</font></td></tr></table></div>";
                                            }
                                            
                                echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>";                                 
                                echo "<div style = 'padding:1.5%;'>";
                                echo "<center><a href = 'displaynotice.php'>Show More</a></center>";
                                echo "</div></div>";
                                        }
                                    ?>       
                            </div>
                            <br class="clearfix"/>
                        </div>
                        <br class="clearfix"/>
                    </div>
					
                    <!-- Notices ends -->

                                        <!--Updates Division-->
                    
                    <div class="col-md-42">
                        <div class="templatemo-service-item" style='background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;'>
                            
                            <div align = "center" style = "margin-bottom: 20px;">
                                <span class="templatemo-service-item-header" id='showmonthyear'><?php echo date("M")." - ".date("Y"); ?></span>
                            </div>
							
							<?php
							
								if(date('M') == 'Jan'){
									$monthtoget = 01;
								}
								if(date('M') == 'Feb'){
									$monthtoget = 02;
								}
								if(date('M') == 'Mar'){
									$monthtoget = 03;
								}
								if(date('M') == 'Apr'){
									$monthtoget = 04;
								}
								if(date('M') == 'May'){
									$monthtoget = 05;
								}
								if(date('M') == 'Jun'){
									$monthtoget = 06;
								}
								if(date('M') == 'Jul'){
									$monthtoget = 07;
								}
								if(date('M') == 'Aug'){
									$monthtoget = 08;
								}
								if(date('M') == 'Sep'){
									$monthtoget = 09;
								}
								if(date('M') == 'Oct'){
									$monthtoget = 10;
								}
								if(date('M') == 'Nov'){
									$monthtoget = 11;
								}
								if(date('M') == 'Dec'){
									$monthtoget = 12;
								}
							
							?>

                            <div >
								<table border=1 width='70%' style="border-style: hidden;" align='center'>
									<tbody border='1' style='font-size: 16px;font-weight: bold;'>
                                    <tr> 
                                    <td><a onclick = showmonthstudent('01','Jan')>JAN</a></td>
                                    <td><a onclick = showmonthstudent('02','Feb')>FEB</a></td>
                                    <td><a onclick = showmonthstudent('03','Mar')>MAR</a></td>
                                    <td><a onclick = showmonthstudent('04','Apr')>APR</a></td>
                                    <td><a onclick = showmonthstudent('05','May')>MAY</a></td>
                                    <td><a onclick = showmonthstudent('06','Jun')>JUN</a></td>
                                    <td><a onclick = showmonthstudent('07','Jul')>JUL</a></td>
                                    <td><a onclick = showmonthstudent('08','Aug')>AUG</a></td>
                                    <td><a onclick = showmonthstudent('09','Sep')>SEP</a></td>
                                    <td><a onclick = showmonthstudent('10','Oct')>OCT</a></td>
                                    <td><a onclick = showmonthstudent('11','Nov')>NOV</a></td>
                                    <td><a onclick = showmonthstudent('12','Dec')>DEC</a></td>

                                    </tr>
									</tbody>
                                </table>
                                <br>
								<div id='attendancearea'>
                                <table border=1 CELLPADDING='13' width='100%' style="border-style: hidden;">
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
										echo "<td id=at".$j.">".$j."</td>";
										$column++;
									}
								
										// for attandence counting
										for($i=0 ; $i<=31 ;$i++)
										{
											$attendence[$i]= "white";
										}
										$conn = mysqli_connect("localhost","root","","test");
										//mysqli_select_db('test');
										$query = "select STATUS, DAY(DATE) from attendance where (MONTH(DATE) = '$monthtoget') AND (ID = '$_SESSION[id]')";
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
										<br>
											<div style='background-color:#43D545;box-shadow:0px 0px 5px #888;'>Presence - ".$presence."</div><br>
											<div style='background-color:#F54D4D;box-shadow:0px 0px 5px #888;'>Absence - ".$absence."</div>
										</div>
										";	
									?>
									
								
                            </div>
                            <br class="clearfix"/>
                        </div>
                    </div>

                                        <!-- Notices division -->                    
                    
                    <div class="col-md-41">
                        <div class="templatemo-service-item" style='background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;height: 354px;'>
                            <div>
                                <span class="templatemo-service-item-header">Overall Attendance Progress</span><font size='4'>
                            </div>
                            
							<?php
								$query = "select STATUS, DAY(DATE) from attendance where (ID = '$_SESSION[id]')";
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
									";
							?>

                            <br class="clearfix"/>
                        </div>	
                        <br class="clearfix"/>
                    </div>
					<!-- Notices ends -->

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

        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"  type="text/javascript"></script>
        <script src="js/stickUp.min.js"  type="text/javascript"></script>
        <script src="js/colorbox/jquery.colorbox-min.js"  type="text/javascript"></script>
        <script src="js/templatemo_script.js"  type="text/javascript"></script>
        <script src="js/ajaxscript.js"  type="text/javascript"></script>        

    </body>
<script type='text/javascript' src='js/logging.js'></script>
</html>
<!-- 
    Free Responsive Template from templatemo
    http://www.templatemo.com
-->