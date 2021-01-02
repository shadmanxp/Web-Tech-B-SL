<?php 
	
	require_once '../controller/adminfunctions.php';
	$src="";
	session_start();
	$user=fetch_user($_SESSION["id"]);

	$firstname=$lastname=$username=$email=$password=$repeatpassword=$address=$phone="";
	$firstnameE=$lastnameE=$usernameE=$emailE=$passwordE=$repeatpasswordE=$typeE=$addressE=$phoneE="";
	$type="admin";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
		$user=fetch_user_byusername($_POST["username"]);
		if($user['user_id']=='0')
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
			$data["address"]=$_POST["address"];

			if(isset($data["firstname"])&&isset($data["lastname"])&&isset($data["username"])&&isset($data["email"])&&isset($data["password"])&&isset($data["type"])&&isset($data["address"])&&isset($data["phone"]))
			{
				$data["ref"]=$_SESSION["id"];
				add_user($data);
				addeduseralert();

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
	<script type="text/javascript" src="../loggedscript.js"></script>
	<script type="text/javascript" src="../myxml.js"></script>
</head>
<body onload="loadview()">
	<?php if (!isset($_SESSION["id"])) { header("location: homepage.php");} ?>
	<?php if ($_SESSION["type"]=="farmer") { header("location: farmerpage.php");} ?>
	<?php include("loggedheader.php")?>
	<div id="showaddform" class="loginbackground mb-2" <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?> style="display: block;" <?php else: ?> style="display: none" <?php endif ?>>
		<div class="container-fluid">
		<br>
		<div class="row">
			<div class="col-sm headerdisplaynone">
			</div>
			<div id="addadmindiv" class="shadow p-3 mb-5 bg-white rounded">
				<form name="addadminform" action="adminloggedpage.php" onsubmit="return validateaddadminForm()" method="POST" class=" rounded" style="padding: 15px;" enctype="multipart/form-data">
					<div class="row mb-2">
						<div class="col-11 text-center">
							<h3><span class="badge shadow badge-pill badge-success" style="text-align: center;">ADD ADMIN</span></h3>
						</div>
						<div class="col-1 ">
							<button type="button" class="btn-close" aria-label="Close" onclick="viewaddadmindiv()"></button>
						</div>
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
						    	<span class="input-group-text" id="addon-wrapping">@</span>
						    </div>
						  	<input type="text" class="form-control" name="username"  id="username" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
						</div>
						<small id="usernameE" class="form-text font-weight-normal error"><?php echo $usernameE?></small>
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
					<div class="form-group mb-3">
						<div class="input-group flex-nowrap mb-1">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Email</span>
						    </div>
						    <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com" aria-describedby="addon-wrapping">
						</div>
					    <small id="emailE" class="form-text font-weight-normal error"><?php echo $emailE?></small>
				    	
					</div>
					<div class="form-group mb-3">
						<div class="input-group flex-nowrap mb-1">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Address</span>
						    </div>
						    <input type="text" class="form-control" name="address" id="address" placeholder="House # , Block # , Road # , Flat # , Area , City" aria-describedby="addon-wrapping">
						</div>
					    <small id="addressE" class="form-text font-weight-normal error"><?php echo $addressE?></small>
				    	
					</div>
					<div class="form-group mb-3">
						<div class="input-group flex-nowrap mb-1">
						    <div class="input-group-prepend">
						    	<span class="input-group-text" id="addon-wrapping">Phone</span>
						    </div>
						    <input type="text" class="form-control" name="phone" value="+880" id="phone" placeholder="+880" aria-describedby="addon-wrapping">
						</div>
					    <small id="phoneE" class="form-text font-weight-normal error"><?php echo $phoneE?></small>
				    	
					</div>
				    <button type="submit" id="register" onclick="submitaddadmin()" class="btn btn-success">Register</button>
			    </form>
			</div>
			<div class="col-sm headerdisplaynone">
			</div>
		</div>
	</div>
		
	</div>

	<script type="text/javascript" src="../adminloggedresize.js"></script>

	<div id="showprofile" class="loginbackground mb-2" style="display: none">
		<div class="container-fluid">
		<br>
		<div class="row ">
			<div class="col-sm headerdisplaynone">
			</div>
			<div id="adminprofilediv" class=" shadow p-3 mb-5 bg-white rounded">
					<div class="row mb-2">
						<div class="col-11 text-center">
							<h3><span class="badge shadow badge-pill badge-success" style="text-align: center;">VIEW PROFILE OF <?php echo $user["user_name"]?></span></h3>
						</div>
						<div class="col-1 ">
							<button type="button" class="btn-close" aria-label="Close" onclick="viewadminprofilediv()"></button>
						</div>
					</div>
					<div class="form-group mb-2">
						<div class="input-group-prepend">
						   	<h4>First Name: <small><?php echo $user["first_name"]?></small></h4>
						</div>
					</div>
					<hr>
					<div class="form-group mb-2">
						<div class="input-group-prepend">
						    <h4>Last Name: <small><?php echo $user["last_name"]?></small></h4>
						</div>
					</div>
					<hr>
					<div class="form-group mb-2">
						<div class="input-group-prepend">
						    <h4>User Name: <small><?php echo $user["user_name"]?></small></h4>
						</div>
					</div>
					<hr>
					<div class="form-group mb-2">
						<div class="input-group-prepend">
						    <h4>Email: <small><?php echo $user["user_email"]?></small></h4>
						</div>
					</div>
					<hr>
					<div class="form-group mb-2">
						<div class="input-group-prepend">
						    <h4>Address: <small><?php echo $user["address"]?></small></h4>
						</div>
					</div>
					<hr>
					<div class="form-group mb-2">
						<div class="input-group-prepend">
						    <h4>Phone: <small><?php echo $user["phone"]?></small></h4>
						</div>
					</div>
					<hr>
					<div class="form-group mb-2">
						<div class="input-group-prepend lablebg">
						    <h4>Referred by: <small><?php $ref=fetch_user($user["ref"]); if($ref['user_id']!=0){echo $ref['user_name']." ID:".$ref['user_id'];} else{ echo "SELF";}?></small></h4>
						</div>
					</div>
			</div>
			<div class="col-sm headerdisplaynone">
			</div>
		</div>
	</div>
	</div>
	<div class="mb-2"></div>
	<div class="row bodytrim">
	<div class="col-sm-auto" >
		<div id="navbardiv" class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<a class="nav-link  active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">SHOW CLIENTS</a>
			<a class="nav-link " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">ORDERS</a>
			<a class="nav-link " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">SALES</a>
		</div>
		</div>
		<div class="col-xxl" >
					<div class="tab-content" id="v-pills-tabContent">
					    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
						    <div class="container-fluid">
						    	<div class="row">
						    		<div class="col-sm-auto headerpadding">
						    			<form action="">				    	
								    		<div class="input-group mb-1">
											  	<label class="input-group-text" for="selectuser">Select User Type</label>
											  	<select class="form-select" id="selectuser" onchange="showusers(this.value,'1','0','','')">
												    <option selected value="">Choose...</option>
												    <option value="allusers">ALL</option>
												    <option value="client">CLIENTS</option>
												    <option value="farmer">FARMERS</option>
												    <?php if ($_SESSION['id']=='1'): ?>
												    	<option value="admin">ADMINS</option>
												    <?php else: ?>
												    	<option value="admins" disabled="true">ADMINS</option>
												    <?php endif ?>											    
											  	</select>
											  	<label class="input-group-text" for="selectuser">View</label>
											  	<select class="form-select" id="filter">
												    <option selected value="5">Default 5</option>
												    <option value="7">7</option>
												    <option value="10">10</option>
												    <option value="15">15</option>											    
											  	</select>
											</div>
										</form>	
									</div>
								</div>
								<div class="row">
									<div class="col-sm">
										<div class="xmltablesers" id="showusers">Select user type to show list here...</div>
									</div>
								</div>
							</div>
					    </div>
					    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					    	<div class="container-fluid">
						    	<div class="row">
						    		<div class="col-sm-auto headerpadding">
						    			<form action="">				    	
								    		<div class="input-group mb-1">
											  	<label class="input-group-text" for="selectorder">Select Order Status</label>
											  	<select class="form-select" id="selectorder" onchange="showorders(this.value,'1','0','','')">
												    <option selected value="">Choose...</option>
												    <option value="allorders">ALL ORDERS</option>
												    <option value="processing">PROCESSING</option>
												    <option value="delivered">DELIVERED</option>												 
											  	</select>
											  	<label class="input-group-text" for="selectuser">View</label>
											  	<select class="form-select" id="filter">
												    <option selected value="5">Default 5</option>
												    <option value="7">7</option>
												    <option value="10">10</option>
												    <option value="15">15</option>											    
											  	</select>
											</div>
										</form>	
									</div>
								</div>
								<div class="row">
									<div class="col-sm">
										<div class="xmltablesers" id="showorders">Select order status to show list here...</div>
									</div>
								</div>
							</div>
					    </div>
					    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
				    </div>   
				</div>
			</div>
	<?php include("footer.php")?>
</body>
</html>