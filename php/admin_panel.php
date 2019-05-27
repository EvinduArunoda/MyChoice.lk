<?php 
require_once('initialize.php');
if(isset($_SESSION['set'])){}
else{
	header("Location:admin_login.php");
}

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>NOVUS CREATIONS</title>
	<link rel="stylesheet" type="text/css" href="../css/admin_panel.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="title">
				<h1>MyChoice.lk</h1>
			</div>
		</header>
		<div class="rest">
			<div class="side-bar clearfix">
				<div class="category clearfix">
					<h4>Menu</h4>
					<ul>
						<li><a href="#">Add New Item</a></li>
						<li><a href="#">Add New category</a></li>
						<li><a href="view_itemRequests.php">Item Requests</a></li>
						<li><a href="view_sellerRequests.php">Seller Requests</a></li>
						<li><a href="view_items.php">Current Items</a></li>
						<li><a href="view_sellers.php">Current Sellers</a></li>
					</ul>
					<h4><ul>
						<li><a href="LogOutAdmin.php">Logout</a></li>
					</ul></h4>
				</div>
			</div>
			<div class="data">

			</div>
		</div>
	</div>
</body>
</html>