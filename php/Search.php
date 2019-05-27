<?php

	$conn = mysqli_connect("localhost","root","","mychoice");

	if(mysqli_connect_error()){
		echo "Failed to Connect: ".mysqli_connect_error();
	}
	

?>

<!DOCTYPE html>
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
			<th>Store</th>
			<th>Current Price</th>
			<th>Contact number</th>
			<th>Address</th>
			<th>View Seller</th>
		</tr>

<?php

	$output = '';
	if(isset($_GET['q']) && !empty($_GET['q'])){
		$searchq = $_GET['q'];

		$q = mysqli_query($conn, "SELECT * FROM item WHERE model LIKE '%$searchq%'") or die(mysqli_error());
		$c = mysqli_num_rows($q);
		if($c == 0){
			$output = 'No search results for <b>"' . $searchq . '"</b>';
		} else {
			while($row = mysqli_fetch_array($q)){
				$Item_Id = $row['item_id'];
			}
			$q1 = mysqli_query($conn, "SELECT * FROM itemavailability WHERE item_id LIKE '%$Item_Id%'") or die(mysqli_error());
			while($row = mysqli_fetch_array($q1)){
				$availability = $row['availability'];
				$Store_ID = $row['store_id'];
				$Price = $row['price'];
				if($availability == 1){
				$q2 = mysqli_query($conn, "SELECT * FROM seller WHERE store_id LIKE '%$Store_ID%'") or die(mysqli_error());	
				while($row = mysqli_fetch_array($q2)){
					$Store_Name = $row['store_name'];
					$Contact_No = $row['telephone'];
					$Address = $row['store_address'];
				}
				$output = "available";

				
				echo "<tr>
				<form>
					<td>".$Store_Name."</td>
					<td>".$Price."</td>
					<td>".$Contact_No."</td>
					<td>".$Address ."</td>
					<td>" . '<a href="ViewSeller.php?var='.$Store_ID.'">'. "View" .'</a>' .  "</td>
				</form>
			</tr>";
	
				}
			}
			if($output == ''){
				$output = 'No stocks are available for <b>"' . $searchq  . '"</b>';}
			if($output == 'available'){
				$output = '';
			}
		}

	}else {
		header("loaction: ./");
	}
	
	mysqli_close($conn);
?>


	
 </table>

	<div class="result">
	<h2><?php echo $output  ?></h2>
	</div>

	<div class="search">
			<form action="./customer.php" method="get">
				<input type="submit" value="Back">
			</form>
	</div>
	
</body>
</html>