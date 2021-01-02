<?php 

require_once 'dbConnection.php';

function insertdata($data)
{
	$conn = db_conn();
	$selectQuery = "INSERT INTO `farm_food_db`.`all_user` (`first_name`, `last_name`, `user_name`, `user_password`, `user_type`, `user_email`, `address`, `phone`, `ref`) VALUES (:firstname,:lastname,:username,:password,:type,:email,:address,:phone,:ref);";
	try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':firstname' => $data['firstname'],
        	':lastname' => $data['lastname'],
        	':username' => $data['username'],
        	':password' => $data['password'],
        	':type' => $data['type'],
        	':email' => $data['email'],
        	':address'=> $data['address'],
            ':phone'=> $data['phone'],
            ':ref'=> $data['ref']
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

//INSERT INTO `farm_food_db`.`all_user` (`first_name`, `last_name`, `user_name`, `user_password`, `user_type`, `user_email`, `address`, `phone`, `ref`, `created_at`) VALUES ('shadman', 'latif', 'shadmanxp', 'sdas', 'adsd', 'asdsa', 'asdsa', 'asdsa', 'asdsa', 'asdsa', '');
function fetchuser($id)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `farm_food_db`.`all_user` where user_id = ?";
     try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;

    if(!$row)
        {$data['user_id']='0'; return $data;}
    else
        {return $row;}
}
function fetchuserbyusername($username)
{
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `farm_food_db`.`all_user` where user_name = ?";
     try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$username]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;

    if(!$row)
        {$data['user_id']='0'; return $data;}
    else
        {return $row;}
}
function fetchbytype($type)
{
    if($type=='allusers')
        {
            $selectQuery = "SELECT * FROM `farm_food_db`.`all_user`;";
            $conn = db_conn();
        try 
        {
            $stmt = $conn->prepare($selectQuery);
            $stmt->execute();
        }
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
        $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $conn = null;

        return $rows;
        }
    else
        {
            $selectQuery = "SELECT * FROM `farm_food_db`.`all_user` where user_type = ?";
            $conn = db_conn();
        try 
        {
            $stmt = $conn->prepare($selectQuery);
            $stmt->execute([$type]);
        }
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
        $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
        $conn = null;

        return $rows;
        }
}

function fetchorders($info)
{
    $conn = db_conn();
    if($info=='allorders')
    {
        $selectQuery = "SELECT orders.order_id, all_user.user_id, concat(all_user.first_name,' ',all_user.last_name) as full_name, all_user.phone, orders.order_date, shipping_info.shipping_address, shipping_info.billing_address, products_in_order.product_id, products.product_name, category.category_name, products.farmer_seller, products_in_order.quantity, products.price, products.price * products_in_order.quantity as sub_total, shipping_info.shipping_cost, products.price*products_in_order.quantity+shipping_info.shipping_cost as total, orders.order_status, shippers.shipper_name, shippers.contact_no FROM orders  INNER JOIN all_user ON orders.user_id=all_user.user_id  INNER JOIN products_in_order ON orders.order_id=products_in_order.order_id  INNER JOIN products ON products_in_order.product_id=products.product_id INNER JOIN category ON products.category_id=category.category_id INNER JOIN shipping_info ON shipping_info.order_id=orders.order_id INNER JOIN shippers ON shipping_info.shipper_id=shippers.shipper_id;";
    }
    else if($info=='processing')
    {
        $selectQuery = "SELECT orders.order_id, all_user.user_id, concat(all_user.first_name,' ',all_user.last_name) as full_name, all_user.phone, orders.order_date, shipping_info.shipping_address, shipping_info.billing_address, products_in_order.product_id, products.product_name, category.category_name, products.farmer_seller, products_in_order.quantity, products.price, products.price * products_in_order.quantity as sub_total, shipping_info.shipping_cost, products.price*products_in_order.quantity+shipping_info.shipping_cost as total, orders.order_status, shippers.shipper_name, shippers.contact_no FROM orders  INNER JOIN all_user ON orders.user_id=all_user.user_id  INNER JOIN products_in_order ON orders.order_id=products_in_order.order_id  INNER JOIN products ON products_in_order.product_id=products.product_id INNER JOIN category ON products.category_id=category.category_id INNER JOIN shipping_info ON shipping_info.order_id=orders.order_id INNER JOIN shippers ON shipping_info.shipper_id=shippers.shipper_id WHERE orders.order_status='processing'";
    }
    else if($info=='delivered')
    {
        $selectQuery = "SELECT orders.order_id, all_user.user_id, concat(all_user.first_name,' ',all_user.last_name) as full_name, all_user.phone, orders.order_date, shipping_info.shipping_address, shipping_info.billing_address, products_in_order.product_id, products.product_name, category.category_name, products.farmer_seller, products_in_order.quantity, products.price, products.price * products_in_order.quantity as sub_total, shipping_info.shipping_cost, products.price*products_in_order.quantity+shipping_info.shipping_cost as total, orders.order_status, shippers.shipper_name, shippers.contact_no FROM orders  INNER JOIN all_user ON orders.user_id=all_user.user_id  INNER JOIN products_in_order ON orders.order_id=products_in_order.order_id  INNER JOIN products ON products_in_order.product_id=products.product_id INNER JOIN category ON products.category_id=category.category_id INNER JOIN shipping_info ON shipping_info.order_id=orders.order_id INNER JOIN shippers ON shipping_info.shipper_id=shippers.shipper_id WHERE orders.order_status='delivered'";
    }
    $conn = db_conn();
    try 
    {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute();
    }
    catch (PDOException $e) 
    {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $conn = null;

    return $rows;
}
function alterdata($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE `farm_food_db`.`all_user` SET `first_name` = :firstname, `last_name` = :lastname, `user_name` = :username, `user_email` = :email, `address` = :address, `phone` = :phone WHERE (`user_id` = :id)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':id' => $data['id'],
            ':firstname' => $data['firstname'],
            ':lastname' => $data['lastname'],
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':address'=> $data['address'],
            ':phone' => $data['phone']

        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}
function updatepassword($data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE `farm_food_db`.`all_user` SET `user_password`=:password WHERE (`user_id`=:id);";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':id' => $data['id'],
            ':password' => $data['password'],
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}

?>