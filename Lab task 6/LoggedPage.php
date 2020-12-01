<?php 
	
	require_once 'controller/functions.php';
	$src="";
	session_start();
	$user=fetch_user($_SESSION["id"]);
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
			padding: 5%;
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
			<td><a href="">Dashboard</a></td>
			<?php $src='uploads/'.$user['image'] ?>
			<td style="text-align: center;" rowspan="5"> <img src="<?php echo $src ?>" alt="<?php echo $user['image']?>" style="width:250px;height:250px;" ><br> WELCOME <?php echo $user['firstname']?></td>
		</tr>
		<tr>
			<td><a href="ViewProfilePage.php">View Profile</a></td>
		</tr>
		<tr>
			<td><a href="EditProfilePage.php?update=">Edit Profile</a></td>
		</tr>
				<tr>
			<td><a href="ChangePasswordPage.php?update=">Change Password</a></td>
		</tr>
		<tr>
			<td><a href="controller/logout.php">Logout</a></td>
		</tr>
	</table>
</body>
</html>