<?php 

require_once 'dbConnection.php';


function createProduct($data){
	$conn = db_conn();
    $selectQuery = "INSERT INTO `product_db`.`products` (`name`, `buying price`, `selling price`, `display`) VALUES  (:name, :buying_price, :selling_price, :display)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':buying_price' => $data['buying_price'],
        	':selling_price' => $data['selling_price'],
        	':display' => $data['display'],
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function showAllProducts(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `product_db`.`products` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showProduct($id){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `product_db`.`products` WHERE `id` = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function updateProduct($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE `product_db`.`products` set `Name` = ?, `buying price` = ?, `selling price` = ?, `display`= ? WHERE `id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            $data['name'], $data['buying_price'],$data['selling_price'],$data['display'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteProduct($id){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `product_db`.`products` WHERE `id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}

function searchProduct($valueToSearch)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `product_db`.`products` WHERE (`Name`) LIKE '%".$valueToSearch."%'";
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

?>