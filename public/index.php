<?php
// require the database connection 
require_once('database.php');

//1. get the categoryID for products
if(!isset($category_id)){
	@$category_id = $_GET["category_id"];
	if(!isset($category_id)){
		$category_id = 1;
	}
}

//2. get the name for the current categoryID (to display on top of the table)
$query = "SELECT * FROM categories WHERE categoryID = $category_id";
$category = $db->query($query);
$category = $category->fetch();        // will return only one result set or one row 
$category_name = $category["categoryName"];   // gives us a category name 

//3. Get all categories (to display in the side bar)
$query = "SELECT * FROM categories ORDER BY categoryID";
$categories = $db->query($query);      // here we will use a foreach loop to get more than one result set 

//4. get products for selected category
$query = "SELECT * FROM products WHERE categoryID = $category_id ORDER BY productID";
$products = $db->query($query);      // here we will use a foreach loop to return all product from the database

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
			<!--displays the list of categories -->
			<h2> List of Categories </h2>
			<ul class="nav">
			<?php foreach ($categories as $category){?> 
				<li>
                <a href="?category_id=<?php echo $category['categoryID']; ?>">   <!--We echo the categoryID and categoryName -->
                    <?php echo $category['categoryName']; ?>
                </a>
                </li>
			<?php } ?>
		
			</ul>
		</div>
			
		<div id="main">
			<p><?php echo $category_name; ?></p>
			
			<!--Display result set for products in a table -->
			<table>
				<tr><th>Code</th><th>Name</th><th>Price</th><th>&nbsp;</th><th>&nbsp;</th></tr>
				
				
				<?php foreach($products as $product) {?>
					<tr>
						<td><?php echo $product["productCode"]; ?></td>
						<td><?php echo $product["productName"]; ?></td>
						<td><?php echo 'R'.$product["listPrice"]; ?></td>
						<td>
							<form action="delete_product.php" method="post" id="" onSubmit="return confirm('Are you sure you to perform this action?');"> <!--With a javascript confirm -->
								<input type="hidden" name="product_id" value="<?php echo $product["productID"]; ?>" />
								<input type="hidden" name="category_id" value="<?php echo $product["categoryID"]; ?>" />
								<input type="submit" value="Delete"/>
							</form>
						</td>
						<td>
							<form action="update_product_form.php" method="post" id="">
								<input type="hidden" name="product_id" value="<?php echo $product["productID"]; ?>" />
								<!--<input type="hidden" name="category_id" value="<?php // echo $product["categoryID"]; ?>" /> -->
								<input type="submit" value="Update"/>
							</form>
						</td>
					</tr>
				
				
				<?php } ?>
			
			</table>
			
			<!--<a href="">Add a product</a> -->
			
			<br>
			
			<form action="add_product_form.php" method="post">
				<input type="submit" value="Add a product" />
			</form>
		
		</div>
		
		<div id="footer">
			<p> &copy; <?php echo date("Y"); ?> Product Manager Application </p>
		</div>
	</div>
</body>
</html>