<!DOCTYPE html>
<html>
<head>
	<title>Search - Home</title>
	<link rel="stylesheet" type="text/css" href="../css/search.css" >
	<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script>
	$(function(){
		$("#q").autocomplete({
			source: "autoItem.php", 
		});
	});	
	</script>
</head>
<body>
	<header>
		<div class="main">
			<ul>
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
				<h1>Search by Item</h1>
				<br><input type="text" name="q" id="q" placeholder="Type here...">
				<input type="submit" value="Search">
			</form>
		</div>
	</header>
</body>
</html>