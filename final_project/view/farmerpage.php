<?php 
	
	require_once '../controller/farmer1functions.php';
	session_start();
	$user=fetch_userid($_SESSION["id"]);

	$firstname=$lastname=$username=$email=$previouspassword=$password=$repeatpassword=$address=$phone="";
	$firstnameE=$lastnameE=$usernameE=$emailE=$previouspasswordE=$passwordE=$repeatpasswordE=$addressE=$phoneE="";

	if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['farmerupdate']))
	{

				$data['id']=$user['user_id'];
				if(!empty($_POST["firstname"])&&!empty($_POST["lastname"]))
					{
						$data["firstname"]=$_POST["firstname"];
						$data["lastname"]=$_POST["lastname"];
					}
				if(!preg_match("/[a-z][^ #!:$^&]{7,15}$/",$_POST["username"]))
				{
					$usernameE="Must be of Length:8-16 and can not contain !:$^& ";
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
				if(!preg_match("/[0-9][^a-zA-Z][^ !@#$%^&*()_-{}[]|:<>?~]{13,14}$/", $_POST["phone"]))
				{
					$phoneE="Must be of Length:14 and only numbers with +880";
				}
				else
				{
					$data["phone"]=$_POST["phone"];
				}
				$data["address"]=$_POST["address"];

				if(isset($data["firstname"])&&isset($data["lastname"])&&isset($data["username"])&&isset($data["email"])&&isset($data["address"])&&isset($data["phone"]))
				{
					update_farmer($data);

				}
	}
	else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['farmerchangepassword']))
	{
			if(!preg_match("/[a-zA-Z0-9][^ #!:$^&]{5,}$/", $_POST["password"]))
			{
				$passwordE="Must be of Length:6 and must contain lowercase, uppercase,number. Cannot contain !:$^& ";
			}
			elseif($_POST["password"]==$_POST["repeatpassword"]&&$_POST["previouspassword"]==$user["user_password"])
			{
				$data["password"]=$_POST["password"];
			}
			if($_POST["password"]!=$_POST["repeatpassword"])
			{
				$repeatpasswordE="Must match with password!";
			}

			$data["id"]=$user["user_id"];

			if(isset($data["password"])&&isset($data["id"]))
			{
				update_password($data);
			}
	}	

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../farmer1xml.js"></script>
</head>
<?php if (!isset($_SESSION["id"])) { header("location: homepage.php");} ?>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST" ): ?>
	<body onload="viewfarmerprofile('<?php echo $user["user_id"] ?>','<?php echo $firstnameE ?>','<?php echo $lastnameE ?>','<?php echo $usernameE ?>','<?php echo $emailE ?>','<?php echo $previouspasswordE ?>','<?php echo $passwordE ?>','<?php echo $repeatpasswordE ?>','<?php echo $addressE ?>','<?php echo $phoneE ?>');moduleload()">
<?php else: ?>
	<body onload="showwelcomeboard('<?php echo $user['user_id'] ?>');">
<?php endif ?>
	<?php if (!isset($_SESSION["id"])) { header("location: homepage.php");} ?>
	<?php include("farmerheader.php")?>
	<script type="text/javascript" src="../farmer1resize.js"></script>
	
	<div id="view">
		
	</div>

	<?php include("footer.php")?>

</body>
</html>