<?php
	
	session_start();

	require_once 'controller/functions.php';
	$username=$password="";
	$usernameE=$passwordE="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
		$user=fetch_user_byusername($_POST["username"]);

		if($user['id']=='0')
		{
			$usernameE="Username does not exist!";
		}
		else
		{
			if($user['username']==$_POST['username']&&$user['password']==$_POST['password'])
			{	
				$_SESSION['id'] = $user['id'];

				if(isset($_POST['rememberme']))
				{
					setcookie('user', $user['firstname'].$user['lastname'], time()+900);
				}

				header("Location: loggedpage.php");
			}
			elseif($user['username']==$_POST['username']&&$user['password']!=$_POST['password'])
			{
				$usernameE="Invalid Username!";
				$passwordE="Invalid Password!";
			}
		}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<?php if (isset($_SESSION["id"])) { header("location: loggedpage.php");} ?>
	<?php include("header.php")?>
	<div class="container-fluid">
		<br>
		<div class="row ">
			<div class="col-sm headerdisplaynone">
			</div>
			<div id="logindiv" class="col-4 shadow p-3 mb-5 bg-white rounded">
				
				<form name="loginform" action="loginpage.php" onsubmit="return validateloginForm()" method="POST" class="loginbackground rounded" style="padding: 15px;">
					<div class="text-center">
						<h3><span class="badge badge-pill badge-success" style="text-align: center;">LOGIN</span></h3>
					</div>
				    <div class="form-group">
					    <label for="username">Username</label>
					    <input type="text" class="form-control" name="username"  id="username" aria-describedby="username">
					    <small id="usernameE" class="form-text font-weight-normal error"><?php echo $usernameE?></small>
				    </div>
				    <div class="form-group">
					    <label for="username">Password</label>
					    <input type="password" class="form-control" name="password" id="password">
					    <small id="passwordE" class="form-text font-weight-normal error"><?php echo $passwordE?></small>
					</div>
				    <div class="form-group form-check">
					    <input type="checkbox" class="form-check-input" name="rememberme" id="rememberme">
					    <label class="form-check-label" for="rememberme">Remember me</label>
				    </div>
				    <button type="submit" id="submit" class="btn btn-success">Login</button>
			    </form>
			</div>
			<div class="col-sm headerdisplaynone">
			</div>
		</div>
	</div>
	<br>
	<?php include("footer.php")?>
</body>
</html>