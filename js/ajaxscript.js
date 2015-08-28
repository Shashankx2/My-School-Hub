function ajaxupdate()
{
 var update = document.getElementById('update').value;

 
 document.getElementById('newstatus').innerHTML = "<center><img src='images/loader.gif'></center>" ;

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("newstatus").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","update.php?update="+update,true);
  xmlhttp.send();
}

function moreupdates(index)
{
  var updatearea = "updatearea"+index;
   //var count = document.getElementById('count').value;
 document.getElementById(updatearea).innerHTML =  "<center><img src='images/loader.gif'></center>";

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById(updatearea).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","moreupdate.php",true);
  xmlhttp.send();
}

function moreupdates_profile(index)
{
  var updatearea = "updatearea"+index;
   //var count = document.getElementById('count').value;
 document.getElementById(updatearea).innerHTML =  "<center><img src='images/loader.gif'></center>";

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById(updatearea).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","moreupdate_profile.php",true);
  xmlhttp.send();
}

function morenotifications(index)
{
  var notificationarea = "notificationarea"+index;
   //var count = document.getElementById('count').value;
 document.getElementById(notificationarea).innerHTML =  "<center><img src='images/loader.gif'></center>";

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById(notificationarea).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","morenotification.php",true);
  xmlhttp.send();
}

function morenotices(index)
{
  var noticearea = "noticearea"+index;
   //var count = document.getElementById('count').value;
 document.getElementById(noticearea).innerHTML =  "<center><img src='images/loader.gif'></center>";

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById(noticearea).innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","morenotice.php",true);
  xmlhttp.send();
}

function ajaxstudentshow(cid,year,month,date)
{
	document.getElementById('atyear').value = year;
	document.getElementById('atmonth').value = month;
	document.getElementById('atdate').value = date;
	
 document.getElementById('studentshow').innerHTML = "<center>Loading students...<br><img src='images/loader.gif'></center>" ;
 

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("studentshow").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","showstudent.php?cid="+cid,true);
  xmlhttp.send();
  document.getElementById('atsubmit').style.display = "block";
}

function show_no_of_notifications()
{
  document.getElementById('no_of_notifications').innerHTML = "<p>You have notifications</p>";
}
function emailedit(email)
{
    document.write(email);
  document.getElementById('email').innerHTML = "<input type = 'text' placeholder='Enter New Email' name = 'email'>&nbsp &nbsp &nbsp &nbsp  <font size=4><a onclick='updateemail()'>Done Editing</a></font>";
}

function ajaxstudentshowformarks(cid)
{
 alert("hello");
 document.getElementById('studentshowformarks').innerHTML = "<center>Loading students...<br><img src='images/loader.gif'></center>" ;
 

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("studentshowformarks").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","showstudentformarks.php?cid="+cid,true);
  xmlhttp.send();
  document.getElementById('atsubmit').style.display = "block";
}
function navforwardhome()
{
  window.location = "homepage.php";
}
function navforwardhomefaculty()
{
  window.location = "homepage-faculty.php?count=0";
}
function navforwardp()
{
	window.location = "profile.php";
}
function navforwardpfaculty()
{
  window.location = "profile-faculty.php";
}
function navforwardl()
{
	window.location = "login.php";
}
function navforwardatt()
{
	window.location = "attendance.php";
}
function navforwardattfaculty()
{
	window.location = "attendance-faculty.php";
}
function navforwardas()
{
	window.location = "assignment.php";
}
function navforwardasfaculty()
{
	window.location = "assignment-faculty.php";
}
function navforwardn()
{
	window.location = "notice.php";
}
function navforwardnfaculty()
{
	window.location = "notice-faculty.php";
}

function pinfochange(email,dob,gender,father,mother)
{
  document.getElementById('pinfo').innerHTML = "<p class='blog_text'><table>";
  document.getElementById('pinfo').innerHTML = "<font size=14px><tr><td><b><font size=3>Email : </b> </td><td><div class='form-group'><input type='text' value="+email+"></td></tr></div> ";

}

function dateshow(){
	document.getElementById('datedisplay').style.display = "block";
	ajaxstudentshow();
}
function atradio(geta, getp){
		document.getElementById(getp).style.background = "#f3f3f3";
		document.getElementById(geta).style.background = "#3F81CB";
}
function assignmenticonchange(getid){
	document.getElementById(getid).src = "images/listicon2.png";
}
function assignmenticonchange2(getid){
	document.getElementById(getid).src = "images/listicon.png";
}
function shownoticeform(){
	document.getElementById('addnoticeform').style.display = "block";
}
function profileedit(dob, gender, fatherfname, fatherlname, motherfname, motherlname){
	document.getElementById('profiledob').innerHTML = "<input type='text' value='"+dob+"'>";
	document.getElementById('profilegender').innerHTML = "<input type='text' value='"+gender+"'>";
	document.getElementById('profilefather').innerHTML = "<input type='text' value='"+fatherfname+"'><input type='text' value='"+fatherlname+"'>";
	document.getElementById('profilemother').innerHTML = "<input type='text' value='"+motherfname+"'><input type='text' value='"+motherlname+"'>";
}
function showmonthfaculty(month, monthalpha){
  var month = month;
  document.getElementById('attendancearea').innerHTML = "<br><br><center><img src='images/loader.gif'> </center><br>";
  document.getElementById('showmonthyear').innerHTML =  monthalpha+' - 2015';


  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("attendancearea").innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","calendar-table.php?month="+month+"&monthalpha="+monthalpha,true);
  xmlhttp.send();
}
function showmonthstudent(month, monthalpha){
  var month = month;
  document.getElementById('attendancearea').innerHTML = "<br><br><center><img src='images/loader.gif'> </center><br>";
  document.getElementById('showmonthyear').innerHTML =  monthalpha+' - 2015';


  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("attendancearea").innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","monthattendancestudent.php?month="+month+"&monthalpha="+monthalpha,true);
  xmlhttp.send();
}
function showstudentdetails(){
  document.getElementById('studentarea').innerHTML = "<br><br><center><img src='images/loader.gif'> </center><br>";
  var cid = document.getElementById('classlist').value;

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("studentarea").innerHTML = xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","showstudentdetails.php?classid="+cid,true);
  xmlhttp.send();
}

function disappear(){
	document.getElementById("statusbox").style.display = "none";
}
function example(){
  document.getElementById("example").innerHTML='<object type="type/html" data="calendar/web/index.html" ></object>';
}
function attendancevalidation(){
	var nos = document.getElementById('no_of_rows').value;
	var check = 0;
	for(var i=1 ; i<=nos ; i++){
		nosp = i+"p";
		nosa = i+"a";
		if(document.getElementById(nosp).isChecked || document.getElementById(nosa).isChecked)
			check++;
	}
	alert(check);
	if(check == nos){
		return true;
	}
	else{
		alert("Please select all attendance");
		return false;
	}
}

