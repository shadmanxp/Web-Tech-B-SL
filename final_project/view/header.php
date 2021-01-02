<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../mycss.css" crossorigin="anonymous">
	<script type="text/javascript" src="../bootstrap.bundle.js"></script>
	<script type="text/javascript" src="../loginscript.js"></script>
	<script type="text/javascript" src="../farmer1loginscript.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="stretchview">
	<div class="header">
		<div class="container-fluid">
			<div class="row ">
				<div class="col-sm-auto">
			     <img src="../images/logo5.png" onclick="homepageredirect('home')" alt="logo" width="60" height="60">
			    </div>
			    <div class="col-sm-auto">
			    	<h1 class="headerh1" onclick="homepageredirect('home')">FARM FOOD</h1>
			    </div>
			    <div class="col-sm">
			    </div>
			    <div class="col-sm-auto headerpadding">
			     	<form class="form-inline">
	    				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	    				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
 					 </form>
			    </div>
			    <div class="headerpadding headerdropdown col-sm-auto">
				    <div class="btn-groups">
				     	<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REGISTER/SELL/LOGIN</button>
					     <div class="dropdown-menu">
						    <a class="dropdown-item " href="#">REGISTER</a>
						    <a class="dropdown-item " href="farmerregistrationpage.php">SELL</a>
						    <a class="dropdown-item " href="loginpage.php" >LOGIN</a>
					  	</div>
				    </div>
				</div>
				<div class="col-sm-auto headerpadding headerdisplaynone" onclick="loginbutton()">
			    	<button type="button" id="loginbutton" class="btn btn-success">
			    		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
						  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
						  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
						</svg>
			    	LOGIN</button>
			    </div>
			    <div class="col-sm-auto headerpadding headerdisplaynone">
			      	<button type="button" id="registerbutton" class="btn btn-success">
			      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-at" viewBox="0 0 16 16">
						  <path d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"/>
						</svg>
			      	REGISTER</button>
			    </div>
			    <div class="col-sm-auto headerpadding headerdisplaynone" onclick="sellbutton()">
			      	<button type="button" id="sellbutton" class="btn btn-success" >
			      		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
						  	<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
						</svg>
			      	SELL</button>
			    </div>
			</div>
	  	</div>
	</div>
</body>
</html>