<?php 

require_once 'controller/productInfo.php';
$product = fetchProduct($_GET['id']);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
</head>
<body>

 <form action="controller/updateProduct.php" method="POST" enctype="multipart/form-data">
  <fieldset style="width: 80%;">
    <legend><b>ADD PRODUCTS</b></legend>
    <label for="name">Name</label><br>
    <input type="text" id="name" name="name" value="<?php echo $product['name']?>"><br>
    <label for="buying_price">Buying Price</label><br>
    <input type="text" id="buying_price" name="buying_price" value=<?php echo $product['buying price']?> ><br>
    <label for="selling_price">Selling price</label><br>
    <input type="text" id="selling_price" name="selling_price" value=<?php echo $product['selling price']?>><br>
    <hr>
    <input type="checkbox" id="display" name="display" value="1" <?php if ($product['display']=='1'):?> checked <?php endif ?>>
    <label for="display">Display</label><br>
    <hr>
    <input type="hidden" id="id" name="id" value=<?php echo $product['id']?> >
    <input type="submit" name = "updateProduct" value="Save"> 
  </fieldset>
</form> 

</body>
</html>
