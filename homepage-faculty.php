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
				$_SESSION['cid'] = "faculty";
				$_SESSION['email'] = $row['EMAIL'];
				$_SESSION['photo'] = $row['PHOTO'];
				$_SESSION['count'] = 10;
				$_SESSION['count_notifications'] = 10;
				$_SESSION['count_notices'] = 10;
             } 
        }
		//  to get the detail of classes teaches by faculty
	$query2 = "select * from faculty_class where (ID = '$_SESSION[id]' )";
		$rowcount = 0;
        if($r = mysqli_query($conn,$query2))
        {
             while($row=mysqli_fetch_array($r))
             {
				$_SESSION[$rowcount] = $row['CID'];
				$_SESSION['no_of_classes'] = $rowcount;
				$rowcount++;
             } 
        }	
}
?>
<html lang="en">
    <head>
        <title><?php echo $_SESSION['fname'] . " " . $_SESSION['lname'] ?></title>
<!-- <meta name="keywords" content="urbanic, responsive, bootstrap, fluid layout, orange, white, free website template, templatemo" />
		<meta name="description" content="Urbanic is free responsive template using Bootstrap which is compatible with mobile devices. This layout is provided by templatemo for free of charge." />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!<link rel="shortcut icon" href="PUT YOUR FAVICON HERE">-->
        
        
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
									<?php echo "Class : ";
										for($i=0 ; $i<=$_SESSION['no_of_classes'] ; $i++){
											echo $_SESSION[$i] . " | ";
										}
									?></td></tr>
									</table>
								</a>
                        </div>
                        <div class="navbar-collapse collapse" >
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 14px;">
                                <li class="active"><a href="homepage-faculty.php" onclick='navforwardhomefaculty()'>HOME</a></li>
                                <li><a href="profile-faculty.php" onclick='navforwardpfaculty()'>PROFILE</a></li>
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

                                        <!-- Notices division -->                    
                    
                    <div class="col-md-41">
                        <div class="templatemo-service-item" style="background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;">
                            
                            <div style="background:#94BEDA;">
                                <span class="templatemo-service-item-header">NOTICES</span>
								<a href='notice-faculty.php' class="btn btn-orange" style='text-decoration:none;'><span>Add new</span></a>
                            </div>
                            <br>
                            <div>
                                
                                    <?php
                                    
                                        
                                        $conn = mysqli_connect("localhost","root","","test");
                                        if(! $conn )
                                        {           
                                            die('Could not connect: ' . mysqli_error());
                                        }
                                        if($res = mysqli_query($conn,"select * from notice where (SID = '$_SESSION[sid]') order by SNO desc limit 10"))
                                        {
                                            while($row=mysqli_fetch_array($res))
                                            { 
                                                            echo "<div float = 'left' style = 'border-bottom:solid 1px rgba(161, 151, 151, 0.4);'><table><tr>";
                                                            echo "<td><a href = 'singlenotice-faculty.php?sno=$row[SNO]'><p style = 'margin-top: 0px;margin-bottom: 0px;font-size:20px;color: #6B8BCA;'>".$row['TITLE']."</p></a> ";
                                                            echo "<font size=2 style='color: #929292;'>".$row['DATE']."</font></td></tr></table></div>";
                                            }
                                            echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>";                                 
                                echo "<div style = 'padding:1.5%;'>";
                                echo "<center><a href = 'notice-faculty.php'>Show More</a></center>";
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
                        <div class="templatemo-service-item" >
                            

                            <div align = "center">
								<form action="update.php" method="post" onsubmit = "return checkupdatefun()" enctype="multipart/form-data">
								<div class="share">
									<div class="arrow"></div>
									<div class="panel panel-default" style="margin-bottom: -24px;">
										<div class="panel-heading"><i class="fa fa-file"></i> <span class="templatemo-service-item-header">WANT TO SHARE SOMETHING</span></div>
										  <div class="panel-body">
											<div class="">
												<textarea name="message" cols="40" rows="10" id="status_message" class="form-control message" style="height: 40px; overflow: hidden;" placeholder="What you want to share ?" onfocus='textareafocus()' onblur='textareablur()'></textarea> 
											</div>
										  </div>
										  <div id='buttonarea'>
									  
										  </div>
									</div>
								</div>
														
								</form>
							</div>
                            <br>
                            
						<div >
                            <?php
                                if(!$conn )
                                {           
                                    die('Could not connect: ' .mysqli_error());
                                }
                            
                                if($r = mysqli_query($conn,"select * from updates where (SID = '$_SESSION[sid]') and (CID = 'faculty')order by SNO desc limit 10"))
                                {	
									while($row=mysqli_fetch_array($r))
                                    {                                    
                                            echo "<div class = 'updatediv' style='background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;'>";

                                                echo    "<div style = 'padding:1.5%; padding-bottom:0px;'>";
                                                
                                                    echo    "<table>"; 
                                                    echo    " <tr><td> ";
                                                    echo    "<a href=profile.php?user=hello><img height = 50 width = 50 src=images/Students/".$row['PHOTO']." style='border-radius: 5px;'></a> ";
                                                    echo    " </td><td> ";
                                                    echo    "<p style='margin:0px;'><a href=profile.php?user=hello><span class='blog_header'>".$row['NAME']."</span></a> <br>";
                                                    echo    "<font style='verdana' size='2'>";
                                                    echo    $row['TIME']."</font></p></td>";
                                                    echo    "</tr></table>";
                                                    echo    "<p class=blog_post><font color=black>";
                                                    echo    $row['CONTENT']."</font></p>";
                                                
                                                echo "</div>";

                                                echo "<div style = 'padding:1.5%; padding-top:0px; background-color: #fff; border-radius: 13px;'>";
                                                if($c = mysqli_query($conn,"select * from comment where (UPDATEID = '$row[SNO]') order by SNO desc limit 3"))
                                                {                                                    
                                                    echo "<table >";
                                                    while($comment=mysqli_fetch_array($c))
                                                    {
                                                        echo "<tr style = 'border-bottom:1px solid; border-color:#D5D7E9'><td style = 'float: left; padding-right:10px; padding-top:5px'>";
                                                        echo "<a href=profile.php?user=hello><img height = 50 width = 50 src=images/Students/".$comment['PHOTO']." style='border-radius: 5px;'></a>";
                                                        echo "</td><td>";
                                                        echo "<p style='margin:0px;'><a href=profile.php?user=hello><span class='blog_header'>".$comment['NAME']."</span></a> s  <font color=black>".$comment['COMMENT']."</font><br><font style='verdana' size='2'>".$comment['TIME']."</font><br>  <br>";
                                                        echo "</p></td></tr>";                                                
                                                    }
                                                }

                                                    echo "<tr><td style = 'float: left; padding-right:10px; padding-top:5px'>";
                                                    echo "<a href=profile.php?user=hello><img height = 50 width = 50 src=images/Students/".$_SESSION['photo']." style='border-radius: 5px;'></a>";
                                                    echo "</td><td>";
                                                    echo "<p style='margin:0px;'><a href=profile.php?user=hello><span class='blog_header'>".$_SESSION['fname']." ".$_SESSION['lname']."</span></a> <br>";
                                                    echo "<form action='#'><textarea style='margin: 0px; width:400px; height: 25px;'></textarea></form>";
                                                    echo "</p></td></tr></table>";

                                                echo "</div>";

                                            echo "</div>";                          
                                    }
                                }
                                    /// DIVISION TO SHOW MORE UPDATES USING AJAX CALL
                                echo "<div id = 'updatearea".($_SESSION['count']/10)."'>";
                                echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>";                                 
                                echo "<div style = 'padding:1.5%;'>";
                                echo "<center><a onclick = 'moreupdates(".($_SESSION['count']/10).")'>Show More</a></center>";


                                echo "</div></div></div>";
                            ?>
                            </div>
                            <br class="clearfix"/>
                        </div>
                    </div>
					<!-- Update division ends -->

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
        <script src="js/ajaxscript1.js"  type="text/javascript"></script>   

    </body>
<script type='text/javascript' src='js/logging.js'></script>
</html>
