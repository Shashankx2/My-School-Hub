function textareafocus()
{
	document.getElementById('status_message').style.height = "80px";
	document.getElementById('buttonarea').innerHTML="<div class='panel-footer' disabled='true'><div class='row'><div class='col-md-7'><div class='form-group'><div class='btn-group'><button type='button' class='btn btn-default'><i class='icon icon-map-marker'></i> File</button><button type='button' class='btn btn-default'><i class='icon icon-picture'></i> Photo</button></div></div></div><div class='col-md-5'><div class='form-group'><button type='submit' class='btn btn-orange pull-center'>Share</button></div></div></div></div>";
}
function textareablur()
{
	var text = document.getElementById('status_message').value;
	if(text == "")
	{
			document.getElementById('status_message').style.height = "40px";
			document.getElementById('buttonarea').innerHTML="";
	}
}
function checkupdatefun()
{
	var str = document.getElementById('status_message').value;
	//alert(str);
	//return false;
}