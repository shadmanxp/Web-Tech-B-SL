<?php

	require_once 'controller/functions.php';

	session_start();
	$user=fetch_user($_SESSION["id"]);

	$passdata="";
	$pass=$repeatpass=$previouspass="";
	$passE=$repeatpassE=$previouspassE="";
	$update=$_GET['update'];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["update"]))
	{
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
			if($user['password']==$_POST["previouspass"] && isset($passdata))
			{
				$data['id']=$user['id'];
				$data['password']=$passdata;
				update_password($data);
				$updatemessage="Successfully Updated";
				header("Location: ChangePasswordPage.php?update=".$updatemessage);
			}
			else
			{
				$previouspassE="Doesn't match with password!";
			}

	}
	if(isset($_POST["back"]))
	{
		header("Location: LoggedPage.php");
	}
	if(isset($_POST["reset"]))
	{
		header("Location: ChangePasswordPage.php?update=");
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
	<legend><b>Change Password</b></legend><br>
	<table class="table">
		<tr>
			<td style="width: 22%"><label for="pass">Previous Password:</label></td>
			<td><input type="password" name="previouspass" id="previouspass" value="<?php echo $previouspass?>"></td>
			<td style="width: 40%"><span class="error">* <?php echo $previouspassE?></span></td>
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
			<td style="width: 17%; text-align: right;"><input class="button" type="submit" name="update" value="Update"></td>
			<td style="width: 10%; text-align: right;"><input class="back" style="border-radius: 4px;" type="submit" name="back" value="BACK"></td>
			<td style="width: 10%; text-align: right;"><input class="back" style="border-radius: 4px;" type="submit" name="reset" value="RESET"></td>
			<td style="width: 40%"><span class="error">* <?php echo $update?></span></td>
		</tr>
	</table>
</form>


</body>
</html>