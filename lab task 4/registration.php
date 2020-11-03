<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
		<style>
			label{
			  display: inline-block;
			  width: 20%;
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


$name = $email =$username=$pass=$passR= $dd= $mm=$yyyy=$gender="";
$nameE= $emailE =$usernameE=$passE=$passRE= $dobE=$genderE="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	session_start();
	

	if(empty($_POST["name"])){
		$nameE="Name is requied";
	}
	else
	{
		$name = test_input($_POST["name"]); $_SESSION['name']=$name;
		if( preg_match("/^[0-9]/", $name))
			{$nameE="Must start with letter";}
		else if (!preg_match("/^[a-zA-Z-. ?!]{2,}$/",$name)) {
      	{$nameE = "At least two words and can only contain letters,period,dash";}
		}
	}

	if(empty($_POST["email"])) {
    	$emailE = "Email is required";
  	} 
  	else 
  	{
	    $email = test_input($_POST["email"]); $_SESSION['email']=$email;
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    $emailE = "Invalid email format. Format: example@something.com";}
  	}

  	if(empty($_POST["username"])){
		$usernameE="User Name is requied"; 
	}
	else
	{
		$username = test_input($_POST["username"]); $_SESSION['username']=$username;
		if (!preg_match("/[a-zA-Z][_]*[0-9]*[^ @$*&^%!#()-+:<>?]{5,20}$/",$username)) {
      	{$usernameE = "At least 5 characters and max 20. Can only contain alphabets,digits,undersore";}
		}
	}

	if(empty($_POST["pass"])){
		$passE="Password is requied";
	}
	else
	{
		$pass = test_input($_POST["pass"]); $_SESSION['pass']=$pass;
		if (!preg_match("/[a-zA-Z0-9#@_]{8,}$/",$pass)) {
      	{$passE = "At least 8 characters. Must contain a digit and can use _,@,# ";}
		}
	}

  	if(empty($_POST["dd"]) or empty($_POST["mm"]) or empty($_POST["yyyy"])){
		$dobE="Full Date of birth input is requied";
		$dd = test_input($_POST["dd"]); $_SESSION['dd']=$dd;
		$mm = test_input($_POST["mm"]); $_SESSION['mm']=$mm;
		$yyyy = test_input($_POST["yyyy"]); $_SESSION['yyyy']=$yyyy;

	}
	else
	{
		$dd = test_input($_POST["dd"]); $_SESSION['dd']=$dd;
		$mm = test_input($_POST["mm"]); $_SESSION['mm']=$mm;
		$yyyy = test_input($_POST["yyyy"]); $_SESSION['yyyy']=$yyyy;

		if( !filter_var($dd,FILTER_VALIDATE_INT,array('options' => array(
            'min_range' => 1, 
            'max_range' => 31
        )))|!filter_var($mm,FILTER_VALIDATE_INT,array('options' => array(
            'min_range' => 1, 
            'max_range' => 12
        )))|!filter_var($yyyy,FILTER_VALIDATE_INT,array('options' => array(
            'min_range' => 1953, 
            'max_range' => 1998
        ))))
			{$dobE="Must be valid numbers(dd:1-31,mm: 1-12,yyyy: 1953-1998)";}
	}

	if(!isset($_POST["gender"]))
	{
		$genderE="At least one of them must be selected";
		$_SESSION['gender']=$gender;
	}

	if(empty($_POST["passR"])){
		$passRE="Confirm password is requied";
	}
	else
	{
		$passR = test_input($_POST["passR"]);
		if($_POST["pass"]!=$_POST["passR"])
		{
			$passRE="Password doesn't match";
		}
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
	<legend><b>REGISTRATION</b></legend>

	<label for="name" >Name</label>
	<input type="text" name="name" value="<?php echo $name;?>" ><span class="error">* <?php echo $nameE;?> </span><br>
	<hr>

	<label for="email" >Email</label>
	<input type="text" name="email" value="<?php echo $email;?>"><span class="error">* <?php echo $emailE;?></span><br>
	<hr>

	<label for="username" >User Name</label>
	<input type="text" name="username" value="<?php echo $username;?>"><span class="error">* <?php echo $usernameE;?></span><br>
	<hr>

	<label for="pass" >Password</label>
	<input type="password" name="pass" value="<?php echo $pass;?>"><span class="error">* <?php echo $passE;?></span><br>
	<hr>

	<label for="passR" >Confirm Password</label>
	<input type="password" name="passR" value="<?php echo $passR;?>"><span class="error">* <?php echo $passRE;?></span><br>
	<hr>

	<fieldset style="width: 90%; ">
	<legend><b>GENDER</b></legend>
	<input  type="radio" name="gender"<?php if(isset($gender) && $gender=="female") echo "checked";?> value="female">Female

	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male	

	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other 
	<br>	
	<span class="error" >* <?php echo $genderE;?></span	>			

	</fieldset>

	<fieldset style="width: 90%; ">
	<legend>Date of Birth</legend>
	<table>
	<tr style="text-align: center;">
		<th style="font-weight: normal;"><label for="dd" >dd</label></th>
		<th></th>
		<th style="font-weight: normal;"><label for="mm" >mm</label></th>
		<th></th>
		<th style="font-weight: normal;"><label for="yyyy">yyyy</label></th>
		<th></th>
	</tr>
	<tr>
	<td><input type="text" name="dd" style="width: 30px" value="<?php echo $dd;?>"></td>
	<td>/</td>
	<td><input type="text" name="mm" style="width: 30px" value="<?php echo $mm;?>"></td>
	<td>/</td>
	<td><input type="text" name="yyyy" style="width: 30px;" value="<?php echo $yyyy;?>"></td>
	<td style="padding-left: 10px"><span class="error">* <?php echo $dobE;?></span></td>
	</tr>
	</table>
	</fieldset>
	<hr>



	<input type="submit" name="submit" value="Submit" style="width: 100px">
	<form action="registration.php">
		<input type="reset" name="reset" value="Reset" style="width: 100px">
	</form>
</fieldset>
</form>

<?php include('footer.php');?>

</body>
</html>