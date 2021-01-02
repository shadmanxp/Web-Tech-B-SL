<?php 

require_once '../adminmodel.php';

function test_input($data) {
	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
}
function add_user($data)
{
	insertdata($data);
}
function fetch_user_byusername($username)
{
	return fetchuserbyusername($username);
}
function fetch_user($id)
{
	return fetchuser($id);
}
function fetch_user_bytype($type)
{
	return fetchbytype($type);
}
function edit_user($data)
{
	alterdata($data);
}
function fetch_orders($info)
{
	return fetchorders($info);
}
function update_password($data)
{
	updatepassword($data);
}
function addeduseralert()
{
	echo "<script>alert('User Added!');</script>";

}
function updateuseralert()
{
	echo "<script>alert('User updated!');</script>";
	
}
function passwordupdatealert()
{
	echo "<script>alert('Password updated!');</script>";
	
}
?>