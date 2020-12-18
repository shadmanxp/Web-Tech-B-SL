<?php 
	
	session_start();
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body class="stretchview">
</body>
	<?php if (isset($_SESSION["id"])) { header("location: loggedpage.php");} ?>
	<?php include("header.php")?>
	<div class="divider"><p>Fresh farm food at your doorstep</p></div>
	<div class="container-fluid bodytrim">
		<div class="row bodytrim">
			<div class="col-md-auto bodytrim hidelargenav">
			    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			      <a class="nav-link  active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
			      <a class="nav-link " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">FRUITS AND VEGETABLES</a>
			      <a class="nav-link " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">MEAT AND FISH</a>
			      <a class="nav-link " id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">SPICE AND GRAINS</a>
			    </div>
			</div>
			<div class="col-sm-auto hidesmallnav" >
			    <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			      <a class="nav-link  active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
			      <a class="nav-link " id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">FRUITS AND VEGETABLES</a>
			      <a class="nav-link " id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">MEAT AND FISH</a>
			      <a class="nav-link " id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">SPICE AND GRAINS</a>
			    </div>
			</div>
			<div class="col-sm" >
				<div class="tab-content" id="v-pills-tabContent">
				    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
				    	<div class="row">
				    		<div class="col-sm-auto ">
					    		<div id="carouselExampleFade " class="carousel slide carousel-fade " data-ride="carousel">
			  						<div class="carousel-inner shadow-lg mb-5 bg-white rounded ">
				    					<div class="carousel-item active" data-interval="1800">
				      						<img src="images/fruitsandvegetables.jpg" class="d-block w-100" width="200" height="" alt="fruitsandvegetables.jpg">
				    					</div>
				    					<div class="carousel-item" data-interval="1800">
									     	<img src="images/meatandfish.jpg" class="d-block w-100" width="200" height="" alt="meatandfish.jpg">
									    </div>
				    					<div class="carousel-item" data-interval="1800">
									        <img src="images/spiceandgrains.jpeg" class="d-block w-100" width="200" height="" alt="spiceandgrains.jpeg">
									    </div>
			  						</div>
									<a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
				    		</div>
				    	</div>
				    </div>
				    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"></div>
				    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
				    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
			    </div>   
			</div>
		</div>
	</div>
	<?php include("footer.php")?>
</body>
</html>