<?php
    session_start();
    if($_SESSION['sid'] == "logout")
    {
        header("location:index.php");
        exit();
    }
    $conn = mysqli_connect("localhost","root","","school");
    $_SESSION['count'] = $_SESSION['count'] + 10;
    $moreupdate = 1;
    if($r = mysqli_query($conn,"select * from updates where (Id = '$_SESSION[sid]') order by Sno desc limit $_SESSION[count]"))
                                {

                                    while($row=mysqli_fetch_array($r))
                                    { 

                                        if($moreupdate <= $_SESSION['count'] && $moreupdate > ($_SESSION['count']-10))
                                        {                                        
                                            echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>";

                                                echo    "<div style = 'padding:1.5%;'>";
                                                echo    "<table>";
                                                echo    " <tr><td> ";
                                                echo    "<a href=profile.php?user=hello><img height = 50 width = 40 src=images/Students/".$row['Photo']."></a> ";
                                                echo    " </td><td> ";
                                                echo    "<p style='margin:0px;'><a href=profile.php?user=hello><span class='blog_header'>".$row['Name']."</span></a> <br>";
                                                echo    "<font style='verdana' size='2'>";
                                                echo    $row['Date']."</font></p></td>";
                                                echo    "</tr></table>";
                                                echo    "<p class=blog_post><font color=black>";
                                                echo    $row['Content']."</font></p>";
                                                
                                            echo "</div></div>";                          
                                        }
                                        $moreupdate = $moreupdate + 1;
                                    }
                                    echo "<div id = 'updatearea".($_SESSION['count']/10)."'>";
                                echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>"; 
                                echo "<center><a onclick = 'moreupdates(".($_SESSION['count']/10).")'>Show More</a></center>";

                                echo "<div style = 'padding:1.5%;'>";
                                echo "</div></div></div>";
                                }
                            ?>