<?php
	session_start();

  // -------------to take the values from form-----------
 
  $id = $_POST['loginid'];
  $pass = $_POST['loginpass'];
  $tablename = "";
  $count = 0;
  $keeplogin = $_POST['loginkeeping'];

  //-------------- to check in which table to check ie student or faculty
if(isset($_POST['loginbutton']))
{
	if($id{0} == 1){
	$tablename = "student";
  	}
  	else if($id{0} == 2){
		$tablename = "faculty";
  	}
  	else
  	{
    	echo('username wrong');
   		//header("location:invalid.php?flag=1");
		exit();
  	}


//---------------------now to check the id and password from table--------

  $conn = mysqli_connect("localhost","root","","test");
	if(! $conn )
	{
		die('Could not connect: ' . mysqli_error());
	}
       $res = mysqli_query($conn, "select * from $tablename");
        while($row = mysqli_fetch_array($res))
        {
			if(strcmp($row['ID'] , $id) == 0)  
			{
				if (strcmp($row['PASSWORD'] , $pass) == 0)
				{
					$_SESSION['id'] = $id;
					$_SESSION['pass'] = $pass;
					$_SESSION['table'] = $tablename;
					$_SESSION['keeplogin'] = $keeplogin;

					if($id{0} == 2)
					{
						header("location: homepage-faculty.php");	
					}
					else if($id{0} == 1)
					{
						header("location: homepage.php");
					}
					exit();
				}
				else
				{
					header("location:invalid.php?flag=11");
					exit();
				}
			}
			$count = 1;	
        } 
		if($count == 0)
		{
			header("location:invalid.php?flag=2");
			exit();
		}

  mysqli_close($conn);
  }
else{
	header("location:login.php");
}

 ?>
 