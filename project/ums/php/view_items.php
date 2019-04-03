<?php require_once('../inc/Connection.php');
	$db = Database::getInstance();
    $connection = $db->getConnection(); ?>
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
			<th>Item</th>
			<th>Current Price</th>
			<th>Availability</th>
		</tr>
	
<?php 
	$this_store_id=$_SESSION['Store_id'];
	$query="SELECT *FROM availabilitycheck WHERE Store_id='$this_store_id' AND Delete_request=0";
	$result=mysqli_query($connection,$query);
	if($result){
		while($row=mysqli_fetch_assoc($result)){
			if ($row['Availability']==1){
				$av="yes";
			}else{
				$av="no";
			}
			echo "<tr><td>".$row['Item_id']."</td><td>".$row['Price']."</td><td>".$av."</td></tr>";
		}
		echo "</table>";
	}
 ?>
 </table>
</body>
</html>