<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Product Manager Application</title>
	<link rel="stylesheet" type="text/css" href="stylesheets/styles.css" />
</head>
<body>
	<div id="container" style="height:400px;">
		<div id="header">
			<h1>Product Manager Application </h1>
		</div>
		
		<div id="content" style="padding:20px; height:200px;">
			
		<p>Sorry, there was an error in the connection to the database, Please check the connection parameters for validity</p>
		<p>The connection error is: <?php echo $error_message; ?></p>
		</div>
		
		<div id="footer">
			<p> &copy; <?php echo date("Y"); ?> Product Manager Application </p>
		</div>
	</div>
</body>
</html>
