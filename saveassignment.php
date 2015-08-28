<html>
<?php
session_start();
$target = $_GET['target'];
$sno = $_GET['sno'];
$name = $_SESSION['fname']." ".$_SESSION['lname'];
$class = $_POST['aclasslist'];
$title = $_POST['atitle'];
$content = $_POST['acontent'];
$deadline = $_POST['ayear']."-".$_POST['amonth']."-".$_POST['adate'];
$link = "";
$date = date('g:i a l F');
$file = $_FILES["file"]["name"];


  $conn = mysqli_connect("localhost","root","","test");
  if(! $conn)
  {
	 die('Could not connect :' . mysqli_error());
  }

if($file == NULL)
{
  
  if($target == "save")
  
    $res = mysqli_query($conn, "insert into assignment (SID, CID, ID, NAME, TITLE, CONTENT, DATE, DEADLINE, LINK, PHOTO) values('$_SESSION[sid]','$class','$_SESSION[id]','$name','$title','$content','$date','$deadline','$link','$_SESSION[photo]')");
  
  else if($target == "update")
  {
  
    echo "hello";
    //$res = mysqli_query($conn, "insert into assignment (SID, CID, ID, NAME, TITLE, CONTENT, DATE, DEADLINE, LINK, PHOTO) values('$_SESSION[sid]','$class','$_SESSION[id]','$name','$title','$content','$date','$deadline','$link','$_SESSION[photo]')");  
    $res = mysqli_query($conn, "update assignment set 'CID'='$class', 'TITLE'='$title', 'CONTENT'='$content', 'DEADLINE'='$deadline', 'LINK'='$link' where (SNO = '$sno') ");
    echo "hello";  
  }
}

else
{
  $allowedExts = array("gif", "jpeg", "jpg", "png", "doc", "docx", "pdf");
  $temp = explode(".", $_FILES["file"]["name"]);
  $extension = end($temp);

  if ( ( ($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/x-png") || ($_FILES["file"]["type"] == "application/pdf") || ($_FILES["file"]["type"] == "application/msword") || ($_FILES["file"]["type"] == "text/plain") || ($_FILES["file"]["type"] == "image/png") ) && ($_FILES["file"]["size"] < 20000000) && in_array($extension, $allowedExts) ) 
  {
    if ($_FILES["file"]["error"] > 0)
    {
      echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
    else 
    {

      echo "helllo";
      echo "Upload: " . $_FILES["file"]["name"] . "<br>";
      echo "Type: " . $_FILES["file"]["type"] . "<br>";
      echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
      echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    
      if ( file_exists("upload/" . $_FILES["file"]["name"]) ) 
      {
      
        echo $_FILES["file"]["name"] . " already exists. ";
      
      } 

      else 
      {
        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
        echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
  	   $link = $_FILES["file"]["name"];
      }
	  }
  }  
	  //------------------------- now save the details in database ---------------------

	if($target == "save")
	
  	$res = mysqli_query($conn, "insert into assignment (SID, CID, ID, NAME, TITLE, CONTENT, DATE, DEADLINE, LINK, PHOTO) values('$_SESSION[sid]','$class','$_SESSION[id]','$name','$title','$content','$date','$deadline','$link','$_SESSION[photo]')");
	
  else if($target == "update")
  {
		echo "hello";
		$res = mysqli_query($conn, "update assignment set 'CID'='$class', 'TITLE'='$title', 'CONTENT'='$content', 'DEADLINE'='$deadline', 'LINK'='$link' where (SNO = '$sno') ");
	}

}
	
if($res)
{
  //echo "details saved";
  header("location:homepage-faculty.php");
}
else 
{
  echo "Invalid file";
}
mysqli_close($conn);  
?> 
</html>