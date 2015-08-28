<!DOCTYPE html>
<?php
session_start();
$id = $_SESSION['id'];
 if($_SESSION['id'] == "logout" || $id{0} != 2)
{
    header("location:index.php");
    exit();
}
?>
<html lang="en">
    <head>
        <title><?php echo $_SESSION['fname'] . " " . $_SESSION['lname'] . "- NOTIFICATIONS"; ?></title>
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

<!--        <div class="templatemo-top-bar" id="templatemo-top">
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
-->
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
                                <li class="active"><a href="index.php" onclick='navforwardhomefaculty()' >Home</a></li>
                                <li><a href="profile" onclick='navforwardp()'>Profile</a></li>
                                <li><a href="logout" onclick='navforwardl()'>Logout</a></li>
                                <li><a href="#templatemo-blog">BLOG</a></li>
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

                    <!-- OPTIONS DIVISION-->
                    <div class='col-md-41'>
                        <div class='templatemo-service-item'>                                            

                            <div id="submenus" style="background: #fff;border-radius: 4px;box-shadow: 0px 0px 5px #888;padding: 10px;">
                            <a href="attendance.php" style='text-decoration:none;'>
                                <div style = 'background-color: #fff; margin-top:10px;padding:0.5%;box-shadow:0px 2px 0px #888888;display: flex;'>                              
                                    <div>attendance</div><div style="padding-left:135px"> <img src="images/icon1.png"> </div>
                                </div>  
                            </a>
                            <a href="assignment.php" style='text-decoration:none;'>
                                <div style = 'background-color: #fff; margin-top:10px;padding:0.5%;box-shadow:0px 2px 0px #888888;display: flex;'>                              
                                    <div>Assignment </div><div style="padding-left:135px"> <img src="images/icon2.png"> </div>
                                </div>  
                            </a>
                            <a href="#" style='text-decoration:none;'>
                                <div style = 'background-color: #fff; margin-top:10px;padding:0.5%;box-shadow:0px 2px 0px #888888;display: flex;'>                              
                                    <div>Sports </div><div> <img src="images/icon3.png"> </div>
                                </div>  
                            <a href="#" style='text-decoration:none;'>
                                <div style = 'background-color: #fff; margin-top:10px;padding:0.5%;box-shadow:0px 2px 0px #888888;display: flex;'>                              
                                    <div>Music </div><div> <img src="images/icon4.png"> </div>
                                </div>  
                            <a href="#" style='text-decoration:none;'>
                                <div style = 'background-color: #fff; margin-top:10px;padding:0.5%;box-shadow:0px 2px 0px #888888;display: flex;'>                              
                                    <div>Notes </div><div> <img src="images/icon5.png"> </div>
                                </div>  
                            </a>
                            <a href="#" style='text-decoration:none;'>
                                <div style = 'background-color: #fff; margin-top:10px;padding:0.5%;box-shadow:0px 2px 0px #888888;display: flex;'>                              
                                    <div>Tests </div><div> <img src="images/icon6.png"> </div>
                                </div>  
                            </a>
                            <a href="#" style='text-decoration:none;'>
                                <div style = 'background-color: #fff; margin-top:10px;padding:0.5%;display: flex;'>                              
                                    <div>Others </div><div> <img src="images/forward.png"> </div>
                                </div>  
                            </a>
                            </div>

                            <br class="clearfix"/>
                        </div>
                    </div>

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
                                $sno = $_REQUEST['sno'];
                                $conn = mysqli_connect("localhost","root","","test");
                               
                                if($r = mysqli_query($conn,"select * from updates where (SNO = '$_REQUEST[sno]')")) 
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
                            mysqli_query($conn, "delete from temp_notifications where (UPDATE_ID = '$_REQUEST[sno]') AND (STUDENT_ID = '$_SESSION[id]')");
                    
                        ?>
                            </div>
                            <br class="clearfix"/>
                        </div>
                    </div>
                    <!-- Update division ends -->
                                       

                                        <!-- NOTICES DIVISION -->                    
                    
 <!--                   <div class="col-md-41">
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
                    </div>-->
                    <!-- Notices ends -->


                    
                                              <!-- NOTIFICATIONS DIVISION-->
                    
                             <!--   <?php
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
                                                    echo "<td><a href = 'removenotification.php?sno=$row[SNO]'><p style = 'margin-top: 0px;margin-bottom: 0px;'><font color = 'BLACK'>".$row['MATTER']."</font></p></a> ";
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
                    </div>-->
                     <!--Notification ends --> 
                </div>
            </div>
        </div>

        

        
        <div id="templatemo-blog">
            <div class="container">
                <div class="row">
                    <div class="templatemo-line-header" style="margin-top: 0px;" >
                        <div class="text-center">
                            <hr class="team_hr team_hr_left hr_gray"/><span class="span_blog txt_darkgrey">BLOG POSTS</span>
                            <hr class="team_hr team_hr_right hr_gray" />
                        </div>
                    </div>
                    <br class="clearfix"/>
                </div>
                
                <div class="blog_box">
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4">
                                <a href="#">
                                    <img class="img-responsive" src="images/blog-image-1.jpg" alt="gallery 1" />
                                </a>
                            </li>
                            <li  class="col-md-8">
                                <div class="pull-left">
                                    <span class="blog_header">GRAPHIC DESIGN</span><br/>
                                    <span>Posted by : <a class="link_orange" href="#"><span class="txt_orange">Tracy</span></a></span>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-orange" href="#" role="button">18 January 2084</a>
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                    Aliquam quis rutrum risus, ut condimentum ipsum. Nullam aliquet libero augue, eget auctor felis vulputate id. Proin a enim eu libero ornare malesuada. Sed iaculis fringilla lacinia. Sed laoreet lectus vitae [...]
                                </p>
                            </li>
                        </ul>
                    </div> <!-- /.blog_post 1 -->
                    
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4"><a href="#">
                                <img class="img-responsive" src="images/blog-image-2.jpg" alt="gallery 2" /></a>
                            </li>
                            <li class="col-md-8">
                                <div class="pull-left">
                                    <span class="blog_header">WEBSITE TEMPLATE</span><br/>
                                    <span>Posted by : <a class="link_orange" href="#"><span class="txt_orange">Mary</span></a></span>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-orange" href="#" role="button">16 January 2084</a>
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                        Morbi imperdiet ipsum sit amet dui pharetra, vulputate porta neque tristique. Quisque id turpis tristique, venenatis erat sit amet, venenatis turpis. Ut tellus ipsum, posuere bibendum [...]
                                </p>
                            </li>
                        </ul>   
                    </div><!-- /.blog_post 2 -->
                    
                    <div class="templatemo_clear"></div>
                    
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4"><a href="#">
                                <img class="img-responsive" src="images/blog-image-2.jpg" alt="gallery 3" /></a>
                            </li>
                            <li class="col-md-8">
                                <div class="pull-left">
                                    <span class="blog_header">WEB DEVELOPMENT</span><br/>
                                    <span>Posted by : <a class="link_orange" href="#"><span class="txt_orange">Julia</span></a></span>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-orange" href="#" role="button">12 January 2084</a>
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                        Fusce molestie tellus risus, id commodo turpis convallis id. Morbi mattis sapien sapien, vitae lacinia ante interdum sit amet. Praesent eget varius diam, ac tempor est. Mauris at scelerisque magna [...]
                                </p>
                            </li>
                        </ul>   
                    </div><!-- /.blog_post 3 -->
                    
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                            <li class="col-md-4">
                                <a href="#">
                                    <img class="img-responsive" src="images/blog-image-1.jpg"  alt="gallery 4" />
                                </a>
                            </li>
                            <li class="col-md-8">
                                <div class="pull-left">
                                    <span class="blog_header">NEW FLUID LAYOUT</span><br/>
                                    <span>Posted by : <a class="link_orange" href="#"><span class="txt_orange">Linda</span></a></span>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-orange" href="#" role="button">10 January 2084</a>
                                </div>
                                <div class="clearfix"> </div>
                                <p class="blog_text">
                                    In venenatis sodales purus a cursus. Ut consectetur, libero ac elementum tristique, enim ante aliquet mauris, scelerisque congue magna neque ac purus. Aliquam facilisis volutpat odio [...]
                                </p>
                            </li>
                        </ul>
                    </div> <!-- /.blog_post 4 -->
                    
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
        <script src="js/ajaxscript1.js"  type="text/javascript"></script>   

    </body>
<script type='text/javascript' src='js/logging.js'></script>
</html>
<!-- 
    Free Responsive Template from templatemo
    http://www.templatemo.com
-->