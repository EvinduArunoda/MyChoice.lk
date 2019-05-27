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
			<th>Category</th>
			<th>Model</th>
			<th>Brand</th>
			<th>Requested Seller</th>
			<th>Accept</th>
		</tr>
	
<?php 
	$query="SELECT *FROM item WHERE  item_isActive=0";
	$result=mysqli_query($connection,$query);
	if($result){
		while($row=mysqli_fetch_assoc($result)){
			$model=$row['model'];
			$item_id=$row['item_id'];
			$brand=$row['brand'];
			$category=$row['category_id'];
			$query1="SELECT *FROM category WHERE category_id='$category'";
			$result1=mysqli_query($connection,$query1);
			if($result1){
				$cat_name=$result[0]['item_name'];
			}
			$query2="SELECT * FROM itemavailability WHERE item_id=$item_id";
			$result2=mysqli_query($connection,$query2);
			if($result2){
				$seller_name=$result[0]['store_id'];
			}
			$price=$row['price'];
			if ($cat_name=="laptop"){
				$link="add_laptop_html.php";
			}elseif($cat_name=="mobile"){
				$link="add_mobile_html.php";
			}elseif($cat_name=="television"){
				$link="add_   television_html.php";
			}elseif($cat_name=="tablet"){
				$link="add_tablet_html.php";
			}
			echo "<tr><td>".$cat_name."</td><td>".$model."</td><td>".$brand."</td><td>".$seller_name."/td><td>" . '<a href=$link>'. "click here" .'</a>' .  "</td></tr>";
		}
		echo "</table>";
	}
 ?>
 </table>
</body>
</html>