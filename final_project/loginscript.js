function homepageredirect($info) {
	if($info=="home")
	{window.location.href = "homepage.php";}
	else if($info=="logged")
	{window.location.href = "adminloggedpage.php";}
  else if($info=="farmer")
  {window.location.href = "farmerpage.php";}
}


function loginbutton() 
{
    window.location.href = "loginpage.php";
}


function loginonload()
{
    var wSize = $(window).width();
    if(wSize >= 576) {
      $('#logindiv').addClass('col-7')
      //$('#addadmindiv').addClass('col-5')
      //.addClass('col-4');
    } 
    else {
      $('#logindiv').removeClass('col-7')
      $('#logindiv').addClass('col-sm-auto')
      //.addClass('col-sm-auto');
    }
}

function pageredirect($page) 
{
	if($page=="loginpage"){}
	if($page=="registrationpage"){window.location.href = "registrationpage.php";}
}
function validateloginForm() {
  var username = document.forms["loginform"]["username"].value;
  var password = document.forms["loginform"]["password"].value;

  if (username == "" && password == "") 
  {
    document.getElementById("usernameE").innerHTML="Must be filled out!";
    document.getElementById("passwordE").innerHTML="Must be filled out!";
    return false;
  }
  else
  {
  	return true;
  }
}