<?php
	if(isset($_REQUEST["register"]))
	{
		$school = "0";
		$count = 0;
		$classname = "0";
		$schoolcode = $_REQUEST["school"];
		$class = $_REQUEST["class"];
		$code = $_REQUEST["code"];
		$fname = $_REQUEST["fname"];
		$lname = $_REQUEST["lname"];
		$email = $_REQUEST["email"];
		$password = $_REQUEST["pass1"];
		$stream = 0;
		$flag = 0;
		
		if($class == "09")
		{
			$classname = "ninth";	
		}
		else if($class == "10")
		{
			$classname = "tenth";
		}
		else if($class == "11")
		{
			$stream = $_REQUEST["stream"];
			if($stream == "s")
			{
				$classname = "elevenths";
			}
			else if($stream == "c")
			{
				$classname = "eleventhc";
			}
			else
			{
				$classname = "eleventha";
			}
		}
		else
		{
			$stream = $_REQUEST["stream"];
			if($stream == "s")
			{
				$classname = "inters";
			}
			else if($stream == "c")
			{
				$classname = "interc";
			}
			else
			{
				$classname = "intera";
			}
		}
		
		if($schoolcode == "0001")
		{
			$school = "St. Anthony Senior Secondary School";
		}
		else if($schoolcode == "0002")
		{
			$school = "Dr. Virendra Swarup Memorial School";
		}
		$con = mysqli_connect("localhost","root","","school");
		$res = mysqli_query($con,"select * from code where (SchoolCode = '$schoolcode') ");

		while($value = mysqli_fetch_array($res))
		{  
			if($code == $value['Code'])
			{	
				$idgen = mysqli_query($con,"select * from $classname where SchoolCode = $schoolcode ");
				/*mysqli_query($con,"delete from code where (Code = '$code') AND (SchoolCode = '$schoolcode' ) ");*/
				while($idcount = mysqli_fetch_array($idgen))
				{
					$count = $count + 1;
				}
				$count = $count + 1;
				if($count<10)
				{
					$id = "1".$schoolcode.$class.$stream."00".$count;
				}
				else if($count<100)
				{
					$id = "1".$schoolcode.$class.$stream."0".$count; 
				}
				else
				{
					$id = "1".$schoolcode.$class.$stream.$count;
				}
				$res = mysqli_query($con,"insert into $classname(First_Name,Last_Name,School,SchoolCode,Id,Email,Password) values('$fname','$lname','$school','$schoolcode','$id','$email','$password')");
				$attendence = mysqli_query($con,"ALTER TABLE  attendence ADD  $id BIT(1) NULL");
				$flag = 1;
				header("location:iddisplay.php?id=$id");
				exit(); 
				
			}
		}
		if($flag == 0)
		{
			header("location:invalid.php?flag=0");
		}
	}
	mysqli_close($con);
?>