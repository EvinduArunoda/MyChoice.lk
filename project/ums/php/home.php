<?php require_once('../inc/Connection.php');
	$db = Database::getInstance();
    $connection = $db->getConnection();  ?>
<!DOCTYPE html>
<html>
<head>
	<title>MyChoice.lk</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="title">
			<h1>MyChoice.lk</h1>
		</div>
		<div class="button">
			<a class="btn" href="http://localhost/myPhp/project/ums/php/store_add.php">REGISTER</a>
			<a class="btn" href="http://localhost/myPhp/project/ums/php/login.php">LOG IN</a>
		</div>
	</header>
</body>
</html>