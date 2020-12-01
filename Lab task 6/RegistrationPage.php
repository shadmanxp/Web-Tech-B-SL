<?php

	require_once 'controller/functions.php';

	$firstNamedata=$lastNamedata=$userNamedata=$emaildata=$passdata=$typedata="";
	$firstName=$lastName=$userName=$email=$pass=$repeatpass="";
	$firstNameE=$lastNameE=$userNameE=$emailE=$passE=$repeatpassE=$typeE=$imageE="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["register"]))
	{
		$user=fetch_user($_POST["userName"]);
		if($user['id']=='0')
		{
			if(empty($_POST["firstName"])||empty($_POST["lastName"]))
				{ 
					$firstNameE="First Name cannot be empty!";
					$lastNameE="Last Name cannot be empty!";
				}
			else
				{
					$firstNamedata=$_POST["firstName"];
					$lastNamedata=$_POST["lastName"];
				}
			if(empty($_POST["userName"]))
				{ $userNameE="Username cannot be empty!"; }
			elseif(!preg_match("/[a-z][^ #!:$^&]{7,15}$/",$_POST["userName"]))
			{
				$userNameE="Must be of Length:8-16 and cannot contain '#!:$^&' ";
			}
			else
			{
				$userNamedata=$_POST["userName"];
			}
			if(empty($_POST["email"]))
				{ $emailE="Email cannot be empty!";}
			elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
			{
			  $emailE = "Invalid email format. Example:abcd@abcd.com";
			}
			else
			{
				$emaildata=$_POST["email"];
			}

			if(empty($_POST["pass"]))
				{ $passE="Password cannot be empty!";}
			elseif(!preg_match("/[a-zA-Z0-9][^ #!:$^&]{5,}$/", $_POST["pass"]))
			{
				$passE="Must be of Length:6 and must contain lowercase, uppercase,number. Cannot contain '#!:$^&' ";
			}
			elseif($_POST["pass"]==$_POST["repeatpass"])
			{
				$passdata=$_POST["pass"];
			}
			if(empty($_POST["repeatpass"]))
				{ $repeatpassE="Repeat Password cannot be empty!";}
			elseif($_POST["pass"]!=$_POST["repeatpass"])
			{
				$repeatpassE="Must match with password!";
			}
			if(!isset($_POST["type"]))
				{ $typeE="Must select one!";}
			else
			{
				$typedata=$_POST["type"];
			}

			$target_dir = "uploads/";
			$target_file = $target_dir.basename($_FILES["image"]["name"]);

			if(isset($firstNamedata)&&isset($lastNamedata)&&isset($userNamedata)&&isset($emaildata)&&isset($passdata)&&isset($typedata)&&move_uploaded_file($_FILES["image"]["tmp_name"] , $target_file))
			{
				$data['firstname']=$firstNamedata;
				$data['lastname']=$lastNamedata;
				$data['username']=$userNamedata;
				$data['password']=$passdata;
				$data['type']=$typedata;
				$data['email']=$emaildata;
				$data['image'] = basename($_FILES["image"]["name"]);
				add_user($data);
				$imageE="";
			}
			else
			{
				$imageE="Must upload Image!";
			}
		}
		elseif($user['username']===$_POST["userName"]&&$user['email']===$_POST["email"])
		{
			$userNameE="Username already exists!";
			$emailE="Email already exists!";
		}
	}
	if(isset($_POST["back"]))
	{
		header("Location: PublicHomePage.php");
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
	<style>
		.button
		{
			background-color: #33cc00;
			font-family: Arial, Helvetica, sans-serif;
			width: 100%;
			font-size: 20px;
			text-align: center;
			font-weight: bold;
			padding: 1%;
			border: 1px solid;
			border-radius: 4px;
			text-decoration: none;
		}
		.button:hover,click
		{
			background-color: #00b300;
			color: white;
			font-family: Arial, Helvetica, sans-serif;
			width: 100%;
			font-size: 20px;
			text-align: center;
			font-weight: bold;
			padding: 1%;
			border: 1px solid black;
			border-radius: 4px;
			text-decoration: none;
		}
		.back
		{
			background-color: white;
			font-family: Arial, Helvetica, sans-serif;
			width: 100%;
			font-size: 20px;
			text-align: center;
			padding: 1%;
			border: 1px solid black;
			border-radius: 4px;
			text-decoration: none;
		}
		.back:hover,click
		{
			background-color: #ff3300;
			color: white;
			font-family: Arial, Helvetica, sans-serif;
			width: 100%;
			font-size: 20px;
			text-align: center;
			padding: 1%;
			border: 1px solid black;
			border-radius: 4px;
			text-decoration: none;
		}
		.custom
		{
			background-color: #ccf5ff;
			position: absolute;
			width: 100%;
			top: 10%;
			margin-left: 20%;

			
		}
		.table
		{
			padding: 2%;
			top: 10%;
			bottom: 10%;
			width: 60%;
			text-align: center;
			background-color: #71ccea;
			box-shadow: 0px 0px 15px  black;
			border-radius: 5px;
			border: none;



		}
		.table label,input
		{
			font-family: Arial, Helvetica, sans-serif;
			font-size: 20px;
			display: inline-block;
			text-align: left;
			margin: 3px;
		}
		.table label
		{
			font-weight: 500;
		}
		.table td,tr
		{
			padding: 2px;
			display: inline-block;
			text-align: left;
		}
		.table tr
		{
			width: 100%;
		}
		.error
		{
			color: red;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 15px;
		}
		legend
		{
			width: 60%;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 30px;
			text-align: center;
			text-shadow: 0px 0px 3px   #00b8e6;
		}
	</style>
</head>
<body class="custom">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
	<legend><b>REGISTER</b></legend><br>
	<table class="table">
		<tr>
			<td style="width: 22%" ><label for="firstName">First Name:</label></td>
			<td><input type="text" name="firstName" id="firstName" value="<?php echo $firstName?>"></td>
			<td style="width: 40%"><span class="error">* <?php echo $firstNameE?></span></td>
		</tr>
		<tr>
			<td style="width: 22%"><label for="lastName">Last Name:</label></td>
			<td><input type="text" name="lastName" id="lastName" value="<?php echo $lastName?>"></td>
			<td style="width: 40%"><span class="error">* <?php echo $lastNameE?></span></td>
		</tr>
		<tr>
			<td style="width: 22%"><label for="image">Image:</label></td>
			<td><input type="file" name="image" id="image" ></td>
			<td style="width: 22%"><span class="error">* <?php echo $imageE?></span>
		</tr>
		<tr>
			<td style="width: 22%"><label for="userName">Username:</label></td>
			<td><input type="text" name="userName" id="userName" value="<?php echo $userName?>"></td>
			<td style="width: 40%"><span class="error">* <?php echo $userNameE?></span></td>
		</tr>
		<tr>
			<td style="width: 22%"><label for="email">Email:</label></td>
			<td><input  type="text" name="email" id="email" value="<?php echo $email?>"><br></td>
			<td style="width: 40%"><span class="error">* <?php echo $emailE?></span></td>
		</tr>
		<tr>
			<td style="width: 22%"><label for="pass">Password:</label></td>
			<td><input type="password" name="pass" id="pass" value="<?php echo $pass?>"></td>
			<td style="width: 40%"><span class="error">* <?php echo $passE?></span></td>
		</tr>
		<tr>
			<td style="width: 22%"><label for="repeatpass">Repeat Password:</label></td>
			<td><input type="password" name="repeatpass" id="repeatpass" value="<?php echo $repeatpass?>"><br></td>
			<td style="width: 40%"><span class="error">* <?php echo $repeatpassE?></span></td>
		</tr>
		<tr>
			<td><label>Type:</label>
			<td><input type="radio" name="type" id="admin" value="admin"><br></td>
			<td><label for="admin">ADMIN</label></td>
			<td><input type="radio" name="type" id="farmer" value="farmer"><br></td>
			<td><label for="farmer">FARMER</label></td>
			<td><input type="radio" name="type" id="client" value="client"><br></td>
			<td><label for="client">CLIENT</label></td>
			<td style="width: 15%"><span class="error">* <?php echo $typeE?></span></td>
			<td style="width: 17%; text-align: right;"><input class="button" type="submit" name="register" value="REGISTER"></td>
			<td style="width: 10%; text-align: right;"><input class="back" style="border-radius: 4px;" type="submit" name="back" value="BACK"></td>
		</tr>
	</table>
</form>


</body>
</html>