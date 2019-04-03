<?php require_once('../inc/Connection.php') ;?>

<!DOCTYPE html>
<html>
<head>
	<title>NOVUS CREATIONS</title>
	<link rel="stylesheet" type="text/css" href="../css/homepage.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<header class="clearfix">
		<div class="main">
			<ul>
				<li class="active"><a href="#">Home</a></li>
				<li><a href="services.php">Services</a></li>
				<li><a href="contact_us.php">Contact us</a></li>
				<li><a href="about_us.php">About us</a></li>		
			</ul>
		</div>
		<div class="title">
			<h1>MyChoice.lk</h1>
		</div>
		<div class="search_bar">
			<form method="get" action="homepage.php">
				<input type="search" name="search-box">
				<button type="Submit"></button>
			</form>
		</div>
	</header>
</body>
</html>
<?php mysqli_close($connection); ?>