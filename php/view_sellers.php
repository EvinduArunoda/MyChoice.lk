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
			height: 40px;
		}
	</style>
</head>
<body>
	<table>
		<tr style="text-align: center;">
			<th style="width: 10%">Company</th>
			<th style="width: 10%">Store</th>
			<th style="width: 20%">Email</th>
			<th style="width: 20%">Address</th>
			<th style="width: 14%">Website</th>
			<th style="width: 8%">Telephone</th>
			<th style="width: 6%">Status</th>
			<th style="width: 5%">Edit</th>
			<th style="width: 7%">Remove</th>
		</tr>
	
<?php 
	$totsellerlist=$_SESSION['totsellerlist'];
	foreach ($totsellerlist as $seller){
		if($seller['seller_isActive']==1){
		$companyname=$seller['companyName'];
		$storename=$seller['store_name'];
		$sellerid=$seller['store_id'];
		if ($seller['seller_isActive']==1){
			$isActive="active";
		}else{
			$isActive="Inactive";
		}
		$address=$seller['store_address'];
		$website=$seller['website'];
		$email=$seller['store_email'];
		$telephone=$seller['telephone'];
		echo "<tr>
		<form class=\"box\" action=\"manager.php\" method=\"post\">
			<input type='hidden' name='requestedseller' value=". $sellerid . ">
			<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$companyname."</td>
			<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$storename."</td>
			<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$email."</td>
			<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$address."</td>
			<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$website."</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>".$telephone."</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>".$isActive."</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>" . '<input type="submit" name="edit_this_seller" value="Edit" >' .  "</td>
			<td style='text-align: center; border: 1px solid #3d3d29;'>"  . '<button name="remove_this_seller" type="submit" value="'.$sellerid .'" >Remove</button>'. "</td>
			</form>
		</tr>";
}}
	echo "</table>";
 ?>
 </table>
</body>
</html>