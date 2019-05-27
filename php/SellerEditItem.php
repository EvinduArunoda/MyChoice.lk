<?php require_once('initialize.php'); ?>
<?php require_once('Connection.php'); 
 $db = Database::getInstance();
 $connection = $db->getConnection();?>
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
		.wrapper{
			background-color: #f5f5f0;
			padding: 5% 0 5% 5%;
		}

		table{
			border-collapse: collapse;
			width: 95%;
			background-color: #d6d6c2;
			color: #588c7e;
			font-family: monospace;
			font-size: 15px;
			text-align: left;
		}
		th{
			background-color: #3d3d29;
			color: white;
			padding: 1%;

		}
		tr{
			background-color: #f2f2f2;
		}
		td{
			height: 40px;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<table >
			<tr style="text-align: center;">
				<th style="width: 12%">Model</th>
				<th style="width: 14%">Price</th>
				<th style="width: 21%">Availability</th>
				<th style="width: 21%">Edit</th>
			</tr>
		
	<?php 
		$sellerID=$_SESSION['currentseller']->id;
//$item = $_GET['var'];

	$db = Database::getInstance();
	$conn = $db->getConnection(); 

	$q = mysqli_query($conn, "SELECT * FROM itemavailability WHERE store_id LIKE '%$sellerID%' ") ;
	
	while($row = mysqli_fetch_array($q)){
		$price = $row['price'];
		$availability =  $row['availability'];
		$item = $row['item_id'];
	
	$q1 = mysqli_query($conn, "SELECT * FROM item WHERE item_id LIKE '%$item%'") or die(mysqli_error());
	while($row = mysqli_fetch_array($q1)){
		$model = $row['model'];
	}
			echo "<tr style='border: 1px solid #3d3d29;'>
					<form class=\"box\" action=\"SelUpdateForm.php\" method=\"post\">
						<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$model."</td>
						<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$price."</td>
						<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$availability."</td>
						<td style='text-align: center;'>" . '<button name="item" type="submit" value="'.$item .'" >Edit</button>'.  "</td>
					</form>
				</tr>";
			}
		echo "</table>";
	 ?>
	 	</table>
	 </div>
</body>
</html>



