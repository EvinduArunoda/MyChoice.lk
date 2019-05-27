<?php require_once('initialize.php');	
	$db = Database::getInstance();
    $connection = $db->getConnection();	?>

<?php 

	function display($row){
		echo "<div class='display_data'>";
			echo "<img src='../images/Sellers/".$row['logo']."' style='width: 150px; height: 150px;'><br>";
			echo $row['store_name']."<br>";
			echo "Telephone : ".$row['telephone']."<br>";
			echo "Mobile : ".$row['mobile']."<br>";
			echo $row['website']."<br><br>";
		echo "</div>";
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>NOVUS CREATIONS</title>
	<link rel="stylesheet" type="text/css" href="../css/clients.css">
</head>
<body>
	<header class="clearfix">
		<div class="main">
			<ul>
				<li><a href="sellerAcc.php">Home</a></li>
				<li><a href="services.php">Services</a></li>
				<li class="active"><a href="#">Our Clients</a></li>
				<li><a href="contact_us.php">Contact us</a></li>
				<li><a href="about_us.php">About us</a></li>		
			</ul>
		</div>
		<div class="title">
			<h1>MyChoice.lk</h1>
		</div>
	</header>
	<div class="display clearfix">
		<?php 
			$sql = "SELECT * FROM seller";
			$result = mysqli_query($connection, $sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck>0){
				while ($row = mysqli_fetch_assoc($result)) {
					display($row);
				}
			}
		?>
	</div>
</body>
</html>
<?php mysqli_close($connection); ?>