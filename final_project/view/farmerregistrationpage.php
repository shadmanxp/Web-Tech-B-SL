<?php
	
	session_start();

	require_once '../controller/farmer1functions.php';
	$firstname=$lastname=$username=$email=$password=$repeatpassword=$address=$phone="";
	$firstnameE=$lastnameE=$usernameE=$emailE=$passwordE=$repeatpasswordE=$typeE=$addressE=$phoneE="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
		$user=fetch_username($_POST["username"]);
		if($user['user_id']=='0')
		{
			if(!empty($_POST["firstname"])&&!empty($_POST["lastname"]))
				{
					$data["firstname"]=$_POST["firstname"];
					$data["lastname"]=$_POST["lastname"];
				}
			if(!preg_match("/[a-z][^ #!:$^&]{7,15}$/",$_POST["username"]))
			{
				$usernameE="Must be of Length:8-16 and can not contain '#!:$^&' ";
			}
			else
			{
				$data["username"]=$_POST["username"];
			}
			if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
			{
			  $emailE = "Invalid email format! Example:abcd@abcd.com";
			}
			else
			{
				$data["email"]=$_POST["email"];
			}
			if(!preg_match("/[0-9][^a-zA-Z][^ !@#$%^&*()_-{}[]|:<>?~]{13}$/", $_POST["phone"]))
			{
				$phoneE="Must be of Length:14 and only numbers with +880";
			}
			else
			{
				$data["phone"]=$_POST["phone"];
			}
			if(!preg_match("/[a-zA-Z0-9][^ #!:$^&]{5,}$/", $_POST["password"]))
			{
				$passwordE="Must be of Length:6 and must contain lowercase, uppercase,number and can not contain '#!:$^&' ";
			}
			elseif($_POST["password"]==$_POST["repeatpassword"])
			{
				$data["password"]=$_POST["password"];
			}
			if($_POST["password"]!=$_POST["repeatpassword"])
			{
				$repeatpasswordE="Must match with password!";
			}

			$data["type"]=$_POST["type"];
			$data["address"]=$_POST["address"];

			if(isset($data["firstname"])&&isset($data["lastname"])&&isset($data["username"])&&isset($data["email"])&&isset($data["password"])&&isset($data["type"])&&isset($data["address"])&&isset($data["phone"]))
			{
				register_farmer($data);

			}
		}
		elseif($user['user_name']===$_POST["username"]&&$user['user_email']===$_POST["email"])
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="../farmer1resize.js"></script>
	<link rel="stylesheet" href="../farmer1css.css" crossorigin="anonymous"> <!-- Farmer module 1 css-->
</head>
<body  onload="moduleload()">
	<?php if (isset($_SESSION["id"])) 
		{ 
			if($_SESSION["type"]=='admin') 
			{header("location: adminloggedpage.php");}
			else if( $_SESSION["type"]=='farmer')  
			{header("location: farmerpage.php");}
		}
	?>
	<?php include("header.php")?>
	<form name="registrationform" action="farmerregistrationpage.php" onsubmit="return regvalidation()" method="POST" enctype="multipart/form-data">
		<div class="container-fluid registration-box">
		<br>
			<div class="row text-center"><legend class="legend">BECOME A <b>SELLER</b> <small>Register Here...</small></legend></div>
			<div class="row ">
				<div class="col-sm"></div>
				<div id="registration-box" class="col-7 shadow p-3 mb-5 bg-white rounded registration-box" style="width: 100px">
					<div class="col-12 mb-3  ">
					    <label for="firstname" class="form-label">First Name:</label>
					    <input type="text" class="form-control" name="firstname"  id="firstname">
					    <div id="firstnameE" class="form-text error"><?php echo $firstnameE?></div>
					</div>
					<div class="col-12 mb-3">
					    <label for="lastname" class="form-label">Last Name:</label>
					    <input type="text" class="form-control" name="lastname"  id="lastname">
					    <div id="lastnameE" class="form-text error"><?php echo $lastnameE?></div>
					</div>
					<div class="col-12 mb-3">
					    <label for="username" class="form-label">User Name:</label>
					    <input type="text" class="form-control" name="username"  id="username">
					    <div id="usernameE" class="form-text error"><?php echo $usernameE?></div>
					</div>
					<div class="col-12 mb-3">
					    <label for="password" class="form-label">Password:</label>
					    <input type="password" class="form-control" name="password"  id="password">
					    <div id="passwordE" class="form-text error"><?php echo $passwordE?></div>
					</div>
					<input type="hidden" name="type"  id="type" value="farmer">
					<div class="col-12 mb-3">
					    <label for="repeatpassword" class="form-label">Repeat Password:</label>
					    <input type="password" class="form-control" name="repeatpassword"  id="repeatpassword">
					    <div id="repeatpasswordE" class="form-text error"><?php echo $repeatpasswordE?></div>
					</div>
					<div class="col-12 mb-3">
					    <label for="email" class="form-label">Email:</label>
					    <input type="text" class="form-control" name="email"  id="email">
					    <div id="emailE" class="form-text error"><?php echo $emailE?></div>
					</div>
					<div class="col-12 mb-3">
					    <label for="address" class="form-label">Address:</label>
					    <input type="address" class="form-control" name="address"  id="address">
					    <div id="addressE" class="form-text error"><?php echo $addressE?></div>
					</div>
					<div class="col-12 mb-3">
					    <label for="phone" class="form-label">Phone:</label>
					    <input type="text" class="form-control" name="phone"  id="phone">
					    <div id="phoneE" class="form-text error"><?php echo $phoneE?></div>
					</div>
					<div class="col-12 text-center">
						<button type="submit" id="register" class="btn btn-success">Register</button>
					</div>
				</div>
				<div class="col-sm"></div>	
			</div>
		</div>
	</form>
	<?php include("footer.php")?>
</body>
</html>