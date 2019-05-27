<?php require_once('initialize.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>Add an item</title>
	<link rel="stylesheet" href="../css/style_addItem.css">
</head>
<body>
	<header>
		<div class="main">
			<form class="box" action="manager.php" method="post">
				<h1>ADD YOUR NEW ITEM</h1>
				<br><input type="text" name="model" placeholder="model" value=""required="" id="">
				<br><input type="text" name="newModel" placeholder="new model" value="" id="">
				<br><input type="text" name="brand" placeholder="brand" value=""required="" id="">
				<p>
					<label>Select Category</label>
					<select name="category_name" id="categorylist">
						<option name='laptop' value="laptop">Laptop</option>
						<option name='mobile'value="mobile">Mobile</option>
						<option name='television'value="television">Television</option>
						<option name='tablet'value="tablet">Tablet</option>
					</select>					
				</p>

				<input type="text" name="price" placeholder="LKR.120000.00" value="" required="">


				<p>
					<label> Enter Availability</label>
						<select name="availability" id="mylist">
							<option value="YES">YES</option>
							<option value="NO">NO</option>
						</select>
				</p>

				<input type="submit" name="add_item"value="Submit Details" ><br>
				<p>Do you want to exit ? <a href="seller_acc.php">Click Here</a></p>
			</form>
		</div>
	</header>
</body>
</html>