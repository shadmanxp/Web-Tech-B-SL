<?php

	require_once '../dbConnection.php';
	$conn = db_conn();
	$selectQuery = "DELETE FROM `farm_food_db`.`all_user` WHERE (`user_id` = :id);";
	try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':id' => $_GET['id'],
        ]);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    $conn = null;
    return true;
    header("location: ../adminloggedpage.php");

?>