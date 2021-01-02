<?php

	require_once '../controller/farmer1functions.php';
	$id=$_GET['id'];
	$user=fetch_userid($id);

	echo "<div class='text-center'>";
		echo "<h1 class='display-1'>";
		echo "Welcome <br>". $user['first_name'] ." ". $user['last_name'] ; 
		echo "</h1>";
	echo"</div>";


?>