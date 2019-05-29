<?php require_once('initialize.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>Add an item</title>
	<link rel="stylesheet" href="../css/common.css">
</head>
<body>
	<header>
		<div class="box">
			<form class="main" action="manager.php" method="post">
				<h1>ADD NEW BRAND</h1>
				<br><input type="text" name="brand" placeholder="Brand Name" required="">
				<input type="submit" name="Enter_brand"value="Add Brand" ><br>
				<p>Do you want to exit ? <a href="admin_panel.php">Click Here</a></p>
			</form>
		</div>
	</header>
</body>
</html>