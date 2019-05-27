<?php require_once('initialize.php');
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
				<li class="active"><a href="#">Services</a></li>
				<li><a href="clients.php">Our Clients</a></li>
				<li><a href="contact_us.php">Contact us</a></li>
				<li><a href="about_us.php">About us</a></li>		
			</ul>
		</div>
		<div class="title">
			<h1>MyChoice.lk</h1>
		</div>
		<div class="box" style="left: 2%; top: 28%; height: 250px;">
			<h2>1)A secure online environment for global trade</h2>
			<p>Trade Assurance applies a credit-rating system that incentivizes suppliers to produce and deliver high-quality goods on time and according to the buyers' specifications.</p>
		</div>
		<div class="box" style="height: 350px; top: 20%; left: 36%;">
			<h1>Services</h1>
			<h2><br>2)Faster responses from suppliers when verified</h2>
			<p>Get noticed quickly by suppliers. Higher chance of getting better and faster responses. Buyers who are verified enjoy more promotional events, held jointly with <a href="homepage.php">MyChoice.lk</a>'s partners.</p>
		</div>
		<div class="box" style="left: 70%; top: 28%; height: 250px;">
			<h2>3)Tell suppliers what you need and Value-added Services</h2>
			<p>The more specific your information, the more accurately we can match your request to the right suppliers.</p>
		</div>
	</header>
</body>
</html>
<?php mysqli_close($connection); ?>