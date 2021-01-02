<?php

require_once '../farmer1model.php';

function register_farmer($data)
{
	insertdata($data);
}
function update_farmer($data)
{
	updatedata($data);
}
function fetch_username($username)
{
	return getusername($username);
}
function fetch_userid($id)
{
	return getuserid($id);
}
function update_password($data)
{
	updatepassword($data);
}



?>