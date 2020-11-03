<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style>
			label{
			  display: inline-block;
			  width: 10%;
			  padding: 1%; 
			}
			hr
			{
				style="border: 0.01px solid;
			}
		.error
		{
			color: RED;
		}
	</style>
</head>
<body>

<?php

session_start();

$loginusername= $loginpass="";
$loginusernameE= $loginpassE="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  	if(empty($_POST["loginusername"])){
		$loginusernameE="User Name is requied";
	}
	else
	{
		if($_SESSION['username']!=$_POST['loginusername'])
		{
			$loginusernameE="User Name is invalid";
		}

	}
	if(empty($_POST["loginpass"]))
		{
			$loginpassE="Password is requied";
		}
	else
		{
			if($_SESSION['pass']!=$_POST['loginpass'])
			{
				$loginpassE="Password is invalid";
			}
		}

	if(($_SESSION['pass']==$_POST['loginpass'])&&($_SESSION['username']!=$_POST['loginusername']))
	{
		header("location: logged.php");
	}
	



}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<?php include('header.php');?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"style="padding-top: 10px">

	<fieldset style="width: 80%; margin-left: 10%">
	<legend><b>LOGIN</b></legend>

	<label for="loginusername" >User Name</label>
	<input type="text" name="loginusername" value="<?php echo $loginusername;?>"><span class="error">* <?php echo $loginusernameE;?></span><br>

	<label for="loginpass" >Password</label>
	<input type="password" name="loginpass" value="<?php echo $loginpass;?>"><span class="error">* <?php echo $loginpassE;?></span><br>
	<hr>

	
      <input type="checkbox" checked="checked" name="remember" style="width: 10px">
      <label for="remember"> Remember me </label>

    <br>

    <button type="submit">Login</button>

	</fieldset>
</form>


<?php include('footer.php');?>

</body>
</html>