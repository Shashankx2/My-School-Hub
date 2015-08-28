function sectioncheckfun()
{
	var s = document.getElementById("class").value;
	if( s==11 || s==12)
	{
	document.getElementById("sec").innerHTML = "<select name = 'stream' required = 'required' class='form-control'><option value = ' '>Select One</option><option value = 's'>Science</option><option value = 'c'>Commerce</option><option value = 'a'>Arts</option></select>";
	} 
	else
	{
	document.getElementById("sec").innerHTML = "";
	}
}