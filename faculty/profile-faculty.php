<!DOCTYPE html>
<?php
session_start();
 if($_SESSION['sid'] == "logout")
{
    header("location:index.php");
    exit();
}
else
{ 
 $conn = mysqli_connect("localhost","root","","school");
  if(! $conn )
  {
     die('Could not connect: ' . mysqli_error());
  }
  $query = "SELECT * FROM $_SESSION[table] where (Id = '$_SESSION[sid]' )";
        if($r = mysqli_query($conn,$query))
        {
             while($row=mysqli_fetch_array($r))
             {
        $_SESSION['fname'] = $row['First_Name'];
        $_SESSION['lname'] = $row['Last_Name'];
        $_SESSION['school'] = $row['School'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['photo'] = $row['Photo'];
        $_SESSION['schoolcode'] = $row['SchoolCode'];
        $_SESSION['password'] = $row['Password'];		
		$_SESSION['gender'] = $row['Gender'];
		$_SESSION['father'] = $row['Father_Name'];
		$_SESSION['mother'] = $row['Mother_Name'];
		$_SESSION['dob'] = $row['DOB'];
		$_SESSION['mobile'] = $row['Mobile_Number'];			
        $_SESSION['count'] = 10;
             } 
        }
}
		$pass = " ";
		$len = strlen($_SESSION['password']);
		for($i=0 ; $i<$len ; $i++)
		{
			$pass = $pass+"*";
		}

?>
<html lang="en">
    <head>
        <title>Urbanic Bootstrap Template</title>
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
    
    <body>

                        <!--Logo Bar-->

        <div class="templatemo-top-bar" id="templatemo-top">
            <div class="container">
                <!-- Static navbar -->
                <div  role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#" rel="nofollow"><img src="images/templatemo_logo.png" alt="logo"/></a>
                        </div>
                        
                    </div><!--/.container-fluid -->
                </div><!--/.navbar -->
            </div> <!-- /container -->  
        </div>

                        <!--Profile Bar-->

        <div class = "templatemo-top-menu">
             <div class="container">
                <div class="subheader">
                    <div class="pull-left">
                            <table>
                            <tr><td><img height = 60 width = 60 src="images/students/<?php echo $_SESSION['photo']; ?>"></td>
                            <th><?php echo $_SESSION['fname'] ." ". $_SESSION['lname']; ?><br/>
                            <?php echo $_SESSION['school']; ?><br/>
                            <?php echo "ID : ".$_SESSION['sid']; ?><br/>
                            <!--<?php echo "Class : ".$_SESSION['class']; ?></td></tr>-->
                            </table>
                    </div>

                </div>
                <b><div class="navbar-collapse collapse" id="templatemo-nav-bar">
                            <ul class="nav navbar-nav navbar-right" style="margin-top: 15px;">
                                <li class="active"><a href="#" onclick='navforwardhomefaculty()'>Home</a></li>
                                <li><a href="#" onclick='navforwardp()'>Profile</a></li>
                                <li><a href="#" onclick='navforwardl()'>Log Out</a></li>
                                <li><a href="#" onclick='navforwardb()'>BLOG</a></li>
                                <li><a href="#" onclick='navforwardc()'>Contact us</a></li>
                                <li><a href="#templatemo-contact">Contact us</a></li>
                            </ul>
                        </div><!--/.nav-collapse --></b>
            </div>
        </div>
        
                        <!--Menu Bar-->

        <div>
            <b><table align="center">
                <tr bgcolor="#EEE">
                <td>
                    <div class="navbar-collapse collapse" id="templatemo-nav-bar">
                        <ul class="nav navbar-nav navbar-center" style="margin-top: 0px;">
                            <li><a href="attendence.php">ATTENDENCE</a></li>
                            <li><a href="assignment.php">ASSIGNMENT</a></li>
                            <li><a href="sports.php">SPORTS</a></li>
                            <li><a href="music.php">MUSIC</a></li>
                            <li><a href="notes.php">NOTES</a></li>
                            <li><a href="tests.php">TESTS</a></li>
                            <li><a href="others.php">OTHERS</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </td></tr>
            </table></b>
        </div>

                        <!--Main Homepage-->
        
        
        

        
        <div id="templatemo-blog">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header" style="margin-top: 0px;" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="span_blog txt_darkgrey">My Profile</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                    <br class="clearfix"/>
                </div>
                
                <div class="blog_box">
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4">
                <?php echo  "
                                <a class='colorbox' href='images/Students/".$_SESSION['photo']."' data-group='gallery-graphic'>
                                    <div class='templatemo-project-box'>

                                    <img src='images/Students/".$_SESSION['photo']."' class='img-responsive' alt='gallery' />

                                    <div class='project-overlay'>
                                    <h5>Open Image</h5>
                                    <hr />
                                    <a href = '#'><h4>Change Image</h4></a>
                                    </div>
                                    </div>
                                    </a>
									<br><br>

									<table>
									<tr><td bgcolor='#eeeeee'><a href='profile.php'>About me</a></td></tr>
									<tr><td ><a href='profile.php'>Photos</a></td></tr>
									<tr><td><a href='profile.php'>other</a></td></tr>
									<tr><td ><a href='profile.php'>other</a></td></tr>
									
									</table>
									
                            </li>
                            <li  class='col-md-8'>
                                <div class='pull-left'>
                                    <span class='blog_header'>
									
											My Information &nbsp&nbsp
									
									</span><br/>
                                    <span>".$_SESSION['fname']." ".$_SESSION['lname']."  <a class='link_orange' href='#''><span class='txt_orange'></span></a></span>
                                </div>
                                <div class='clearfix'> </div>
                                <p class='blog_text'>
                                    <table>
                                    <font size=14px>
                                    <tr><td><b><font size=3>ID : </b> </td><td><font size=2> ".$_SESSION['sid']." </td></tr>
                                    <tr><td><b><font size=3>School : </b> </td><td><font size=2> ".$_SESSION['school']." </td></tr>
                                    <tr><td><b><font size=3>Class : </b> </td><td><font size=2> ".$_SESSION['table']." </td></tr>
                                    <tr><td><b><font size=3>Password : </b> </td><td><font size=2> ".$pass." <font size=2> &nbsp&nbsp<a onclick='passwordchange()'>change your password</a>   </font></td></tr>									

                                    </font>
                                    </table>
                                </p>
								<br>
                                    <div class='pull-left'>
                                    <span class='blog_header'>
									
											My Personal Info <font size=2> &nbsp&nbsp<a href='editprofile.php?target=mypersonalinfo'>edit</a>   </font>
										
									</span>
                                    
                                </div>
                                
                                <div class='clearfix'> </div><div id='pinfo'>
                                <p class='blog_text'>
                                    <table>
                                    <font size=14px>
                                    <tr><td><b><font size=3>Date of Birth : </b> </td><td><font size=2> ".$_SESSION['dob']." </td></tr>
                                    <tr><td><b><font size=3>Gender : </b> </td><td><font size=2> ".$_SESSION['gender']." </td></tr>
                                    <tr><td><b><font size=3>Father's Name : </b> </td><td><font size=2> ".$_SESSION['father']." </td></tr>
                                    <tr><td><b><font size=3>Mother's Name : </b> </td><td><font size=2> ".$_SESSION['mother']." </td></tr>									

                                    </font>
                                    </table>
                                </p></div>
								
                                    <div class='pull-left'>
                                    <span class='blog_header'>
									<div style = 'background-color: #eeeeee; margin-top:10px;'>
										<div style = 'padding:1.5%;'>
											Contact Information <font size=2> &nbsp&nbsp<a href='editprofile.php?target=contactinfo'>edit</a>   </font>
										</div></div>
									</span><br/>
                                    
                                </div>
                                <div class='clearfix'> </div>
                                <p class='blog_text'>
                                    <table>
                                    <font size=14px>
                                    <tr><td><b><font size=3>Email : </b> </td><td><font size=2> ".$_SESSION['email']." </td></tr>									
                                    <tr><td><b><font size=3>Contact No : </b> </td><td><font size=2> +91- ".$_SESSION['mobile']." </td></tr>
                                    <tr><td><b><font size=3>Parents Contact No : </b> </td><td><font size=2> +91- ".$_SESSION['pmobile']." </td></tr>

                                    </font>
                                    </table>
                                </p>		

                                "; ?>
                            </li>
                        </ul>
                    </div> <!-- /.blog_post 1 -->
                    
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            
                                <div>
                                <?php
                                if(!$conn )
                                {           
                                    die('Could not connect: ' .mysqli_error());
                                }
                            
                                if($r = mysqli_query($conn,"select * from updates where ((Id = '$_SESSION[sid]')) order by Sno desc limit 10"))
                                {

                                    
                                    while($row=mysqli_fetch_array($r))
                                    {                                        
                                            echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>";

                                                echo    "<div style = 'padding:1.5%; padding-bottom:0px;'>";
                                                
                                                    echo    "<table>";
                                                    echo    " <tr><td> ";
                                                    echo    "<a href=profile.php?user=hello><img height = 50 width = 50 src=images/Students/".$row['Photo']."></a> ";
                                                    echo    " </td><td> ";
                                                    echo    "<p style='margin:0px;'><a href=profile.php?user=hello><span class='blog_header'>".$row['Name']."</span></a> <br>";
                                                    echo    "<font style='verdana' size='2'>";
                                                    echo    $row['Date']."</font></p></td>";
                                                    echo    "</tr></table>";
                                                    echo    "<p class=blog_post><font color=black>";
                                                    echo    $row['Content']."</font></p>";
                                                
                                                echo "</div>";

                                                echo "<div style = 'padding:1.5%; padding-top:0px; background-color: #eeefff;'>";
                                                if($c = mysqli_query($conn,"select * from comments where (Update_id = '$row[S_no]') order by date desc limit 3"))
                                                {                                                    
                                                    echo "<table>";
                                                    while($comment=mysqli_fetch_array($c))
                                                    {
                                                        echo "<tr style = 'border-bottom:1px solid; border-color:#D5D7E9'><td style = 'padding-right:10px; padding-top:0px border-bottom:1px solid'>";
                                                        echo "<a href=profile.php?user=hello><img height = 50 width = 50 src=images/Students/".$comment['Photo']."></a>";
                                                        echo "</td><td >";
                                                        echo "<p style='margin:0px;'><a href=profile.php?user=hello><span class='blog_header'>".$comment['Name']."</span></a><br><font style='verdana' size='2'>".$comment['Date']."</font><br>  <br>";
                                                        echo "<font color=black>".$comment['Content']."</font>";
                                                        echo "</p></td></tr>";                                                
                                                    }
                                                }

                                                    echo "<tr><td style = 'padding-right:10px; padding-top:0px'>";
                                                    echo "<a href=profile.php?user=hello><img height = 50 width = 40 src=images/Students/".$_SESSION['photo']."></a>";
                                                    echo "</td><td style = 'padding-top:10px'>";
                                                    echo "<p style='margin:0px;'><a href=profile.php?user=hello><span class='blog_header'>".$_SESSION['fname']." ".$_SESSION['lname']."</span></a> <br>";
                                                    echo "<form action='#'><textarea style='margin: 0px; width:400px; height: 25px;'></textarea></form>";
                                                    echo "</p></td></tr></table>";

                                                echo "</div>";

                                            echo "</div>";                          
                                    }
                                }
                                    // division to show more updates with ajax call
                                echo "<div id = 'updatearea".($_SESSION['count']/10)."'>";
                                echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>";                                 
                                echo "<div style = 'padding:1.5%;'>";
                                echo "<center><a onclick = 'moreupdates_profile(".($_SESSION['count']/10).")'>Show More</a></center>";


                                echo "</div></div></div>";
                            ?>
                            </div>
                            
                        </ul>	
                    </div><!-- /.blog_post 2 -->
                    
 
                    </div><!-- /.blog_post 3 -->
                    
                    
                    
                </div>
            </div>
        </div>

        <div id="templatemo-contact">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header head_contact">
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey">CONTACT US</span>
                            <hr class="team_hr team_hr_right hr_gray"/>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="templatemo-contact-map" id="map-canvas"> </div>  
                        <div class="clearfix"></div>
                        <i>You can find us on D288 CR Road, Laxmi Nagar, <span class="txt_orange">AKTechnologies</span> in New Delhi.</i>
                    </div>
                    <div class="col-md-4 contact_right">
                        <p>Lorem ipsum dolor sit amet, consectetu adipiscing elit pendisse as a molesti.</p>
                        <p><img src="images/location.png" alt="icon 1" /> 123 Dagon Studio, Yakin Street, Digital Estate</p>
                        <p><img src="images/phone1.png"  alt="icon 2" /> 010-020-0340</p>
                        <p><img src="images/globe.png" alt="icon 3" /><a class="link_orange" href="#"><span class="txt_orange">www.templatemo.com</span></a></p>
                        <form class="form-horizontal" action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Name..." maxlength="40" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Your Email..." maxlength="40" />
                            </div>
                            <div class="form-group">
                                <textarea  class="form-control" style="height: 130px;" placeholder="Write down your message..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-orange pull-right">SEND</button>
                        </form>
                        	
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /#templatemo-contact -->


        <div class="templatemo-tweets">
            <div class="container">
                <div class="row" style="margin-top:20px;">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-1">
                                <img src="images/quote.png" alt="icon" />
                        </div>
                        <div class="col-md-7 tweet_txt" >
                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit suspendiise as a molesti neque vestibulum,  persiutsor de andues mare fricilus ipsum dolor sit amet cons forukus.</span>
                                <br/>
                                <span class="twitter_user">Moe Moe, Yangon</span>
                        </div>
                        <div class="col-md-2">
                        </div>
                 </div><!-- /.row -->
            </div><!-- /.container -->
        </div>

        <div class="templatemo-partners" >
            <div class="container">
                <div class="row">


                    <div class="templatemo-line-header" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="txt_darkgrey">OUR PARTNERS</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="text-center">

                        <div style="margin-top:60px;">
                            <ul class="list-inline">
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="images/partner1.jpg" class="img-responsive" alt="partner 1" /></a>
                                </li>
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="images/partner2.jpg" class="img-responsive" alt="partner 2" /></a>
                                </li>
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="images/partner3.jpg" class="img-responsive" alt="partner 3" /></a>
                                </li>
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="images/partner4.jpg" class="img-responsive" alt="partner 4" /></a>
                                </li>
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="images/partner5.jpg" class="img-responsive" alt="partner 5" /></a>
                                </li>
                                <li class="col-sm-2 col-md-2 templatemo-partner-item">
                                    <a href="#"><img src="images/partner6.jpg" class="img-responsive" alt="partner 6" /></a>
                                </li>
                            </ul>

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