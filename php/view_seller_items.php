<?php require_once('initialize.php'); ?>
<html>
<head>
	<title>Table</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style >
		table{
			border-collapse: collapse;
			width: 100%;
			color: #588c7e;
			font-family: monospace;
			font-size: 25px;
			text-align: left;
		}
		th{
			background-color: #588c7e;
			color: white;

		}
		tr:nth-child(even){
			background-color: #f2f2f2
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<th>Item</th>
			<th>Current Price</th>
			<th>Availability</th>
			<th>Edit item details</th>
			<th>Remove item</th>
		</tr>
	
<?php 
	$itemlist=$_SESSION['itemlist'];
	foreach ($itemlist as $item){
		$itemname=$item['model'];
		$price=$item['price'];
		$catname=$item['category_name'];
		$av=$item['availability'];
		if ($av==1){
			$av="Available";
		}else{
			$av="Unavailable";
		}
		$id=$item['item_id'];
		echo "<tr>
				<form class=\"box\" action=\"manager.php\" method=\"post\">
					<input type='hidden' name='item_id' value=". $id . ">
					<input type='hidden' name='model' value=". $itemname. ">
					<input type='hidden' name='category_name' value=". $catname. ">
					<td>".$itemname."</td>
					<td>".$price."</td>
					<td>".$av."</td>
					<td>" . '<input type="submit" name="edit" value="Edit" >' .  "</td>
					<td>" . '<input type="submit" name="remove_item"value="Remove" >' .  "</td>
				</form>
			</tr>";
		}
	echo "</table>";
 ?>
 </table>
 <br><br>
 <br><form class="box" action="manager.php" method="post">
 	<input type='hidden' name='category_id' value='1'>
 	<input type='hidden' name='category_name' value='mobile'>
 	<input type="submit" name="new_item" value="Add new Mobile" >
 	</form>
   <br><form class="box" action="manager.php" method="post">
 	<input type='hidden' name='category_id' value='2'>
 	<input type="submit" name="new_item" value="Add new Tablet" >
 	</form>
 	 <br><form class="box" action="manager.php" method="post">
 	<input type='hidden' name='category_id' value='3'>
 	<input type="submit" name="new_item" value="Add new Laptop" >
 	</form>
 	 <br><form class="box" action="manager.php" method="post">
 	<input type='hidden' name='category_id' value='4'>
 	<input type="submit" name="new_item" value="Add new Television" >
 	</form>
</body>
</html>