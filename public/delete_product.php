<?php
//1. get the hidden IDs for product and category (these IDs are gotten using the name property of the hidden form fields)
@$product_id = $_POST["product_id"];
@$category_id = $_POST["category_id"];

//2. delete the product from the database 

require_once('database.php');
$query = "DELETE FROM products WHERE productID = '$product_id'";
$db->exec($query);

//3. Display the index page
include('index.php');

?>