<!DOCTYPE html>
<html>
<head>
	<title>Add Item Seller</title>
	<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script>
	$(function(){
		$("#item").autocomplete({
			source: "autoTabletfill.php", 
		});
	});	
	</script>
</head>
<body>
	<form method = "post" action="manager.php">	
			Item Model : <input type="text" name="item" id = "item"> <br><be>
			Price : <input type="text" name="price" id = "price" placeholder="LKR120000"> <br><br>
			Is item available :
			<br/>
			<select name="list" size = "1">
				<OPTION Value=1>Available</OPTION>
				<OPTION Value=0>Not Available</OPTION>
			</select>
			<br/>
			<input name = "seller_add_item" type="Submit" value="go">
	</form>
</body>
</html>