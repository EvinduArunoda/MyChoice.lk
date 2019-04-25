<!DOCTYPE html>
<html>
<head>
	<title>Search - Home</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<header>
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
		<div class="search">
			<form action="./Search.php" method="get">
				<input type="text" name="q" dir="itr">
				<input type="submit" value="go">
			</form>
		</div>
		<div>
			<select>
  				<option value="SearchBySeller">SearchBySeller</option>
  				<option value="SearchByItem" selected>SearchByItem</option>
			</select>
		</div>
	</header>
</body>
</html>