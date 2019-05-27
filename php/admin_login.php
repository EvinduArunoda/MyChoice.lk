<!DOCTYPE html>
<html">
<head>
	<meta charset="utf-8">
	<title>Admin_login</title>
	<link rel="stylesheet" href="../css/common_old.css">
</head>
<body>
	<header>
		<div class="main">
			<form class="box" action="manager.php" method="post">
				<h1>Welcome Admin</h1>
				<h3 style="color: white; font-weight: normal;">Please enter the password</h3><br>
				<input type="password" name="password" placeholder="Password" required="" id=""><br>
				<input type="submit" name="loginAdmin"value="Continue" ><br>
				<p>Not an Admin ? <a href="customer.php" style="color: #ff4d4d;"> Go Back</a></p>
			</form>
		</div>
	</header>
</body>
</html>