<?php

	require_once '../controller/farmer1functions.php';
	$id=$_GET['id'];
	$user=fetch_userid($id);

	//echo "<script type='text/javascript' src='../farmer1resize.js'></script>";
    echo"<form name='updateform' action='farmerpage.php' onsubmit='return  updatevalidation()' method='POST' enctype='multipart/form-data'>
    <div class='container-fluid registration-box'>
		<br>
			<div class='row text-center'><legend class='legend'>Customer ID: ".$user['user_id']."</legend></div>
			<div class='row'>
				<div class='col-sm'></div>
				<div id='registration-box' class='col-7 shadow p-3 mb-5 bg-white rounded registration-box' style='width: 100px'>
					<div class='col-12 mb-3'>
					    <label for='firstname' class='form-label'>First Name:</label>
					    <input type='text' class='form-control' name='firstname' value='".$user['first_name']."' id='firstname' readonly>
					    <div id='firstnameE' class='form-text error'>".$_GET['firstnameE']."</div>
					</div>
					<div class='col-12 mb-3'>
					    <label for='lastname' class='form-label'>Last Name:</label>
					    <input type='text' class='form-control' name='lastname' value='".$user['last_name']."' id='lastname' readonly>
					    <div id='lastnameE' class='form-text error'>".$_GET['lastnameE']."</div>

					</div>
					<div class='col-12 mb-3'>
					    <label for='username' class='form-label'>User Name:</label>
					    <input type='text' class='form-control' name='username' value='".$user['user_name']."' id='username' readonly>
					    <div id='usernameE' class='form-text error'>".$_GET['usernameE']."</div>
					</div>
					<div class='col-12 mb-3'>
					    <label for='email' class='form-label'>Email:</label>
					    <input type='text' class='form-control' name='email' value='".$user['user_email']."' id='email' readonly>
					    <div id='emailE' class='form-text error'>".$_GET['emailE']."</div>
					</div>
					<div class='col-12 mb-3'>
					    <label for='address' class='form-label'>Address:</label>
					    <input type='address' class='form-control' name='address' value='".$user['address']."' id='address' readonly>
					    <div id='addressE' class='form-text error'>".$_GET['addressE']."</div>
					</div>
					<div class='col-12 mb-3'>
					    <label for='phone' class='form-label'>Phone:</label>
					    <input type='text' class='form-control' name='phone' value='".$user['phone']."' id='phone' readonly>
					    <div id='phoneE' class='form-text error'>".$_GET['phoneE']."</div>
					</div>

					<div class='col-12 mb-3'>
					    <label for='previouspassword' class='form-label'>Previous Password:</label>
					    <input type='password' class='form-control' name='previouspassword' id='previouspassword' readonly>
					    <div id='previouspasswordE' class='form-text error'>".$_GET['previouspasswordE']."</div>
					</div>
					<div class='col-12 mb-3'>
					    <label for='password' class='form-label'>Password:</label>
					    <input type='password' class='form-control' name='password' id='password' readonly>
					    <div id='passwordE' class='form-text error'>".$_GET['passwordE']."</div>
					</div>
					<div class='col-12 mb-3'>
					    <label for='repeatpassword' class='form-label'>Repeat Password:</label>
					    <input type='password' class='form-control' name='repeatpassword' id='repeatpassword' readonly>
					    <div id='repeatpasswordE' class='form-text error'>".$_GET['repeatpasswordE']."</div>
					</div>
					<div class='col-12 mb-3'>
					    <label for='creationdate' class='form-label'>Created At:</label>
					    <input type='text' class='form-control' name='creationdate' value='".$user['created_at']."'  id='creationdate' readonly>
					</div>
					<div class='text-center'>
					<button type='button'  name='farmeredit' id='farmeredit' class='btn btn-warning' onclick='farmereditbutton()'>Edit</button>
					<button type='submit'  name='farmerupdate'id='farmerupdate' class='btn btn-warning disabled'>Update</button>
					<button type='submit'  name='farmerchangepassword' id='farmerchangepassword' class='btn btn-warning disabled' onclick'return passwordchangevalidation()'>Change password</button>
					<button type='button'  name='farmerdelete'id='farmerdelete' class='btn btn-danger disabled' onclick='deletebutton(".$id.")'>Delete Account</button>
					</div>
				</div>
				<div class='col-sm'></div>	
			</div>
		</div>
		</form>
		";

?>