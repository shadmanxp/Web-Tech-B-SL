<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
</head>
<body>

 <form action="controller/createProduct.php" method="POST" enctype="multipart/form-data">

  <fieldset style="width: 80%;">
    <legend><b>ADD PRODUCTS</b></legend>
    <label for="name">Name</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="buying_price">Buying Price</label><br>
    <input type="text" id="buying_price" name="buying_price"><br>
    <label for="selling_price">Selling price</label><br>
    <input type="text" id="selling_price" name="selling_price"><br>
    <hr>
    <input type="checkbox" id="display" name="display" value="1" >
    <label for="display">Display</label><br>
    <hr>
    <input type="submit" name = "createProduct" value="Save">

  </fieldset>
  <footer><a href="displayAllProducts.php" ><b>Show All Product</b></a></td></footer>
</form> 

</body>
</html>
