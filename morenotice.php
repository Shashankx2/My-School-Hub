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
        if($id{0} == 1)
        {

            $conn = mysqli_connect("localhost","root","","test");
            $_SESSION['count_notices'] = $_SESSION['count_notices'] + 10;
            $morenotice = 1;
            if($r = mysqli_query($conn,"select * from notice where (SID = '$_SESSION[sid]') AND (CID = '$_SESSION[cid]') order by SNO desc limit $_SESSION[count_notices]"))  //AND (CID = '$_SESSION[cid]') 
            {
                while($row=mysqli_fetch_array($r))
                { 
                    if($morenotice <= $_SESSION['count_notices'] && $morenotice > ($_SESSION['count_notices']-10))
                    {                                        
                            echo "<div float = 'left' style = 'border-bottom:solid 1px rgba(161, 151, 151, 0.4);'><table><tr>";
                            echo "<td><a href = 'displaynotice.php?sno=$row[SNO]'><p style = 'margin-top: 0px;margin-bottom: 0px;'><font color = 'BLACK'>".$row['TITLE']."</font></p></a> ";
                            echo "<font size=2>".$row['DATE']."</font></td></tr></table></div>";                         
                    }
                                    $morenotice = $morenotice + 1;
                }
                                echo "<div id = 'noticearea".($_SESSION['count_notices']/10)."'>";
                                echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>";                                 
                                echo "<div style = 'padding:1.5%;'>";
                                echo "<center><a onclick = 'morenotices(".($_SESSION['count_notices']/10).")'>Show More</a></center>";
                                echo "</div></div></div>";
            }
        }
        else if($id{0} == 2)
        {
           $conn = mysqli_connect("localhost","root","","test");
            $_SESSION['count_notices'] = $_SESSION['count_notices'] + 10;
            $morenotice = 1;
            if($r = mysqli_query($conn,"select * from notice where (SID = '$_SESSION[sid]') order by SNO desc limit $_SESSION[count_notices]"))  //AND (CID = '$_SESSION[cid]') 
            {
                while($row=mysqli_fetch_array($r))
                { 
                    if($morenotice <= $_SESSION['count_notices'] && $morenotice > ($_SESSION['count_notices']-10))
                    {                                        
                            echo "<div float = 'left' style = 'border-bottom:solid 1px rgba(161, 151, 151, 0.4);'><table><tr>";
                            echo "<td><a href = 'displaynotice.php?sno=$row[SNO]'><p style = 'margin-top: 0px;margin-bottom: 0px;'><font color = 'BLACK'>".$row['TITLE']."</font></p></a> ";
                            echo "<font size=2>".$row['DATE']."</font></td></tr></table></div>";                         
                    }
                                    $morenotice = $morenotice + 1;
                }
                                echo "<div id = 'noticearea".($_SESSION['count_notices']/10)."'>";
                                echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>";                                 
                                echo "<div style = 'padding:1.5%;'>";
                                echo "<center><a onclick = 'morenotices(".($_SESSION['count_notices']/10).")'>Show More</a></center>";
                                echo "</div></div></div>";
            }
        }
    }
?>