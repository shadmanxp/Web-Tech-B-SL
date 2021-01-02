<?php 
	
	require_once '../controller/adminfunctions.php';
	$src="";
	session_start();
	$user=fetch_user($_SESSION["id"]);
	$edituser=fetch_user($_GET["id"]);

	$previouspassword=$password=$repeatpassword="";
	$previouspasswordE=$passwordE=$repeatpasswordE="";


if($_SERVER["REQUEST_METHOD"] == "POST")
{
			if(!preg_match("/[a-zA-Z0-9][^ #!:$^&]{5,}$/", $_POST["password"]))
			{
				$passwordE="Must be of Length:6 and must contain lowercase, uppercase,number. Cannot contain '#!:$^&' ";
			}
			elseif($_POST["password"]==$_POST["repeatpassword"]&&$_POST["previouspassword"]==$edituser["user_password"])
			{
				$data["password"]=$_POST["password"];
			}
			if($_POST["password"]!=$_POST["repeatpassword"])
			{
				$repeatpasswordE="Must match with password!";
			}

			$data["id"]=$_GET["id"];

			if(isset($data["password"])&&isset($data["id"]))
			{
				update_password($data);
				passwordupdatealert();
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
	<div id="passeditform" class="loginbackground mb-2">
		<div class="container-fluid">
		<br>
		<div class="row">
			<div class="col-sm headerdisplaynone">
			</div>
			<div id="editpassworddiv" class="shadow p-3 mb-5 bg-white rounded">
				<form name="passchangeform" action="admin_profilepasschangepage.php?id=<?php echo $_GET['id']?>" onsubmit="return validatepasschangeForm()" method="POST" class=" rounded" style="padding: 15px;" enctype="multipart/form-data">
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
					<div class="form-group mb-3">
						<div class="input-group flex-nowrap mb-2">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Username</span>
						    </div>
						  	<input type="text" class="form-control" name="username"  id="username" value="<?php echo $edituser['user_name']?>" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" readonly>
						</div>
					</div>
					<div class="form-group mb-3">
					    <div class="input-group flex-nowrap mb-1">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Previous Password</span>
						    </div>
						    <input type="password" class="form-control" name="previouspassword" id="previouspassword" placeholder="Input your previous password" aria-describedby="addon-wrapping">
						</div>
						<small id="previouspasswordE" class="form-text font-weight-normal error"><?php echo $previouspasswordE?></small>
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
				    <button type="submit" id="register" class="btn btn-danger mb-2" onclick="return confirmation()">Update</button>
				    <button type="button" id="register" class="btn btn-warning mb-2" onclick="editpageredirect(<?php echo $edituser['user_id']?>)">Back</button>

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