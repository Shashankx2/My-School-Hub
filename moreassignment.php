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
    if($r = mysqli_query($conn,"select * from assignment_0001 where (Class = 'ninth') order by Date desc limit $_SESSION[count]"))
                                {

                                    while($row=mysqli_fetch_array($r))
                                    { 

                                        if($moreupdate <= $_SESSION['count'] && $moreupdate > ($_SESSION['count']-10))
                                        {                                        
                                            echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>";
												echo    "<div style = 'padding:1.5%; padding-bottom:0px;'>";
                                                    echo    "<table border=0>";
                                                    echo    " <tr><td> ";
                                                    echo    "<p style='margin:0px;'><font color='black'><span class='blog_header'>".$row['Title']."</span></font><br>";
                                                    echo    "<font style='verdana' size='2' color='black'><b>Submitted By :</b>".$row['Teacher_Name']."</font><br>";
													echo    "<font style='verdana' size='2'>";
                                                    echo    $row['Date']."</font></p></td>";
                                                    echo    "</tr><tr><td>";
                                                    echo    "<p style='margin:0px;' class=blog_post><font color=black>";
                                                    echo    $row['Description']."</font></p></td></tr></table>";
                                                echo "</div>";
                                            echo "</div>";                           
                                        }
                                        $moreupdate = $moreupdate + 1;
                                    }
                                    echo "<div id = 'updatearea".($_SESSION['count']/10)."'>";
                                echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>"; 
                                echo "<center><a onclick = 'moreassignment(".($_SESSION['count']/10).")'>Show More</a></center>";

                                echo "<div style = 'padding:1.5%;'>";
                                echo "</div></div></div>";
                                }
                            ?>