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
    $_SESSION['count_notifications'] = $_SESSION['count_notifications'] + 10;
    $morenotification = 1;

    if($r = mysqli_query($conn,"select * from temp_notifications where (SID = '$_SESSION[sid]') AND (CID = '$_SESSION[cid]') AND (STUDENT_ID = '$_SESSION[id]')order by SNO desc limit $_SESSION[count_notifications]"))
    {   
        while($row=mysqli_fetch_array($r))
        {    
            
            if(($morenotification <= $_SESSION['count_notifications'] && $morenotification > ($_SESSION['count_notifications']-10)) && ($id{0} == 1))
            {
                echo "<div float = 'left' style = 'border-bottom:solid 1px rgba(161, 151, 151, 0.4);'><table><tr><td> <img height = 60 width = 60 src=images/Students/".$row['PHOTO']."> </td> ";
                echo "<td><a href = 'removenotification.php?sno=$row[SNO]'><p style = 'margin-top: 0px;margin-bottom: 0px;'><font color = 'BLACK'>".$row['MATTER']."</font></p></a> ";
                echo "<font size=2>".$row['TIME']."</font></td></tr></table></div>";                                       
            }
            else if(($morenotification <= $_SESSION['count_notifications'] && $morenotification > ($_SESSION['count_notifications']-10)) && ($id{0} == 2))
            {
                echo "<div float = 'left' style = 'border-bottom:solid 1px rgba(161, 151, 151, 0.4);'><table><tr><td> <img height = 60 width = 60 src=images/Students/".$row['PHOTO']."> </td> ";
                echo "<td><a href = 'removenotification-faculty.php?sno=$row[SNO]'><p style = 'margin-top: 0px;margin-bottom: 0px;'><font color = 'BLACK'>".$row['MATTER']."</font></p></a> ";
                echo "<font size=2>".$row['TIME']."</font></td></tr></table></div>";                                          
            }
            $morenotification = $morenotification + 1;
        }
        echo "<div id = 'notificationarea".($_SESSION['count_notifications']/10)."'>";
        echo "<div style = 'background-color: #eeeeee; margin-top:10px;'>";                                 
        echo "<div style = 'padding:1.5%;'>";
        echo "<center><a onclick = 'morenotifications(".($_SESSION['count_notifications']/10).")'>Show More</a></center>";
        echo "</div></div></div>";
    }
    }

?>