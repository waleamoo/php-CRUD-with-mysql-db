<?php
// 1. Get the product data
@$category_id = $_POST["category_id"];
@$code = $_POST["code"];
@$name = $_POST["name"];
@$price = $_POST["price"];


// 2. validate inputs 
if(empty($code) || empty($name) || empty($price)){
	$error = "Invalid product data. Check all fields and try again.";
	include('error.php');
}else {
	// if valid, add the product to the database
	require_once('database.php');
	$query = "INSERT INTO products (categoryID, productCode, productName, listPrice) VALUES ('$category_id', '$code', '$name', '$price')";
	$db->exec($query);
	
	// display the Product List Page
	include('index.php');
}



?>