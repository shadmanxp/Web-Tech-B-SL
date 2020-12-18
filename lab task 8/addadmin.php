<?php

	require_once 'controller/functions.php';
	$firstname=$lastname=$username=$email=$password=$repeatpassword="";
	$firstnameE=$lastnameE=$usernameE=$emailE=$passwordE=$repeatpasswordE=$typeE=$imageE="";
	$type="admin";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
		$user=fetch_user($_POST["username"]);
		if($user['id']=='0')
		{
			if(empty($_POST["firstname"])||empty($_POST["lastname"]))
				{ 
					$firstnameE="First Name cannot be empty!";
					$lastnameE="Last Name cannot be empty!";
				}
			else
				{
					$data["firstname"]=$_POST["firstname"];
					$data["lastname"]=$_POST["lastname"];
				}
			if(empty($_POST["username"]))
				{ $usernameE="Username cannot be empty!"; }
			elseif(!preg_match("/[a-z][^ #!:$^&]{7,15}$/",$_POST["username"]))
			{
				$usernameE="Must be of Length:8-16 and cannot contain '#!:$^&' ";
			}
			else
			{
				$data["username"]=$_POST["username"];
			}
			if(empty($_POST["email"]))
				{ $emailE="Email cannot be empty!";}
			elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
			{
			  $emailE = "Invalid email format. Example:abcd@abcd.com";
			}
			else
			{
				$data["email"]=$_POST["email"];
			}

			if(empty($_POST["password"]))
				{ $passwordE="Password cannot be empty!";}
			elseif(!preg_match("/[a-zA-Z0-9][^ #!:$^&]{5,}$/", $_POST["password"]))
			{
				$passwordE="Must be of Length:6 and must contain lowercase, uppercase,number. Cannot contain '#!:$^&' ";
			}
			elseif($_POST["password"]==$_POST["repeatpassword"])
			{
				$data["password"]=$_POST["password"];
			}
			if(empty($_POST["repeatpassword"]))
				{ $repeatpasswordE="Repeat Password cannot be empty!";}
			elseif($_POST["password"]!=$_POST["repeatpassword"])
			{
				$repeatpasswordE="Must match with password!";
			}

			$data["type"]=$_POST["type"];
			$target_dir = "uploads/";
			$target_file = $target_dir.basename($_FILES["image"]["name"]);
			$imagename=basename($_FILES["image"]["name"]);

			if(isset($data["firstname"])&&isset($data["lastname"])&&isset($data["username"])&&isset($data["email"])&&isset($data["password"])&&isset($data["type"])&&move_uploaded_file($_FILES["image"]["tmp_name"] , $target_file))
			{
				$data['image'] = basename($_FILES["image"]["name"]);
				add_user($data);
			}
			else
			{
				$imageE="Must upload Image!";
			}
		}
		elseif($user['username']===$_POST["username"]&&$user['email']===$_POST["email"])
		{
			$usernameE="Username already exists!";
			$emailE="Email already exists!";
		}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	

</body>
</html>