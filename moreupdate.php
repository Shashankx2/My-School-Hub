<?php
    session_start();
    if($_SESSION['id'] == "logout")
    {
        header("location:index.php");
        exit();
    }
    else
    {
        $id = $_SESSION['id'];

            $conn = mysqli_connect("localhost","root","","test");
            $_SESSION['count'] = $_SESSION['count'] + 10;
            $moreupdate = 1;
                if($r = mysqli_query($conn,"select * from updates where (SID = '$_SESSION[sid]') AND (CID = '$_SESSION[cid]') order by SNO desc limit $_SESSION[count]"))  //AND (CID = '$_SESSION[cid]') 
                {
                    while($row=mysqli_fetch_array($r))
                    { 
                        if($moreupdate <= $_SESSION['count'] && $moreupdate > ($_SESSION['count']-10))
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
                                        $moreupdate = $moreupdate + 1;
                    }
                                        echo "<div id = 'updatearea".($_SESSION['count']/10)."'>";
                                    echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>"; 
                                    echo "<center><a onclick = 'moreupdates(".($_SESSION['count']/10).")'>Show More</a></center>";

                                    echo "<div style = 'padding:1.5%;'>";
                                    echo "</div></div></div>";
                }
            
    }
?>