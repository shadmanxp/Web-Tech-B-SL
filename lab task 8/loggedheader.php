<?php 
	
	require_once 'controller/functions.php';
	$src="";
	$user=fetch_user($_SESSION["id"]);
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="mycss.css" crossorigin="anonymous">
	<script type="text/javascript" src="bootstrap.bundle.js"></script>
	<script type="text/javascript" src="loggedscript.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="stretchview">
	<div class="header">
		<div class="container-fluid">
			<div class="row ">
				<div>
					<img src="images/logo5.png" <?php if (isset($_SESSION["id"])): ?>onclick="homepageredirect('logged')" <?php else: ?> onclick="homepageredirect('home')" <?php endif ?>  alt="logo" width="60" height="60">
				</div>
				<div class="col-sm-auto">
				    <h1 class="headerh1" <?php if (isset($_SESSION["id"])): ?>onclick="homepageredirect('logged')" <?php else: ?> onclick="homepageredirect('home')" <?php endif ?> >FARM FOOD</h1><small class="text-muted"> ADMIN MODE</small>
				</div>
				<div class="col-sm">
					
				</div>
				<div class="col-sm-auto headerpadding">
				<form class="form-inline">
		    		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		    		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	 			</form>
				</div>
				<div class="col-2-auto headerpadding ">
				    <button type="button" id="profilebutton" class="btn btn-success" >Logged in as <?php echo $user['firstname']?> </button>
				</div>
				<div class="col-2-auto headerpadding ">
				    <button type="button" id="addadmin" onclick="viewaddadmindiv()" class="btn btn-success" style="background-color:#0A6D27" >ADD ADMIN</button>
				</div>
				<div class="col-2-auto headerpadding ">
				    <button type="button" id="logoutbutton" class="btn btn-danger">LOGOUT</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="loggedscript.js"></script>
</body>
</html>