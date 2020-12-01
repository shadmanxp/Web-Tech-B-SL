<?php
	
	session_start();

	require_once 'controller/functions.php';
	$userName=$pass="";
	$userNameE=$passE="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(isset($_POST["login"]))
	{
		$user=fetch_user_byusername($_POST["userName"]);

		if(empty($_POST['userName'])&&empty($_POST['userName']))
		{
			$userNameE="Username can not be empty!";
			$passE="Password can not be empty!";
		}
		if($user['id']=='0')
		{
			$userNameE="Username does not exist!";
		}
		else
		{
			if($user['username']==$_POST['userName']&&$user['password']==$_POST['pass'])
			{	
				$_SESSION['id'] = $user['id'];

				if(isset($_POST['remember']))
				{
					setcookie('user', $user['firstname'].$user['lastname'], time()+900);
				}

				header("Location: LoggedPage.php");
			}
			elseif($user['username']==$_POST['userName']&&$user['password']!=$_POST['pass'])
			{
				$userNameE="Invalid Username!";
				$passE="Invalid Passoword!";
			}
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
	<title>Login Page</title>
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
			position: fixed;
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
			width:50%;
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
			width: 50%;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 30px;
			text-align: center;
			text-shadow: 0px 0px 3px   #00b8e6;
		}
	</style>
</head>
<body class="custom">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
	<legend><b>LOGIN</b></legend><br>
	<table class="table">
		<tr>
			<td style="width: 15%"><label for="userName">Username:</label></td>
			<td><input type="text" name="userName" id="userName" value="<?php echo $userName?>"></td>
			<td style="width: 40%"><span class="error">* <?php echo $userNameE?></span></td>
		</tr>
		<tr>
			<td style="width: 15%"><label for="pass">Password:</label></td>
			<td><input type="password" name="pass" id="pass" value="<?php echo $pass?>"></td>
			<td style="width: 40%"><span class="error">* <?php echo $passE?></span></td>
		</tr>
		<tr style="text-align: right">
			<td><input style="margin: 0;" type="checkbox" name="rememer" id="remember" value=""></td>
			<td><label style="margin: 0;" for="remember">Remember me</label></td>
			<td style="width: 17%; text-align: right;"><input class="button" type="submit" name="login" value="LOGIN"></td>
			<td style="width: 10%; text-align: right;"><input class="back" type="submit" name="back" value="BACK"></td>
		</tr>
	</table>
</form>


</body>
</html>