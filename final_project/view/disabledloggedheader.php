<?php 
	
	require_once '../controller/adminfunctions.php';
	$src="";
	$user=fetch_user($_SESSION["id"]);
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="mycss.css" crossorigin="anonymous">
	<script type="text/javascript" src="../bootstrap.bundle.js"></script>
	<script type="text/javascript" src="../loggedscript.js"></script>
	<script type="text/javascript" src="../myxml.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="stretchview">
	<div class="header">
		<div class="container-fluid">
			<div class="row ">
				<div class="col-sm-auto">
					<img src="../images/logo5.png" <?php if (isset($_SESSION["id"])): ?>onclick="homepageredirect('logged')" <?php else: ?> onclick="homepageredirect('home')" <?php endif ?>  alt="logo" width="60" height="60">
				</div>
				<div class="col-sm-auto">
				    <h1 class="headerh1" <?php if (isset($_SESSION["id"])): ?>onclick="homepageredirect('logged')" <?php else: ?> onclick="homepageredirect('home')" <?php endif ?> >FARM FOOD</h1><small class="text-muted"> ADMIN MODE</small>
				</div>
				<div class="col-sm">
				</div>
				<div class="col-sm-auto headerpadding">
					<form class="form-inline">
			    		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" readonly>
			    		<button class="btn btn-outline-success my-2 my-sm-0 disabled" type="submit">Search</button>
		 			</form>
				</div>
				<div class="col-sm-auto headerpadding ">
				    <button type="button" id="profilebutton"  onclick="viewadminprofilediv()" class="btn btn-success disabled" >Logged in as <?php echo $user['first_name']?> </button>
				</div>
				<div class="col-sm-auto headerpadding ">
				    <button type="button" id="addadmin" onclick="viewaddadmindiv()" class="btn btn-success disabled" style="background-color:#0A6D27" >ADD ADMIN</button>
				</div>
				<div class="col-sm-auto headerpadding">
				    <button type="button" id="logoutbutton" class="btn btn-danger disabled">
				    	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
						  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
						  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
						</svg>
				    LOGOUT</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>