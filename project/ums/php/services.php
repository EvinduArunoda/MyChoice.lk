<?php require_once('../inc/Connection.php') ;?>

<!DOCTYPE html>
<html>
<head>
	<title>NOVUS CREATIONS</title>
	<link rel="stylesheet" type="text/css" href="../css/services.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="main">
			<ul>
				<li><a href="seller_acc.php">Home</a></li>
				<li class="active"><a href="#">Services</a></li>
				<li><a href="clients.php">Our Clients</a></li>
				<li><a href="contact_us.php">Contact us</a></li>
				<li><a href="about_us.php">About us</a></li>		
			</ul>
		</div>
		<div class="title">
			<h1>MyChoice.lk</h1>
		</div>
		<div class="box">
			<div class="service_1">
				<h2>1)A secure online environment for global trade</h2>
				<p>Trade Assurance applies a credit-rating system that incentivizes suppliers to produce and deliver high-quality goods on time and according to the buyers' specifications.</p>
			</div>
			<div class="service_2">
				<h1>Services</h1>
				<h2><br>2)Faster responses from suppliers when verified</h2>
				<p>Get noticed quickly by suppliers. Higher chance of getting better and faster responses. Buyers who are verified enjoy more promotional events, held jointly with <a href="homepage.php">MyChoice.lk</a>'s partners.</p>
			</div>
			<div class="service_3">
				<h2>3)Tell suppliers what you need and Value-added Services</h2>
				<p>The more specific your information, the more accurately we can match your request to the right suppliers.</p>
			</div>
		</div>
	</header>
</body>
</html>
<?php mysqli_close($connection); ?>