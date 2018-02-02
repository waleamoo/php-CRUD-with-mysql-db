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
			<h2>Error</h2>
            <p><?php echo $error; ?></p>
		</div>
		
		<div id="footer">
			<p> &copy; <?php echo date("Y"); ?> Product Manager Application </p>
		</div>
	</div>
</body>
</html>
