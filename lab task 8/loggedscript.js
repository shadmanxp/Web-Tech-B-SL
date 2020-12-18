function homepageredirect($info) {
	if($info=="home")
	{window.location.href = "homepage.php";}
	else if($info=="logged")
	{window.location.href = "loggedpage.php";}
}


document.getElementById("logoutbutton").onclick = function() 
{
    pageredirect("logoutpage");
};


function viewaddadmindiv()
{
	var x = document.getElementById("showaddform");
	if(x.style.display=="none")
	{
		x.style.display="block";
	}
	else
	{
		x.style.display="none";
	}
	var wSize = $(window).width();
    if(wSize >= 768) {
      $('#addadmindiv').addClass('col-5')
      //.addClass('col-4');
    } 
    else {
      $('#addadmindiv').addClass('col-sm-auto')
      //.addClass('col-sm-auto');
    }
}

function validateaddadminForm()
{
	var allowedExtensionsforimage = /(\.jpg|\.jpeg|\.png)$/i;

	var firstname = document.forms["addadminform"]["firstname"].value;
    var lastname = document.forms["addadminform"]["lastname"].value;
    var username = document.forms["addadminform"]["username"].value;
    var image = document.forms["addadminform"]["image"].value;
    var email = document.forms["addadminform"]["email"].value;
    var password = document.forms["addadminform"]["password"].value;
    var repeatpassword = document.forms["addadminform"]["repeatpassword"].value;


	if( firstname == "" || lastname == "" || username == "" || image == "" || email == "" || password == "" || repeatpassword == ""  )
	{
		if(!allowedExtensionsforimage.exec(image) )
		{
			document.getElementById("imageE").innerHTML="Image format must be JPG,JPEG OR PNG!";
		}
		if (firstname == "")  
		{
			document.getElementById("firstnameE").innerHTML="First name must be filled out!";
		}
		else
		{
			document.getElementById("firstnameE").innerHTML="";
		}	
		if (lastname == "")
		{
			document.getElementById("lastnameE").innerHTML="Last name must be filled out!";
		}
		else
		{
			document.getElementById("lastnameE").innerHTML="";
		}
		if (username == "")
		{
			document.getElementById("usernameE").innerHTML="Username must be filled out!";
		}
		else
		{
			document.getElementById("usernameE").innerHTML="";
		}
		if (image == "")
		{
			document.getElementById("imageE").innerHTML="Must insert an image!";
		}
		else
		{
			document.getElementById("imageE").innerHTML="";
		}
		if (email == "")
		{
			document.getElementById("emailE").innerHTML="Must include Email!";
		}
		else
		{
			document.getElementById("emailE").innerHTML="";
		}
		if (password == "")
		{
			document.getElementById("passwordE").innerHTML="Password must be filled out!";
		}
		else
		{
			document.getElementById("passwordE").innerHTML="";
		}
		if (repeatpassword == "")
		{
			document.getElementById("repeatpasswordE").innerHTML="Password must be repeated!";
		}
		else
		{
			if( repeatpassword != password )
			{
				document.getElementById("repeatpasswordE").innerHTML="Must match with password!";
			}
			else
			{
				document.getElementById("repeatpasswordE").innerHTML="";
			}
		}
		return false
	}
	else
	{
		return true;
	}
	if(!allowedExtensionsforimage.exec(image) )
	{
		document.getElementById("imageE").innerHTML="Image format must be JPG,JPEG OR PNG!";
		return false;
	}
	
}

function pageredirect($page) 
{
	if($page=="logoutpage"){window.location.href = "controller/logout.php";}
}

$(function() {
  $(window).resize(function() {
    var wSize = $(window).width();
    if(wSize >= 768) {
      if(document.getElementById("addadmindiv").classList.contains("col-sm-auto"))
      {
        $('#addadmindiv').removeClass('col-sm-auto')
        $('#addadmindiv').addClass('col-5')
      }
      else
      {
        $('#addadmindiv').addClass('col-5')
      }
      //.addClass('col-4');
    } 
    else {
      if(document.getElementById("addadmindiv").classList.contains("col-5"))
      {
        $('#addadmindiv').removeClass('col-5')
        $('#addadmindiv').addClass('col-sm-auto')
      }
      else
      {
        $('#addadmindiv').addClass('col-sm-auto')
      }
      //.addClass('col-sm-auto');
    }
  });
});
