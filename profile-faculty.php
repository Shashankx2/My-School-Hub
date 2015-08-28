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
  $query = "select * from faculty where (ID = '$_SESSION[id]' )";
        if($r = mysqli_query($conn,$query))
        {
             while($row=mysqli_fetch_array($r))
             {
				$_SESSION['fname'] = $row['FIRST_NAME'];
				$_SESSION['lname'] = $row['LAST_NAME'];
				$_SESSION['sid'] = $row['SID'];
				$_SESSION['school'] = $row['SCHOOL'];		
				$_SESSION['email'] = $row['EMAIL'];
				$_SESSION['photo'] = $row['PHOTO'];
				$_SESSION['mobile'] = $row['MOBILE'];				
				$_SESSION['email'] = $row['EMAIL'];				
				$_SESSION['password'] = $row['PASSWORD'];	
				$_SESSION['dob'] = $row['DOB'];	
				$_SESSION['gender'] = $row['GENDER'];
				$_SESSION['father_first_name'] = $row['FATHER_FIRST_NAME'];
				$_SESSION['father_last_name'] = $row['FATHER_LAST_NAME'];
				$_SESSION['mother_first_name'] = $row['MOTHER_FIRST_NAME'];
				$_SESSION['mother_last_name'] = $row['MOTHER_LAST_NAME'];
				$_SESSION['address'] = $row['ADDRESS'];				
				$_SESSION['count'] = 10;
				$_SESSION['count_notifications'] = 10;
				$_SESSION['count_notices'] = 10;
             } 
        }
}
		$pass = "";
		$len = strlen($_SESSION['password']);
		for($i=0 ; $i<$len ; $i++)
		{
			$pass = $pass."*";
		}
?>
<html lang="en">
    <head>
        <title>Profile - <?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></title>
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
									<?php echo "School ID : ".$_SESSION['sid'];?>
									</td></tr>
									</table>
								</a>
                        </div>
                        <div class="navbar-collapse collapse" >
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 14px;">
                                <li><a href="homepage-faculty.php" onclick='navforwardhomefaculty()'>HOME</a></li>
                                <li class="active"><a href="profile-faculty.php" onclick='navforwardpfaculty()'>PROFILE</a></li>
								<li><a href="attendance-faculty.php" onclick='navforwardattfaculty()'>ATTENDANCE</a></li>
								<li><a href="assignment-faculty.php" onclick='navforwardasfaculty()'>ASSIGNMENT</a></li>
								<li><a href="notice-faculty.php" onclick='navforwardnfaculty()'>NOTICES</a></li>
								<li><a href="music.php" onclick='navforwardm()'>MUSIC</a></li>
								<li><a href="notes.php" onclick='navforwardn()'>NOTES</a></li>
                                <li><a href="login.php" onclick='navforwardl()'>LOGOUT</a></li>
                                <li><a href="contact.php">CONTACT</a></li>
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

                    <!-- View Profile Division-->
                    <div class='col-md-43' style='background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;'>
                        <div class='templatemo-service-item'>                                            

                        <ul class="list-inline">
                            <li class="col-md-4">
                <?php echo  "
                                <a class='colorbox' href='images/Students/".$_SESSION['photo']."' data-group='gallery-graphic'>
                                    <div class='templatemo-project-box'>

                                    <img src='images/Students/".$_SESSION['photo']."' class='img-responsive' alt='gallery' height='150' width='150'/>

                                    <div class='project-overlay'>
                                    <h5>Open Image</h5>
                                    <hr />
                                    <a href = '#'><h4>Change Image</h4></a>
                                    </div>
                                    </div>
                                    </a>
									<br>
									<table>
									<tr><td bgcolor='#eeeeee'><a href='profile.php'>About me</a></td></tr>
									<tr><td ><a href='photos.php'>Photos</a></td></tr>
									<tr><td><a href='profile.php'>other</a></td></tr>
									<tr><td ><a href='profile.php'>other</a></td></tr>
									
									</table>
									
                            </li>
							<li  class='col-md-8' style='border-style: solid;border-width: 1px;border-color: #888;padding: 5px;box-shadow:0px 0px 3px #888;'>
                                <div class='profile-header' style='background-color: #FF7600;padding: 7px;color:#fff;'>
                                    <span class='blog_header'>
									
										".$_SESSION['fname']." ".$_SESSION['lname']."  
									</span>
								</div>
                                <div class='clearfix'> </div>
                                <p class='blog_text'>
                                    <table>
                                    <font size=14px>
                                    <tr><td><b><font size=3>ID : </b> </td><td><font size=2> ".$_SESSION['id']." </td></tr>
                                    <tr><td><b><font size=3>School : </b> </td><td><font size=2> ".$_SESSION['school']." </td></tr>
                                    <tr><td><b><font size=3>Class : </b> </td><td>									
									<select id='aclasslist' name='aclasslist' class='btn btn-orange'>
									";
									$query2 = "select * from faculty_class where (ID = '$_SESSION[id]' )";
										$k = 0;
										if($r = mysqli_query($conn,$query2))
										{
											while($row=mysqli_fetch_array($r))
											{
												$classes[$k] = $row['CID'];
												echo "<option value=".$row['CID'].">".$row['CID']."</option>";
												$k++;
											} 
										}
									echo "
									</select></td></tr>
                                    <tr><td><b><font size=3>Password : </b> </td><td id='passshow'><font size=2> ".$pass." &nbsp&nbsp<a>change your password</a>   </font></td></tr>									

                                    </font>
                                    </table>
                                </p>
								<br>
                                   <div class='profile-header' style='background-color: #FF7600;padding: 7px;color:#fff;' >
                                    <span class='blog_header' onclick = profileedit('".$_SESSION['dob']."','".$_SESSION['gender']."','".$_SESSION['father_first_name']."','".$_SESSION['father_last_name']."','".$_SESSION['mother_first_name']."','".$_SESSION['mother_last_name']."')>
									
											My Personal Info <font size=2> &nbsp&nbsp<a href='editprofile-faculty.php?target=mypersonalinfo'>edit</a>   </font>
										
									</span>
                                    
                                </div>
                                
                                <div class='clearfix'> </div><div id='pinfo'>
                                <p class='blog_text'>
                                    <table>
                                    <font size=14px>
                                    <tr><td><b><font size=3>Date of Birth : </b> </td><td id='profiledob'><font size=2> ".$_SESSION['dob']." </td></tr>
                                    <tr><td><b><font size=3>Gender : </b> </td><td id='profilegender'><font size=2> ".$_SESSION['gender']." </td></tr>
                                    <tr><td><b><font size=3>Father's Name : </b> </td><td id='profilefather'><font size=2> ".$_SESSION['father_first_name']." " .$_SESSION['father_last_name']." </td></tr>
                                    <tr><td><b><font size=3>Mother's Name : </b> </td><td id='profilemother'><font size=2> ".$_SESSION['mother_first_name']." " .$_SESSION['mother_last_name']." </td></tr>									

                                    </font>
                                    </table>
                                </p></div>
								
                                     <div class='profile-header' style='background-color: #FF7600;padding: 7px;color:#fff;'>
                                    <span class='blog_header'>

											Contact Information <font size=2> &nbsp&nbsp<a href='editprofile-faculty.php?target=contactinfo'>edit</a>   </font>

									</span>
                                </div>
                                <div class='clearfix'> </div>
                                <p class='blog_text'>
                                    <table>
                                    <font size=14px>
                                    <tr><td><b><font size=3>Email : </b> </td><td><font size=2> ".$_SESSION['email']." </td></tr>									
                                    <tr><td><b><font size=3>Contact No : </b> </td><td><font size=2> +91- ".$_SESSION['mobile']." </td></tr>
									<tr><td><b><font size=3>Address : </b> </td><td><font size=2> ".$_SESSION['address']." </td></tr>

                                    </font>
                                    </table>
                                </p>		

                                "; ?>
                            </li>
                        </ul>
                        </div>
                    </div>

                                        <!-- right division -->
                    
                    <div class="col-md-44">
					
						<!-- for time table -->
						
                        <div class="templatemo-service-item" style='background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;'>
                            <div>
                                <span class="templatemo-service-item-header">My Time Table</span>
                            </div>
                            
							<table align='center' border='1' style='width:100%;border-style:hidden;box-shadow:0px 0px 5px #888;' CELLPADDING='6'>
								<thead style='font-size:16px;color:#fff;'>
								<tr style='background:#FF7600;'>
									<th>PERIOD</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
								</tr>
								<thead>
								<tbody style='font-size:11px;font-weight: bold'>
								<?php
									  $query = "select * from timetable_faculty where (SID = '$_SESSION[sid]') AND (ID = '$_SESSION[id]' )";
											if($r = mysqli_query($conn,$query))
											{
												 while($row=mysqli_fetch_array($r))
												 {

													echo "<tr>
														<td style='background:#94BEDA;color:#fff;'>".$row['PERIOD']."</td>";
														
                                                        if($row['MONDAY'] == NULL)
                                                        {   
                                                            echo "<td style='background:#fff;'>".$row['MONDAY']."</td>";
                                                        }
                                                        else
                                                        {
                                                            echo "<td style='background:#eee;'>".$row['MONDAY']."<br>(".$row['CID'].")</td>";
                                                        }

														if($row['TUESDAY'] == NULL)
                                                        {   
                                                            echo "<td style='background:#fff;'>".$row['TUESDAY']."</td>";
                                                        }
                                                        else
                                                        {
                                                            echo "<td style='background:#eee;'>".$row['TUESDAY']."<br>(".$row['CID'].")</td>";
                                                        }

                                                        if($row['WEDNESDAY'] == NULL)
                                                        {   
                                                            echo "<td style='background:#fff;'>".$row['WEDNESDAY']."</td>";
                                                        }
                                                        else
                                                        {
                                                            echo "<td style='background:#eee;'>".$row['WEDNESDAY']."<br>(".$row['CID'].")</td>";
                                                        }

                                                        if($row['THURSDAY'] == NULL)
                                                        {   
                                                            echo "<td style='background:#fff;'>".$row['THURSDAY']."</td>";
                                                        }
                                                        else
                                                        {
                                                            echo "<td style='background:#eee;'>".$row['THURSDAY']."<br>(".$row['CID'].")</td>";
                                                        }

                                                        if($row['FRIDAY'] == NULL)
                                                        {   
                                                            echo "<td style='background:#fff;'>".$row['FRIDAY']."</td>";
                                                        }
                                                        else
                                                        {
                                                            echo "<td style='background:#eee;'>".$row['FRIDAY']."<br>(".$row['CID'].")</td>";
                                                        }

                                                        if($row['SATURDAY'] == NULL)
                                                        {   
                                                            echo "<td style='background:#fff;'>".$row['SATURDAY']."</td>";
                                                        }
                                                        else
                                                        {
                                                            echo "<td style='background:#eee;'>".$row['SATURDAY']."<br>(".$row['CID'].")</td>";
                                                        }
                                                        
													echo "</tr>";
												 }
											}
								?>
								<tbody>
							</table>

                            <br class="clearfix"/>
                        </div>
						
						<!-- for showing attendance percentage -->
						
                        <div class="templatemo-service-item" style='background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;height: 280px;'>
                            <div>
                                <span class="templatemo-service-item-header">My Attendance Progress</span><font size='4'><a href='attendance.php'>view attendance</a>
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
                                    if(($presence + $absence) == 0)
                                    {
                                        $percentage = 0;
                                        echo"<table align='center'><tr><td>
                                        <div class='c100 p".$percentage." big'>
                                            <span>".$percentage."%</span>
                                            <div class='slice'>
                                                <div class='bar'></div>
                                                <div class='fill'></div>
                                            </div>
                                        </div></td><td>
                                        <div style='background-color:#43D545;box-shadow:0px 0px 5px #888;'>Presence - ".$presence."</div><br>
                                        <div style='background-color:#F54D4D;box-shadow:0px 0px 5px #888;'>Absence - ".$absence."</div></td></tr></table>
                                    ";    
                                    }
                                    else
                                    {
    									$percentage = floor($presence*100/($presence + $absence));
    									echo"<table><tr><td>
    									    <div class='c100 p".$percentage." big'>
    											<span>".$percentage."%</span>
    											<div class='slice'>
    												<div class='bar'></div>
    												<div class='fill'></div>
    											</div>
    										</div></td><td>
    										<div style='background-color:#43D545;box-shadow:0px 0px 5px #888;'>Presence - ".$presence."</div><br>
    										<div style='background-color:#F54D4D;box-shadow:0px 0px 5px #888;'>Absence - ".$absence."</div></td></tr></table>
    									";
                                    }
							?>

                            <br class="clearfix"/>
                        </div>						
                    </div>
					<!-- Calender division ends -->

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
        <script src="js/ajaxscript1.js"  type="text/javascript"></script>   

    </body>
<script type='text/javascript' src='js/logging.js'></script>
</html>
