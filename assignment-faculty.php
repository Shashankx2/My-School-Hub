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
?>
<html lang="en">
    <head>
        <title>Assignment - <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?></title>
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
									<?php echo "School ID : ".$_SESSION['sid']; ?>
									</td></tr>
									</table>
								</a>
                        </div>
                        <div class="navbar-collapse collapse" >
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 14px;">
                                <li><a href="homepage-faculty.php" onclick='navforwardhomefaculty()'>HOME</a></li>
                                <li><a href="profile-faculty.php" onclick='navforwardpfaculty()'>PROFILE</a></li>
								<li><a href="attendance-faculty.php" onclick='navforwardattfaculty()'>ATTENDANCE</a></li>
								<li class="active"><a href="assignment-faculty.php" onclick='navforwardasfaculty()'>ASSIGNMENT</a></li>
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

                                        <!--Upload assignment Division-->

                    <div class="col-md-43">
                        <div class="templatemo-service-item" style='background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;'>
                            
                            <div align = "center" style = "margin-bottom: 15px;background: #94BEDA;">
                                <span class="templatemo-service-item-header">Upload New Assignment</span>
                            </div>
						<!--  form ----------------  -->
							<form action="saveassignment.php?target=save&sno=12" method="post" enctype="multipart/form-data">
								<div class="form-group">							
									<select id="aclasslist" name="aclasslist" class="btn btn-orange">
									<?php
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
									?>
									</select>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Title.." name="atitle"/>
								</div>
								<div class="form-group">
									<textarea  class="form-control" style="height: 60px;" placeholder="Description..." name="acontent"></textarea>
								</div>
								<div class="form-group">
									File upload (optional):&nbsp&nbsp
									<input type="file" name="file"/>
								</div>								
								<div class="form-group">								
								Deadline: &nbsp&nbsp
								

                                <!--    --------------- deadline------------- -->
								

                                	<select id="adate" name="adate" class="btn btn-orange">
									<?php
									//-----for date----------
									for($d=1 ; $d<=31 ; $d++){
										echo "<option value=".$d.">".$d."</option>";
									}
									?>
									</select>
									<select id="amonth" name="amonth" class="btn btn-orange">
									<?php
									//--------for month----------
									$months = array("Month","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
									for($d=1 ; $d<=12 ; $d++){
										echo "<option value=".$d.">".$months[$d]."</option>";
									}
									?>
									</select>								
									<select id="ayear" name="ayear" class="btn btn-orange">
									<?php
									//------- for year-------
									for($d=2015 ; $d<=2020 ; $d++){
										echo "<option value=".$d.">".$d."</option>";
									}
									?>
									</select>	
								</div>

								<center>
									<button type="submit" class="btn btn-orange">Submit</button>
								</center>
							</form>
						
                            <br class="clearfix"/>
                        </div>
                    </div>

                                        <!-- Notices division -->                    
                    
                    <div class="col-md-44">
                        <div class="templatemo-service-item" style='background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;'>
                            
                            <div align="center" style = "margin-bottom: 15px;background: #94BEDA;">
                                <span class="templatemo-service-item-header">Uploaded Assignments</span>
                            </div>
							<a class="btn btn-orange" href="myassignment-faculty.php" role="button">My Uploads</a>
                            <br><br>
                            <div>
                   
                                    <?php
                                   
                                        $conn = mysqli_connect("localhost","root","","test");
                                        if(! $conn )
                                        {           
                                            die('Could not connect: ' . mysqli_error());
                                        }
                                        if($res = mysqli_query($conn,"select * from assignment where (SID = '$_SESSION[sid]') order by SNO desc limit 10"))
                                        {
                                            while($row=mysqli_fetch_array($res))
                                            { 
												echo "<a href = 'singleassignment-faculty.php?sno=$row[SNO]' style='text-decoration:none;' onmouseover=assignmenticonchange('".$row['SNO']."') onmouseout=assignmenticonchange2('".$row['SNO']."')>
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
                            <br class="clearfix"/>
                        </div>
                        <br class="clearfix"/>
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

        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"  type="text/javascript"></script>
        <script src="js/stickUp.min.js"  type="text/javascript"></script>
        <script src="js/colorbox/jquery.colorbox-min.js"  type="text/javascript"></script>
        <script src="js/templatemo_script.js"  type="text/javascript"></script>
        <script src="js/ajaxscript.js"  type="text/javascript"></script>        

    </body>
<script type='text/javascript' src='js/logging.js'></script>
</html>
