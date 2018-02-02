<?php
// require the database connection 
require_once('database.php');

//1. Get all categories from the database (to display in the drop down list)
$query = "SELECT * FROM categories ORDER BY categoryID";
$categories = $db->query($query);

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
			<p>Add Product Form</p>
			
			<form action="add_product.php" method="post">
			
				<p> Category: 
					<select name="category_id">
						<?php foreach($categories as $category){?>
							<option value="<?php echo $category["categoryID"]; ?>"><?php echo $category["categoryName"]; ?></option>
						<?php } ?>
					</select>
				
				</p>
				
				<p>Code: <input type="input" name="code" /></p>
				<p>Name: <input type="input" name="name" /></p>
				<p>List Price: <input type="input" name="price" /></p>
				
				
				<p><input type="submit" value="Add Product" /></p>
			</form>
			
			<p><a href="index.php">View Product List</a></p>
			
		</div>
		
		<div id="footer">
			<p> &copy; <?php echo date("Y"); ?> Product Manager Application </p>
		</div>
	</div>
</body>
</html>