<?php

// 1. get the information from the user
@$new_product_id = $_POST["product_id"];
@$new_category_id = $_POST["category_id"];
@$new_product_code = $_POST["product_code"];
@$new_product_name = $_POST["product_name"];
@$new_list_price = $_POST["list_price"];

// 2.validate the user entries
if(empty($new_category_id) || empty($new_product_code) || empty($new_product_name) || empty($new_list_price)){
	$error = "Invalid product data. Check all fields and try again.";
	include('error.php');
} else{
	// if valid, update in the database
	require_once('database.php');
	$query = "UPDATE `product_manager`.`products` SET `categoryID` = '$new_category_id', `productCode` = '$new_product_code', `productName` = '$new_product_name', `listPrice` = '$new_list_price' WHERE `products`.`productID` = '$new_product_id'";
	$result = $db->exec($query);
	
	if($result){
		echo "<script>alert('Information updated successfully in the database');</script>";
		header("Location: index.php");
	}else {
		echo "<script>alert('Error!');</script>";
		header("Location: update_product.php");
	}
	
}


?>