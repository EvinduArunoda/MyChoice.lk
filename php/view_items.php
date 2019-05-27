<?php require_once('initialize.php'); ?>
<html>
<head>
	<title>Table</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style >
		table{
			border-collapse: collapse;
			width: 95%;
			color: #588c7e;
			font-family: monospace;
			font-size: 15px;
			text-align: left;
			margin: 2.5% 0 0 2.5%;
		}
		th{
			background-color: #3d3d29;
			color: white;
			padding: 1%;
		}tr{
			background-color: #f2f2f2;
		}
		td{
			height: 30px;
		}
	</style>
</head>
<body>
	<table>
		<tr>
			<th>Category</th>
			<th>Brand</th>
			<th>Model</th>
			<th style='text-align: center;'>Status</th>
			<th style='text-align: center;'>Edit</th>
			<th style='text-align: center;'>Remove</th>
		</tr>
	
<?php 
	$totitemlist=$_SESSION['totitemlist'];
	foreach ($totitemlist as $item){
		$itemid=$item['item_id'];
		$category=$item['category_name'];
		$brand=$item['brand_name'];
		$model=$item['model'];
		if ($item['item_isActive']==1){
			$isActive="active";
		}else{
			$isActive="Inactive";
		}
		echo "<tr>
		<form class=\"box\" action=\"manager.php\" method=\"post\">
			<input type='hidden' name='requestedseller' value=". $itemid . ">
			<input type='hidden' name='category_name' value=". $category . ">
			<input type='hidden' name='model' value=". $model . ">
			<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$category."</td>
			<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$brand."</td>
			<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$model."</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>".$isActive."</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>" . '<input type="submit" name="edit_this_item" value="Edit" >' .  "</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>" .  '<button name="remove_this_item" type="submit" value="'.$itemid .'" >Change State</button>'.  "</td>
			
			</form>
		</tr>";
}
	echo "</table>";
 ?>
 </table>
</body>
</html>