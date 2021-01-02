function sellbutton()
{
  	window.location.href = "farmerregistrationpage.php";
}


function moduleload()
{
    var wSize = $(window).width();
    if(wSize >=576) {
      $('#registration-box').addClass('col-7')
      //$('#addadmindiv').addClass('col-5')
      //.addClass('col-4');
    } 
    else {
      $('#registration-box').removeClass('col-7')
      $('#registration-box').addClass('col-12')
      //.addClass('col-sm-auto');
    }
}
function farmereditbutton()
{
	var x = document.getElementById("farmerupdate");
	if ( x.classList.contains("disabled")) 
	{
		$('#farmerupdate').removeClass('disabled')
		$('#farmerchangepassword').removeClass('disabled')
		$('#farmerdelete').removeClass('disabled')
	}
	else
	{
		$('#farmerupdate').addClass('disabled')
		$('#farmerchangepassword').addClass('disabled')
		$('#farmerdelete').addClass('disabled')
	}

	var a = document.getElementById("firstname");
	var b = document.getElementById("lastname");
	var c = document.getElementById("username");
	var d = document.getElementById("email");
	var e = document.getElementById("address");
	var f = document.getElementById("phone");
	var g = document.getElementById("previouspassword");
	var h = document.getElementById("password");
	var i = document.getElementById("repeatpassword");

	if ( a.hasAttribute("readonly") )
	{
		a.removeAttribute("readonly");
		b.removeAttribute("readonly");
		c.removeAttribute("readonly");
		d.removeAttribute("readonly");
		e.removeAttribute("readonly");
		f.removeAttribute("readonly");
		g.removeAttribute("readonly");
		h.removeAttribute("readonly");
		i.removeAttribute("readonly");
	}
	else
	{
		a.setAttribute("readonly","");
		b.setAttribute("readonly","");
		c.setAttribute("readonly","");
		d.setAttribute("readonly","");
		e.setAttribute("readonly","");
		f.setAttribute("readonly","");
		g.setAttribute("readonly","");
		h.setAttribute("readonly","");
		i.setAttribute("readonly","");
	}
}

function regvalidation()
{
	
	var firstname = document.forms["registrationform"]["firstname"].value;
    var lastname = document.forms["registrationform"]["lastname"].value;
    var username = document.forms["registrationform"]["username"].value;
    var address = document.forms["registrationform"]["address"].value;
    var phone = document.forms["registrationform"]["phone"].value;
    var email = document.forms["registrationform"]["email"].value;
    var password = document.forms["registrationform"]["password"].value;
    var repeatpassword = document.forms["registrationform"]["repeatpassword"].value;


	if( firstname == "" || lastname == "" || username == "" || email == "" || password == "" || repeatpassword == "" || address == "" || phone == ""  )
	{
		if (firstname == "")  
		{
			document.getElementById("firstnameE").innerHTML="First name can not be empty!";
		}
		else
		{
			document.getElementById("firstnameE").innerHTML="";
		}	
		if (lastname == "")
		{
			document.getElementById("lastnameE").innerHTML="Last name can not be empty!";
		}
		else
		{
			document.getElementById("lastnameE").innerHTML="";
		}
		if (username == "")
		{
			document.getElementById("usernameE").innerHTML="Username can not be empty!";
		}
		else
		{
			document.getElementById("usernameE").innerHTML="";
		}
		if (address == "")
		{
			document.getElementById("addressE").innerHTML="Address can not be empty!";
		}
		else
		{
			document.getElementById("addressE").innerHTML="";
		}
		if (phone == "")
		{
			document.getElementById("phoneE").innerHTML="Contact number can not be empty!";
		}
		else
		{
			document.getElementById("phoneE").innerHTML="";
		}
		if (email == "")
		{
			document.getElementById("emailE").innerHTML="Email can not be empty!";
		}
		else
		{
			document.getElementById("emailE").innerHTML="";
		}
		if (password == "")
		{
			document.getElementById("passwordE").innerHTML="Password can not be empty!";
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
				document.getElementById("repeatpasswordE").innerHTML="Password must match!";
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
function updatevalidation()
{
	
	var firstname = document.forms["updateform"]["firstname"].value;
    var lastname = document.forms["updateform"]["lastname"].value;
    var username = document.forms["updateform"]["username"].value;
    var address = document.forms["updateform"]["address"].value;
    var phone = document.forms["updateform"]["phone"].value;
    var email = document.forms["updateform"]["email"].value;


	if( firstname == "" || lastname == "" || username == "" || email == "" || address == "" || phone == ""  )
	{
		if (firstname == "")  
		{
			document.getElementById("firstnameE").innerHTML="First name can not be empty";
			//alert('Any field can not be empty!');
		}
		else
		{
			document.getElementById("firstnameE").innerHTML="";
		}	
		if (lastname == "")
		{
			document.getElementById("lastnameE").innerHTML="Last name can not be empty";
			//alert('Any field can not be empty!');
		}
		else
		{
			document.getElementById("lastnameE").innerHTML="";
		}
		if (username == "")
		{
			document.getElementById("usernameE").innerHTML="Username can not be empty";
			//alert('Any field can not be empty!');
		}
		else
		{
			document.getElementById("usernameE").innerHTML="";
		}
		if (address == "")
		{
			document.getElementById("addressE").innerHTML="Address can not be empty";
			//alert('Any field can not be empty!');
		}
		else
		{
			document.getElementById("addressE").innerHTML="";
		}
		if (phone == "")
		{
			document.getElementById("phoneE").innerHTML="Contact Number can not be empty!";
			//alert('Any field can not be empty!');
		}
		else
		{
			document.getElementById("phoneE").innerHTML="";
		}
		if (email == "")
		{
			document.getElementById("emailE").innerHTML="Email can not be empty";
			//alert('Any field can not be empty!');
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
function passwordchangevalidation()
{
	var password = document.forms["updateform"]["password"].value;
    var repeatpassword = document.forms["updateform"]["repeatpassword"].value;
    var previouspassword = document.forms["updateform"]["previouspassword"].value;

	if( password == "" || repeatpassword == "" || previouspassword == "" )
	{
		if (previouspassword == "")
		{
			document.getElementById("previouspasswordE").innerHTML="Previous Password can not be empty!";
		}
		else
		{
			document.getElementById("passwordE").innerHTML="";
		}
		if (password == "")
		{
			document.getElementById("passwordE").innerHTML="Password can not be empty!";
		}
		else
		{
			document.getElementById("passwordE").innerHTML="";
		}
		if (repeatpassword == "")
		{
			document.getElementById("repeatpasswordE").innerHTML="Password can not be empty!";
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

function deletebutton($id) 
{
	var r = confirm("Delete User?");
  	if (r == true) 
  	{
		window.location.href = "../controller/deletefarmer.php?id="+$id;

	}
}