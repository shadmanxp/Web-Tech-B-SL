<?php

require_once 'controller/productInfo.php';
$profit='0';
$valueToSearch='';

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    $products  = filterTable($valueToSearch);
    
}
 else {
    $products  = fetchAllProducts();
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search Product</title>
        <style>
            table, th, td ,tr {
            border: 2px solid ;
            border-collapse: collapse;
            padding: 2%
            
        }
        </style>
    </head>
    <body>
        
    <form action="searchProduct.php" method="post">
        <fieldset style="width: 80%;">
            <legend><b>SEARCH</b></legend>
            <input type="text" name="valueToSearch" placeholder="Value To Search" value=<?php echo $valueToSearch ?>>
            <input type="submit" name="search" value="Search by Name"><br><br>
            
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
         <footer><a href="displayAllProducts.php" ><b>Show All Product</b></a></td></footer>
        </form>
    </body>
</html>