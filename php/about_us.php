<?php require_once('initialize.php') ;
$db = Database::getInstance();
$connection = $db->getConnection();
?>

<!DOCTYPE html>
<html>
<head>
	<title>NOVUS CREATIONS</title>
	<link rel="stylesheet" type="text/css" href="../css/common_new.css">
</head>
<body>
	<header>
		<div class="main">
			<ul>
				<li><a href="sellerAcc.php">Home</a></li>
				<li><a href="services.php">Services</a></li>
				<li><a href="clients.php">Our Clients</a></li>
				<li><a href="contact_us.php">Contact us</a></li>
				<li class="active"><a href="#">About us</a></li>		
			</ul>
		</div>
		<div class="title">
			<h1>MyChoice.lk</h1>
		</div>
		<div class="box">
			<h1>About Us</h1>
			<h2><br>"We just compare,<br>Choice is yours."</h2>
			<p>Finding a new device ?<br><br>Hiring new sellers in the industry ?<br><br>Getting ahead in the field of new technological devices ?<br><br>It all starts right here! This is your gateway to the world of modern technological appliances; the best collection on the internet...!</p>
		</div>
	</header>

</body>
</html>
<?php mysqli_close($connection); ?>