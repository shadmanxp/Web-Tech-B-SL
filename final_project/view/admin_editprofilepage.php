<?php 
	
	require_once '../controller/adminfunctions.php';
	$src="";
	session_start();
	$user=fetch_user($_SESSION["id"]);
	$edituser=fetch_user($_GET["id"]);

	$firstname=$lastname=$username=$email=$address=$phone="";
	$firstnameE=$lastnameE=$usernameE=$emailE=$addressE=$phoneE="";
	$type="admin";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
			if(!empty($_POST["firstname"])&&!empty($_POST["lastname"]))
				{
					$data["firstname"]=$_POST["firstname"];
					$data["lastname"]=$_POST["lastname"];
				}
			if(!preg_match("/[a-z][^ #!:$^&]{7,15}$/",$_POST["username"]))
			{
				$usernameE="Must be of Length:8-16 and cannot contain '#!:$^&' ";
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
			if(!preg_match("/[0-9][^a-zA-Z][^ !@#$%^&*()_-{}[]|:<>?~]{13}$/", $_POST["phone"]))
			{
				$phoneE="Must be of Length:14 and only numbers with +880";
			}
			else
			{
				$data["phone"]=$_POST["phone"];
			}
			$data["address"]=$_POST["address"];
			$data["id"]=$_GET["id"];

			if(isset($data["firstname"])&&isset($data["lastname"])&&isset($data["username"])&&isset($data["email"])&&isset($data["address"])&&isset($data["phone"])&&isset($data["id"]))
			{
				edit_user($data);
				updateuseralert();
				header("location: admin_editprofilepage.php?id=".$edituser['user_id']);
			}
}	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body onload="loadview()">
	<?php if (!isset($_SESSION["id"])) { header("location: homepage.php");} ?>
	<?php include("disabledloggedheader.php")?>
	<div id="profileeditform" class="loginbackground mb-2">
		<div class="container-fluid">
		<br>
		<div class="row">
			<div class="col-sm headerdisplaynone">
			</div>
			<div id="editprofilediv" class="shadow p-3 mb-5 bg-white rounded">
				<form name="editprofileform" action="admin_editprofilepage.php?id=<?php echo $_GET['id']?>" onsubmit="return validateeditForm()" method="POST" class=" rounded" style="padding: 15px;" enctype="multipart/form-data">
					<div class="row mb-2">
						<div class="col-12 text-center">
							<h3><span class="badge shadow badge-pill badge-success" style="text-align: center;">EDIT PROFILE</span></h3>
						</div>
					</div>
					<div class="form-group mb-3">
							<div class="input-group flex-nowrap mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text" id="addon-wrapping">ID</span>
								</div>
								<input type="text" class="form-control" name="userid" value="<?php echo $edituser['user_id']?>"  id="userid" placeholder="Userid" aria-label="Userid" aria-describedby="addon-wrapping" readonly>
							</div>
											
					</div>
					<div class="row mb-2">
					    <div class="col">
						    <div class="form-group input-group flex-nowrap mb-1">
						    	<span class="input-group-text" id="addon-wrapping">First Name</span>
						        <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $edituser['first_name']?>" placeholder="Name" aria-describedby="addon-wrapping">
						        
						    </div>
						    <small id="firstnameE" class="form-text font-weight-normal error"><?php echo $firstnameE?></small>
					    </div>
					    <div class="col mb-2">
						    <div class="form-group input-group flex-nowrap mb-1">
						    	<span class="input-group-text" id="addon-wrapping">Last Name</span>
						        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo $edituser['last_name']?>" placeholder="Name" aria-describedby="addon-wrapping">
						        
						    </div>
						    <small id="lastnameE" class="form-text font-weight-normal error"><?php echo $lastnameE?></small>
					    </div>
					</div>
					<div class="form-group mb-3">
						<div class="input-group flex-nowrap mb-2">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Username</span>
						    </div>
						  	<input type="text" class="form-control" name="username"  id="username" value="<?php echo $edituser['user_name']?>" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
						</div>
						<small id="usernameE" class="form-text font-weight-normal error"><?php echo $usernameE?></small>
					</div>
					<div class="form-group mb-3">
						<div class="input-group flex-nowrap mb-1">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Email</span>
						    </div>
						    <input type="text" class="form-control" name="email" id="email" value="<?php echo $edituser['user_email']?>" placeholder="name@example.com" aria-describedby="addon-wrapping">
						</div>
					    <small id="emailE" class="form-text font-weight-normal error"><?php echo $emailE?></small>
				    	
					</div>
					<div class="form-group mb-3">
						<div class="input-group flex-nowrap mb-1">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Address</span>
						    </div>
						    <input type="text" class="form-control" name="address" id="address" value="<?php echo $edituser['address']?>" placeholder="House # , Block # , Road # , Flat # , Area , City" aria-describedby="addon-wrapping">
						</div>
					    <small id="addressE" class="form-text font-weight-normal error"><?php echo $addressE?></small>
				    	
					</div>
					<div class="form-group mb-3">
						<div class="input-group flex-nowrap mb-1">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Phone</span>
						    </div>
						    <input type="text" class="form-control" name="phone" value="<?php echo $edituser['phone']?>" id="phone" placeholder="+880" aria-describedby="addon-wrapping">
						</div>
					    <small id="phoneE" class="form-text font-weight-normal error"><?php echo $phoneE?></small>
				    	
					</div>
				    <button type="submit" id="register" class="btn btn-warning mb-2" onclick="return confirmation()">Update</button>
				    <button type="button" id="register" class="btn btn-warning mb-2" onclick="passchangepageredirect(<?php echo $edituser['user_id']?>)">Change Password</button>
				   	<?php if ($edituser['user_id']=="1"): ?>
				   		<button type="button" id="register" class="btn btn-danger disabled mb-2" onclick="deletepageredirect(<?php echo $edituser['user_id']?>)">Delete</button>
				   	<?php else: ?>
				   		<button type="button" id="register" class="btn btn-danger mb-2" onclick="deletepageredirect(<?php echo $edituser['user_id']?>)">Delete</button>
				   	<?php endif ?>

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