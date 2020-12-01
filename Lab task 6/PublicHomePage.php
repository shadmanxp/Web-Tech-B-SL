<?php 
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Public Home</title>
	<style>
		a
		{
			color:black;
			position: relative;
		}
		a:hover
		{
			background-color: #00ace6;
			color:white;
			
		}
		td
		{
			color:black;
			position: relative;

		}
		td:hover
		{
			background-color: #00ace6;
			color:white;
			
		}
		.custom
		{
			background-color: #ccf5ff;
			position: absolute;
			width: 100%;
			top: 10%;
			margin-left: 20%;
		}
		.border tr,td,th,table
		{

			border: 1px solid;
			border-collapse:collapse;
			background-color: #71ccea;
			width: 50%;
			padding: 10%;
		}
		.border table
		{
			box-shadow: 0px 0px 15px  black;
			border-radius: 5px;
		}
		.border td,a
		{
			font-size: 30px;
			text-decoration: none;
			font-family: Arial, Helvetica, sans-serif;
		}
	</style>
</head>
<body class="custom border">
	<table >
		<tr >
			<td rowspan="3">Public User</td>
			<td><a href="PublicHomePage.php">Public Home</a></td>
		</tr>
		<tr>
			<td><a href="RegistrationPage.php">Registration</a></td>
		</tr>
		<tr>
			<td><a <?php if (isset($_SESSION['id'])): ?>
				href="LoggedPage.php"
			<?php else: ?>
				href="LoginPage.php"
			<?php endif ?> >Login</a></td>
		</tr>
	</table>
</body>
</html>