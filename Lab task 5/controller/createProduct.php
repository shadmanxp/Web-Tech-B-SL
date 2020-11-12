<?php  
require_once '../model.php';


if (isset($_POST['createProduct'])) {
	$data['name'] = $_POST['name'];
	$data['buying_price'] = $_POST['buying_price'];
	$data['selling_price'] = $_POST['selling_price'];
	if(isset($_POST['display']))
	{$data['display'] = $_POST['display'];}
	else{$data['display'] = '0';}

  if (createProduct($data)) {
  	echo 'Successfully added!!';
  	 header('Location: ../addProduct.php');
  }
} else {
	echo 'You are not allowed to access this page.';
}

?>