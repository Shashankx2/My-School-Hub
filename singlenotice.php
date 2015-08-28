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
    $studentid = $_SESSION['id'];
    if($studentid{0} == 1){
    
        $conn = mysqli_connect("localhost","root","","test");
        if(! $conn )
        {
            die('Could not connect: ' . mysqli_error());
        }
        $query = "select * from student where (ID = '$_SESSION[id]' )";
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
}
?>
<html lang="en">
    <head>
        <title><?php echo $_SESSION['fname'] . " " . $_SESSION['lname']; ?></title>
<!--        <meta name="keywords" content="urbanic, responsive, bootstrap, fluid layout, orange, white, free website template, templatemo" />
        <meta name="description" content="Urbanic is free responsive template using Bootstrap which is compatible with mobile devices. This layout is provided by templatemo for free of charge." />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->
        
        
        <!-- Google Web Font Embed -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css'>
        

        <!-- Custom styles for this template -->
        <link href="js/colorbox/colorbox.css"  rel='stylesheet' type='text/css'>
        <link href="css/templatemo_style.css"  rel='stylesheet' type='text/css'>

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
                                    <?php echo "Class : ".$_SESSION['cid']; ?></td></tr>
                                    </table>
                                </a>
                        </div>
                        <div class="navbar-collapse collapse" >
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 14px;">
                                <li><a href="homepage.php" onclick='navforwardhome()'>HOME</a></li>
                                <li><a href="profile.php" onclick='navforwardp()'>PROFILE</a></li>
								<li><a href="attendance.php" onclick='navforwardatt()'>ATTENDANCE</a></li>
								<li><a href="assignment.php" onclick='navforwardas()'>ASSIGNMENT</a></li>
								<li class="active"><a href="notice.php" onclick='navforwardn()'>NOTICES</a></li>
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
                        <div class="templatemo-service-item">
									
						<div style='background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;'>
                            <div align="center" style = "margin-bottom: 15px;background: #94BEDA;">
                                <span class="templatemo-service-item-header">Notices</span>
                            </div>
                            <div>
							<!-------------- show single notice ---->
                                    <?php
										
										$sno = $_GET['sno'];
                                        $conn = mysqli_connect("localhost","root","","test");
                                        if(! $conn )
                                        {           
                                            die('Could not connect: ' . mysqli_error());
                                        }
                                        if($res = mysqli_query($conn,"select * from notice where (SID = '$_SESSION[sid]') and (SNO = '$sno')"))
                                        {
                                            while($row=mysqli_fetch_array($res))
                                            { 
												if($row['LINK'] == "")
													$link = "none";
												else
													$link = "<a href = notice/".$row['LINK']." />click to view</a>";
												echo "
												<div float = 'left' style='font-size: 15px;margin-bottom:20px;padding:20px;background-color: #eee;box-shadow: 0px 0px 3px #888;'>
												<table style='width:100%;'><tr><td><b>
													Uploaded on: <font color=#428bca>".$row['DATE']." <font color='#929292'>(".$row['TIME'].")</td></tr><tr><td>
													<center><b><font color=#428bca>".$row['TITLE']."  </td></tr><tr><td><br>
													<font color=#428bca>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row['CONTENT']."</td></tr><tr><td><b>
													<b>Attachment: <font color=#428bca>".$link."  </td></tr>
												</table>
												</div>";
                                            }
										}
									?>	 			
									<hr>
									<!-- show other list -->
                                    <?php
                                   
                                        $conn = mysqli_connect("localhost","root","","test");
                                        if(! $conn )
                                        {           
                                            die('Could not connect: ' . mysqli_error());
                                        }
                                        if($res = mysqli_query($conn,"select * from notice where (SID = '$_SESSION[sid]') and (CID = '$_SESSION[cid]') order by DATE desc limit 10"))
                                        {
                                            while($row=mysqli_fetch_array($res))
                                            { 
												echo "<a href = 'singlenotice.php?sno=$row[SNO]' style='text-decoration:none;' onmouseover=assignmenticonchange('".$row['SNO']."') onmouseout=assignmenticonchange2('".$row['SNO']."')>
												<div float = 'left' style='font-size: 18px;margin-bottom:20px'>
													".$row['DATE']."
													<img src='images/listicon.png' style='border-radius: 25px;' id=".$row['SNO'].">
													".$row['TITLE']."
													</div></a>";
                                            }

								echo "<div id = 'noticearea".($_SESSION['count_notices']/10)."'>";
                                echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>";                                 
                                echo "<div style = 'padding:1.5%;'>";
                                echo "<center><a onclick = 'morenotices(".($_SESSION['count_notices']/10).")'>Show More</a></center>";
                                echo "</div></div></div>";
                                        }
                                    ?>       
                            </div>
						</div>
                            <br class="clearfix"/>
                        </div>
                    </div>

                                        <!-- Notices division -->                    
                    
                    
					<!-- Notices ends -->
					                                <!-- Notifications Division-->
                                <?php
                                echo "  <div class='col-md-41'>
                                            <div class='templatemo-service-item' style='background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;'>                                            
                                                <div>
                                                    <img src='images/leaf.png' alt='icon' />
                                                    <span class='templatemo-service-item-header'>NOTIFICATIONS</span>
                                                </div>
                                                <br class = 'clearfix'>
                                            <div>";
                                
                                
                                        
                                        $conn = mysqli_connect("localhost","root","","test");
                                        if(! $conn )
                                        {           
                                            die('Could not connect: ' . mysqli_error());
                                        }
                                        if($res = mysqli_query($conn, "select * from temp_notifications where (SID = '$_SESSION[sid]') AND (CID = '$_SESSION[cid]') AND (STUDENT_ID = '$_SESSION[id]')order by SNO desc limit 10"))
                                        {
                                            while($row = mysqli_fetch_array($res))
                                            { 
                                                    echo "<div float = 'left' style = 'border-bottom:solid 1px rgba(161, 151, 151, 0.4);'><table><tr><td> <img height = 60 width = 60 src=images/Students/".$row['PHOTO']."> </td> ";
                                                    echo "<td><a href = 'removenotification.php?sno=$row[UPDATE_ID]'><p style = 'margin-top: 0px;margin-bottom: 0px;'><font color = 'BLACK'>".$row['MATTER']."</font></p></a> ";
                                                    echo "<font size=2>".$row['TIME']."</font></td></tr></table></div>";       
                                                
                                            }
                                            
                                                // division to show more notifications with ajax call
                                                    echo "<div id = 'notificationarea".($_SESSION['count_notifications']/10)."'>";
                                                    echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>";                                 
                                                    echo "<div style = 'padding:1.5%;'>";
                                                    echo "<center><a onclick = 'morenotifications(".($_SESSION['count_notifications']/10).")'>Show More</a></center>";
                                                    echo "</div></div></div>";
                                            
                                        }
                                    ?>       
                            </div>
                            <br class="clearfix"/>
                        </div>
                    </div>
					<!-- Notification ends -->
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