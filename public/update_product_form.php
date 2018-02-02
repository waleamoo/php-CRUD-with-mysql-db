<?php
// 1. Get all IDs from the previous page
@$product_id = $_POST["product_id"];
// @$category_id = $_POST["category_id"];

// require the database connection 
include('database.php');

// 2.get the product from the database
$query = "SELECT * FROM products WHERE productID = '$product_id'";
$products = $db->query($query);
	

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Product Manager Application</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/styles.css" />
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>Product Manager Application </h1>
		</div>
		
		<div id="sidebar">
			
		</div>
			
		<div id="main">
			<p>Update product</p>
			
			<form action="update_product.php" method="post">
				<?php foreach($products as $product){?>
					<!--product is put in hidden form field instead of being "disabled"  -->
					<p>Product ID: <input type="hidden" name="product_id" value="<?php echo $product["productID"]; ?>" /></p> 
					
					<p>Category ID: <input type="text" name="category_id" value="<?php echo $product["categoryID"]; ?>" /></p> <!-- get the number of categories from the database -->
					
					<p>Product Code: <input type="text" name="product_code" value="<?php echo $product["productCode"]; ?>" /></p>
					
					<p>Product Name: <input type="text" name="product_name" value="<?php echo $product["productName"]; ?>" /></p>
					
					<p>List Price: <input type="text" name="list_price" value="<?php echo $product["listPrice"]; ?>" /></p>
					
					<p><input type="submit" value="Update" /></p>
					
				<?php } ?>
					
			</form>
			
			
		
		</div>
		
		<div id="footer">
			<p> &copy; <?php echo date("Y"); ?> Product Manager Application </p>
		</div>
	</div>
</body>
</html