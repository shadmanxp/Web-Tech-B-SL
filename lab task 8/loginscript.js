function homepageredirect($info) {
	if($info=="home")
	{window.location.href = "homepage.php";}
	else if($info=="logged")
	{window.location.href = "loggedpage.php";}
}


document.getElementById("loginbutton").onclick = function() 
{
    pageredirect("loginpage");
};

document.getElementById("registerbutton").onclick =function()
{
  pageredirect("registrationpage");
}



function pageredirect($page) 
{
	if($page=="loginpage"){window.location.href = "loginpage.php";}
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

$(function() {
  $(window).resize(function() {
    var wSize = $(window).width();
    if(wSize >= 768) {
      if(document.getElementById("logindiv").classList.contains("col-sm-auto"))
      {
        $('#logindiv').removeClass('col-sm-auto')
        $('#logindiv').addClass('col-4')
      }
      else
      {
        $('#logindiv').addClass('col-4')
      }
      //.addClass('col-4');
    } 
    else {
      if(document.getElementById("logindiv").classList.contains("col-4"))
      {
        $('#logindiv').removeClass('col-4')
        $('#logindiv').addClass('col-sm-auto')
      }
      else
      {
        $('#logindiv').addClass('col-sm-auto')
      }
      //.addClass('col-sm-auto');
    }
  });
});
