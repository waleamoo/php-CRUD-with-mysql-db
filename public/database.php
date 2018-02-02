<?php
// connect to the database 
$dsn = "mysql:host=localhost;dbname=product_manager";
$username = "root";
$password = "";

try{
	// try to connect to the database 
	$db = new PDO($dsn, $username, $password);
}catch (PDOException $ex){
	$error_message = $ex->getMessage();
	include('database_error.php');
	exit();
}
?>