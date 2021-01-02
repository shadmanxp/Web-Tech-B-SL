function homepageredirect($info) {
	if($info=="home")
	{window.location.href = "homepage.php";}
	else if($info=="logged")
	{window.location.href = "adminloggedpage.php";}
 	else if($info=="farmer")
  	{window.location.href = "farmerpage.php";}
}

function viewaddadmindiv()
{
	var x = document.getElementById("showaddform");
	var y = document.getElementById("showprofile");
	if(x.style.display=="none")
	{
		x.style.display="block";
		y.style.display="none";
	}
	else
	{
		x.style.display="none";
		y.style.display="none";
	}
	var wSize = $(window).width();
    if(wSize >= 768) {
      $('#addadmindiv').addClass('col-sm-auto')
      //.addClass('col-4');
    } 
    else {
      $('#addadmindiv').addClass('col-sm-auto')
      //.addClass('col-sm-auto');
    }
}

function viewprofile($id)
{
	$var = "viewprofilerow"+$id;
	var x = document.getElementById($var);
	if(x.style.display=="none")
	{
		x.style.display="";
	}
	else
	{
		x.style.display="none";
	}

}

function vieworder($id)
{
	$var = "vieworderrow"+$id;
	var x = document.getElementById($var);
	if(x.style.display=="none")
	{
		x.style.display="";
	}
	else
	{
		x.style.display="none";
	}

}

function viewadminprofilediv()
{
	var x = document.getElementById("showaddform");
	var y = document.getElementById("showprofile");
	if(y.style.display=="none")
	{
		y.style.display="block";
		x.style.display="none";
	}
	else
	{
		y.style.display="none";
		x.style.display="none";
	}
	var wSize = $(window).width();
    if(wSize >= 768) {
    	$('#adminprofilediv').addClass('col-sm-auto')
      //$('#adminprofilediv').addClass('col-5')
      //.addClass('col-4');
    } 
    else {
      $('#adminprofilediv').addClass('col-sm-auto')
      //.addClass('col-sm-auto');
    }
}

function loadview()
{
	var wSize = $(window).width();
	if (wSize>=1391) {

    	$('#navbardiv').addClass('btn-group-vertical')
    }

}

function validateaddadminForm()
{
	
	var firstname = document.forms["addadminform"]["firstname"].value;
    var lastname = document.forms["addadminform"]["lastname"].value;
    var username = document.forms["addadminform"]["username"].value;
    var address = document.forms["addadminform"]["address"].value;
    var phone = document.forms["addadminform"]["phone"].value;
    var email = document.forms["addadminform"]["email"].value;
    var password = document.forms["addadminform"]["password"].value;
    var repeatpassword = document.forms["addadminform"]["repeatpassword"].value;


	if( firstname == "" || lastname == "" || username == "" || email == "" || password == "" || repeatpassword == "" || address == "" || phone == ""  )
	{
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
		if (address == "")
		{
			document.getElementById("addressE").innerHTML="Must provide Address!";
		}
		else
		{
			document.getElementById("addressE").innerHTML="";
		}
		if (phone == "")
		{
			document.getElementById("phoneE").innerHTML="Must provide Contact Number!";
		}
		else
		{
			document.getElementById("phoneE").innerHTML="";
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
}

function validateeditForm()
{
	
	var firstname = document.forms["editprofileform"]["firstname"].value;
    var lastname = document.forms["editprofileform"]["lastname"].value;
    var username = document.forms["editprofileform"]["username"].value;
    var address = document.forms["editprofileform"]["address"].value;
    var phone = document.forms["editprofileform"]["phone"].value;
    var email = document.forms["editprofileform"]["email"].value;


	if( firstname == "" || lastname == "" || username == "" || email == "" || address == "" || phone == ""  )
	{
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
		if (address == "")
		{
			document.getElementById("addressE").innerHTML="Must provide Address!";
		}
		else
		{
			document.getElementById("addressE").innerHTML="";
		}
		if (phone == "")
		{
			document.getElementById("phoneE").innerHTML="Must provide Contact Number!";
		}
		else
		{
			document.getElementById("phoneE").innerHTML="";
		}
		if (email == "")
		{
			document.getElementById("emailE").innerHTML="Must include Email!";
		}
		else
		{
			document.getElementById("emailE").innerHTML="";
		}
		return false
	}
	else
	{
		return true;
	}
}

function validatepasschangeForm()
{
	
	var password = document.forms["passchangeform"]["password"].value;
    var repeatpassword = document.forms["passchangeform"]["repeatpassword"].value;
    var previouspassword = document.forms["passchangeform"]["previouspassword"].value;


	if( password == "" || repeatpassword == "" || previouspassword == "" )
	{
		if (previouspassword == "")
		{
			document.getElementById("previouspasswordE").innerHTML="Previous Password must be filled out!";
		}
		else
		{
			document.getElementById("passwordE").innerHTML="";
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
}

function logout() 
{
	window.location.href = "../controller/logout.php";
}
function editpageredirect($id) 
{
	window.location.href = "admin_editprofilepage.php?id="+$id;
}
function passchangepageredirect($id) 
{
	window.location.href = "admin_profilepasschangepage.php?id="+$id;
}
function deletepageredirect($id) 
{
	var r = confirm("Delete User!");
  	if (r == true) 
  	{
		window.location.href = "../controller/deleteuser.php?id="+$id;
	}
	else
	{
		window.location.href = "admin_editprofilepage.php?id="+$id;
	}
}
function confirmation()
{
	var r = confirm("Update?");
	if (r == true) 
  	{
		return true;
	}
	else
	{
		return false;
	}
}


