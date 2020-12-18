<?php 
	
	require_once 'controller/functions.php';
	$src="";
	session_start();
	$user=fetch_user($_SESSION["id"]);

	$firstname=$lastname=$username=$email=$password=$repeatpassword="";
	$firstnameE=$lastnameE=$usernameE=$emailE=$passwordE=$repeatpasswordE=$typeE=$imageE="";
	$type="admin";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
		$user=fetch_user_byusername($_POST["username"]);
		if($user['id']=='0')
		{
			if(!empty($_POST["firstname"])&&!empty($_POST["lastname"]))
				{
					$data["firstname"]=$_POST["firstname"];
					$data["lastname"]=$_POST["lastname"];
				}
			if(!preg_match("/[a-z][^ #!:$^&]{7,15}$/",$_POST["username"]))
			{
				$usernameE="@@Must be of Length:8-16 and cannot contain '#!:$^&' ";
			}
			else
			{
				$data["username"]=$_POST["username"];
			}
			if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
			{
			  $emailE = "Invalid email format. Example:abcd@abcd.com";
			}
			else
			{
				$data["email"]=$_POST["email"];
			}
			if(!preg_match("/[a-zA-Z0-9][^ #!:$^&]{5,}$/", $_POST["password"]))
			{
				$passwordE="Must be of Length:6 and must contain lowercase, uppercase,number. Cannot contain '#!:$^&' ";
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
			$target_dir = "uploads/";
			$target_file = $target_dir.basename($_FILES["image"]["name"]);
			$imagename=basename($_FILES["image"]["name"]);

			if(isset($data["firstname"])&&isset($data["lastname"])&&isset($data["username"])&&isset($data["email"])&&isset($data["password"])&&isset($data["type"])&&move_uploaded_file($_FILES["image"]["tmp_name"] , $target_file))
			{
				$data['image'] = basename($_FILES["image"]["name"]);
				add_user($data);
			}
		}
		elseif($user['username']===$_POST["username"]&&$user['email']===$_POST["email"])
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
</head>
<body>
	<?php if (!isset($_SESSION["id"])) { header("location: homepage.php");} ?>
	<?php include("loggedheader.php")?>
	<div id="showaddform" class="loginbackground" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?> style="display: block;" <?php else: ?> style="display: none" <?php endif ?>>
		<div class="container-fluid">
		<br>
		<div class="row ">
			<div class="col-sm headerdisplaynone">
			</div>
			<div id="addadmindiv" class="shadow p-3 mb-5 bg-white rounded">
				<form name="addadminform" action="loggedpage.php" onsubmit="return validateaddadminForm()" method="POST" class="loginbackground rounded" style="padding: 15px;" enctype="multipart/form-data">
					<div class="text-center mb-3">
						<h3><span class="badge shadow badge-pill badge-success" style="text-align: center;">ADD ADMIN</span></h3>
					</div>
					<div class="row mb-2">
					    <div class="col">
						    <div class="form-group input-group flex-nowrap mb-1">
						    	<span class="input-group-text" id="addon-wrapping">First</span>
						        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Name" aria-describedby="addon-wrapping">
						        
						    </div>
						    <small id="firstnameE" class="form-text font-weight-normal error"><?php echo $firstnameE?></small>
					    </div>
					    <div class="col mb-2">
						    <div class="form-group input-group flex-nowrap mb-1">
						    	<span class="input-group-text" id="addon-wrapping">Last</span>
						        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Name" aria-describedby="addon-wrapping">
						        
						    </div>
						    <small id="lastnameE" class="form-text font-weight-normal error"><?php echo $lastnameE?></small>
					    </div>
					</div>
					<input type="hidden" name="type" value="admin">
					<div class="form-group mb-3">
						<div class="input-group flex-nowrap mb-2">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Image</span>
						    </div>
						    	<input type="file" name="image"  id="image" aria-describedby="addon-wrapping" >
						</div>
						<small id="imageE" class="form-text font-weight-normal error"><?php echo $imageE?></small>
						
					</div>
					<div class="form-group mb-3">
						<div class="input-group flex-nowrap mb-2">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">@</span>
						    </div>
						  	<input type="text" class="form-control" name="username"  id="username" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
						</div>
						<small id="usernameE" class="form-text font-weight-normal error"><?php echo $usernameE?></small>
						
					</div>
					<div class="form-group mb-3">
						<div class="input-group flex-nowrap mb-1">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Email</span>
						    </div>
						    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" aria-describedby="addon-wrapping">
						</div>
					    <small id="emailE" class="form-text font-weight-normal error"><?php echo $emailE?></small>
				    	
					</div>
				    <div class="form-group mb-3">
					    <div class="input-group flex-nowrap mb-1">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Password</span>
						    </div>
						    <input type="password" class="form-control" name="password" id="password" placeholder="Input your password" aria-describedby="addon-wrapping">
						</div>
						<small id="passwordE" class="form-text font-weight-normal error"><?php echo $passwordE?></small>
				    </div>
				    <div class="form-group mb-3">
					    <div class="input-group flex-nowrap mb-1">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Repeat Password</span>
						    </div>
						    <input type="password" class="form-control" name="repeatpassword" id="repeatpassword" placeholder="Repeat your password" aria-describedby="addon-wrapping">
					    </div>
					    <small id="repeatpasswordE" class="form-text font-weight-normal error"><?php echo $repeatpasswordE?></small>
				    </div>
				    <button type="submit" id="register" onclick="submitaddadmin()" class="btn btn-success">Register</button>
			    </form>
			</div>
			<div class="col-sm headerdisplaynone">
			</div>
		</div>
	</div>
		
	</div>
	
	<?php include("footer.php")?>



</body>
</html>