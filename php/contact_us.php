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
				<li><a href="seller_acc.php">Home</a></li>
				<li><a href="services.php">Services</a></li>
				<li><a href="clients.php">Our Clients</a></li>
				<li class="active"><a href="#">Contact us</a></li>
				<li><a href="about_us.php">About us</a></li>		
			</ul>
		</div>
		<div class="title">
			<h1>MyChoice.lk</h1>
		</div>
		<div class="box" style="width: 400px; left: 32.5%;">
			<h1>Contact Us</h1>
			<p><br>Contact <a href="homepage.php">MyChoice.lk</a> for customization requests, pre-sales queries, payment (including refund requests) and account related issues ONLY – Unless we’ve specifically requested contact by email.<br><br>Email: <a href="www.contactmychoicelk@gmail.com">contactmychoicelk@gmail.com</a><br>Phone: +94112222356</p>
			<p>For support, please contact <a href="homepage.php">MyChoice.lk</a> customer support section. All product support related emails for the above email address will be denied. <br>Thank you!<br><br><a href="homepage.php">MyChoice.lk</a> customer support section:<br><br>Email: <a href="www.supportfrommychoicelk@gmail.com">supportfrommychoicelk@gmail.com</a><br>Phone: +94112255662</p>
		</div>
	</header>

</body>
</html>
<?php mysqli_close($connection); ?>