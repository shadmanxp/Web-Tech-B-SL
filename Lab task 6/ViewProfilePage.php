<?php
	
	require_once 'controller/functions.php';
	session_start();
	$src="";
	$user=fetch_user($_SESSION["id"]);

	if(isset($_POST["back"]))
	{
		header("Location: LoggedPage.php");
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
			margin-left: 30%;

			
		}
		.table
		{
			padding: 2%;
			top: 10%;
			bottom: 10%;
			width: 40%;
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
			text-align: left;
		}
		.error
		{
			color: red;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 15px;
		}
		legend
		{
			width:40%;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 30px;
			text-align: center;
			text-shadow: 0px 0px 3px   #00b8e6;
		}
	</style>
</head>
<body class="custom">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
	<legend><b>VIEW PROFILE</b></legend><br>
	<table class="table">
		<tr>
			<td width="100%"><label>ID: <?php echo $user['id'] ?></label></td>
			<?php $src='uploads/'.$user['image'] ?>
			<td rowspan="6" style="text-align: right"><img src="<?php echo $src ?>" alt="<?php echo $_SESSION['image']?>" style="width:250px;height:250px;"></td>

		</tr>
		<tr>
			<td ><label>First Name: <?php echo $user['firstname'] ?></label></td>
		</tr>
		<tr>
			<td ><label>Last Name: <?php echo $user['lastname'] ?></label></td>
		</tr>
		<tr>
			<td ><label>Username: <?php echo $user['username'] ?></label></td>
		</tr>
		<tr>
			<td ><label>Email: <?php echo $user['email'] ?></label></td>
		</tr>
		<tr>
			<td ><label>Account Type: <?php echo $user['type'] ?></label></td>
		</tr>
		<tr style="text-align: right; ">
			<td style="text-align: right; "><input class="back" style="border-radius: 4px;" type="submit" name="back" value="BACK"></td>
		</tr>
	</table>
</form>


</body>
</html>