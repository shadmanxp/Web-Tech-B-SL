<?php  
require_once 'controller/productInfo.php';

$products = fetchAllProducts();
$profit='0';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Display Products</title>
	<style>
		table, th, td, tr{
			border: 2px solid ;
			border-collapse: collapse;
			padding: 2%
			
		}
	</style>
</head>
<body>
<fieldset style="width: 80%;">
  <legend><b>DISPLAY</b></legend>
<table>
	<thead>
		<tr>
			<th><b>NAME</th>
			<th>PROFIT</th>
			<th colspan="2"></b></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($products as $i => $product): ?>
			<?php if ($product['display']==1): ?>
			<tr>
				<?php $profit=$product['selling price']-$product['buying price']?>
				<td><?php echo $product['name'] ?></td>
				<td><?php echo $profit?></td>
				<td><a href="editProduct.php?id=<?php echo $product['id']?>">edit</a></td>
				<td><a href="deleteProduct.php?id=<?php echo $product['id'] ?>">delete</a></td>
			</tr>
			<?php endif ?>
		<?php endforeach; ?>
		

	</tbody>
	

</table>
</fieldset>
<footer><a href="addProduct.php" ><b>Add Product</b></a> <b> | </b> <a href="searchProduct.php" ><b>Search Product</b></a></footer>

</body>
</html>