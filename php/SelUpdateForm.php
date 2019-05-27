<?php
$Item=$_POST['item'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Item Seller</title>
	<link rel="stylesheet" type="text/css">
</head>
<body>
	<form method = "post" action="manager.php">
			<input type='hidden' name='item' value=<?php echo $Item; ?> >
			Price : <input type="text" name="price" id = "price" placeholder="LKR120000"> <br><br>
			Is item available :
			<br/>
			<select name="list" size = "1">
				<OPTION Value=1>Available</OPTION>
				<OPTION Value=0>Not Available</OPTION>
			</select>
			<br/>
			<input name = "seller_Update_item" type="Submit" value="go">
	</form>
</body>
</html>