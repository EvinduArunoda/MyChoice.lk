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
				<th style="width: 12%">Company name</th>
				<th style="width: 14%">Store name</th>
				<th style="width: 21%">Address</th>
				<th style="width: 10%">Mobile</th>
				<th style="width: 21%">Email</th>
				<th style="width: 15%">Website</th>
				<th style="width: 7%">Accept</th>
			</tr>
		
	<?php 
		$sellerReqlist=$_SESSION['sellerReqlist'];
		foreach ($sellerReqlist as $seller){
			$sellerid=$seller['store_id'];
			$companyname=$seller['companyName'];
			$address=$seller['store_address'];
			$mobile=$seller['mobile'];
			$website=$seller['website'];
			$sellername=$seller['store_name'];
			$email=$seller['store_email'];
			$regno=$seller['registrationNumber'];
			echo "<tr style='border: 1px solid #3d3d29;'>
					<form class=\"box\" action=\"manager.php\" method=\"post\">
						<input type='hidden' name='newstore_id' value=". $sellerid . ">
						<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$companyname."</td>
						<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$sellername."</td>
						<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$address."</td>
						<td style='text-align: center;'>".$mobile."</td>
						<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$email."</td>
						<td style='border: 1px solid #3d3d29; padding:0.5%;'>".$website."</td>
						<td style='text-align: center;'>" . '<button name="addnewSeller" type="submit" value="'.$sellerid .'" >Accept</button>'.  "</td>
					</form>
				</tr>";
			}
		echo "</table>";
	 ?>
	 	</table>
	 </div>
</body>
</html>