<?php

require_once 'dbConnection.php';

function insertdata($data)
{
	$conn = db_conn();
	$selectQuery = "INSERT INTO `farm_food_db`.`all_user` (`first_name`, `last_name`, `user_name`, `user_password`, `user_type`, `user_email`, `address`, `phone`) VALUES (:firstname,:lastname,:username,:password,:type,:email,:address,:phone);";
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
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
}
function updatedata($data)
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

function getusername($username)
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

function getuserid($id)
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

?>