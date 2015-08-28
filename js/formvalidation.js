function checkregisterform(){
	var pass1 = document.getElementById("pass1").value;
	var pass2 = document.getElementById("pass2").value;
	var flag =0;

	if( pass1.length < 8 && pass1.length >= 1)
	{
		document.getElementById("pass1error").innerHTML = "*must be of 8 characters atleast";	
		flag =1;
	}
	else
	{
		document.getElementById("pass1error").innerHTML = "";			
	}

	if( pass1 == pass2)
	{
		document.getElementById("pass2error").innerHTML = "*password matched";	
	}
	else
	{
		document.getElementById("pass2error").innerHTML = "password not matched	";
		flag =1;			
	}
	if( flag == 1 )
	{
		return false;
	}
}

function strengthcheck()
{
	var str = document.getElementById("pass1").value;
	var len = str.length*10;
	if( str.length >=8 )
	{
		document.getElementById("pass1error").innerHTML = "strength :strong";
		document.getElementById("meter").width = len;
		document.getElementById("meter").src = "images/meterg.png";
	}
	else 
	{
		document.getElementById("pass1error").innerHTML = "strength :poor";
		document.getElementById("meter").width = len;
		document.getElementById("meter").src = "images/meter.png";
	}

}