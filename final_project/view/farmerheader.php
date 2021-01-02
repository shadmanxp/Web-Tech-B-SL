<?php 
	
	require_once '../controller/farmer1functions.php';
	$user=fetch_userid($_SESSION["id"]);
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../mycss.css" crossorigin="anonymous">
	<script type="text/javascript" src="../loggedscript.js"></script>
	<script type="text/javascript" src="../farmer1xml.js"></script>
	<script type="text/javascript" src="../farmer1loginscript.js"></script>
	<script type="text/javascript" src="../bootstrap.bundle.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="stretchview">
	<div class="header">
		<div class="container-fluid">
			<div class="row ">
				<div class="col-sm-auto">
					<img src="../images/logo5.png" <?php if (isset($_SESSION["id"])): ?>onclick="homepageredirect('farmer')" <?php else: ?> onclick="homepageredirect('home')" <?php endif ?>  alt="logo" width="60" height="60">
				</div>
				<div class="col-sm-auto">
				    <h1 class="headerh1" <?php if (isset($_SESSION["id"])): ?>onclick="homepageredirect('farmer')" <?php else: ?> onclick="homepageredirect('home')" <?php endif ?> >FARM FOOD</h1><small class="text-muted"> SELLER </small>
				</div>
				<div class="col-sm">
				</div>
				<div class="col-sm-auto headerpadding ">
				    <button type="button" id="logoutbutton" class="btn btn-danger" onclick="logout()">
				    	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
						  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
						  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
						</svg>
				    LOGOUT</button>
				</div>
				<nav class="navbar  navbar-expand-lg navbar-dark bg-dark">
					 <div class="container-fluid">
					    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					      <span class="navbar-toggler-icon"></span>
					    </button>
					    <div class="collapse navbar-collapse" id="navbarNav">
						     <ul class="navbar-nav">
						        <li class="nav-item">
						          <a class="nav-link" aria-current="page" onclick="showwelcomeboard('<?php echo $user["user_id"] ?>')" >Home</a>
						        </li>
						        <li class="nav-item">
						          <a class="nav-link" onclick="viewfarmerprofile('<?php echo $user["user_id"] ?>','','','','','','','','','');">View profile</a>
						        </li>
						        <li class="nav-item">
						          <a class="nav-link" href="#">Products on sale</a>
						        </li>
						        <li class="nav-item">
						          <a class="nav-link" href="#">Add Products</a>
						        </li>
						        <li class="nav-item">
						          <a class="nav-link" href="#">Sales Report</a>
						        </li>
						    </ul>
					    </div>
					</div>
				</nav>



			</div>
		</div>
	</div>
</body>
</html>