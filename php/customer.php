<?php require_once('initialize.php') ;
$db = Database::getInstance();
$connection = $db->getConnection(); ?>

<?php 
	 
	$folder = "";

	function getdata($connection,$folder,$category_id){
		$query="SELECT * FROM item WHERE category_id=$category_id";
		$result=mysqli_query($connection,$query);
		$no_of_rows = mysqli_num_rows($result);
		if($no_of_rows>0){
			echo "<h2>$folder</h2>";
			while($row=mysqli_fetch_array($result)){
				$id = $row['item_id'];
				$qry = "SELECT MIN(price) AS lowest, MAX(price) AS highest FROM itemavailability WHERE item_id=$id";
				$res = mysqli_query($connection,$qry);
				if($res){
					if(mysqli_num_rows($res)>0){
						$r = mysqli_fetch_assoc($res);					
						display($row,$r,$folder);	
					}
				}
			}
		}
	}

	function display($row,$r,$folder){
		$color = '';
		$rating = $row['rating'];
		echo "<div class='item-column'>";
			echo '<a href="Item_view.php?var='.$row['item_id'].'">';
				echo "<div class='logo clearfix' id='img_dir'>";
					echo "<img src='../images/$folder/".$row['logo']."'>";
				echo "</div>";
			echo "</a>";
			echo "<h3>" . $row['model'] . "</h3>";
			$output = '<ul class="list-inline" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">'; 
			for($count=1; $count<=5; $count++){
				if($count <= $rating) { $color = 'color:#ffcc00;'; } else{ $color = 'color:#ccc;'; }
				$output.='<li class="rating" style="display:inline-block; cursor:pointer; '.$color.'font-size:16px;">&#9733;</li>';
			}
			$output.='</ul>';
			echo $output;
			echo "<h5>Min. Price : ".$r['lowest']."<br>Max. Price : ".$r['highest']."</h5>";
		echo "</div>";
	}

	function displayClient($row){
		echo "<div class='item-column'>";
			echo '<a href="seller_view.php?var='.$row['store_id'].'">';
				echo "<div class='logo clearfix' id='img_dir'>";
					echo "<img src='../images/Sellers/".$row['logo']."'>";
				echo "</div>";
			echo '</a>';
			echo "<h3>" . $row['store_name'] . "<br>Telephone : " . $row['telephone'] . "<br>Mobile : " . $row['mobile'] . "</h3>";
		echo "</div>";
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>MyChoice.lk</title>
	<link rel="stylesheet" type="text/css" href="../css/customer.css">
	<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</style>
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
	<div class="wrapper">
		<div class="top-bar clearfix">
			<ul>
				<li>Do you like to join with us..?<a href="home.php">Click Here</a></li>
				<li style="float: left; background: black; width: 10px; height: 10px; margin-top: 3px;"><a href="admin_login.php"></a></li>
			</ul>
		</div>
		<header class="clearfix">
			<div class="title">
				<h1>MyChoice.lk</h1>
			</div>
			<div class="main">
				<ul>
					<li><a href="services.php">Services</a></li>
					<li><a href="clients.php">Our Clients</a></li>
					<li><a href="contact_us.php">Contact us</a></li>
				</ul>
			</div>
			<div class="about">
				<h2><br>"We just compare,<br>Choice is yours."</h2>
				<p>Finding a new device ?<br><br>Hiring new sellers in the industry ?<br><br>Getting ahead in the field of new technological devices ?<br><br>It all starts right here! This is your gateway to the world of modern technological appliances; the best collection on the internet...!<br><br></p>
			</div>
		</header>
		<div class="search-bar">
			<div class="search">
				<form action="./Search.php" method="get">
					<input type="text" name="q" id ="q" dir="itr" placeholder="     Search">
					<input type="submit" value="     ">
				</form>
			</div>
			<div class="search-how">
				<form action="./Stratergy.php" method="get" >
					Choose your option:
					<button name="key" type="submit" value="1" style="width: 150px;">Search by Item</button>
					<button name="key" type="submit" value="2" style="width: 150px;">Search by Seller</button>
				</form>
			</div>
		</div>
		<div class="display-items">
			<div class="item">
				<?php
					getdata($connection,'Mobile_Phones',1);
				 ?>
			</div>
			<div class="item clearfix">
				<?php 
					getdata($connection,'Laptops',3);
				 ?>
			</div>
			<div class="item clearfix">
				<?php 
					getdata($connection,'Tablets',2);
				 ?>
			</div>
			<div class="item clearfix">
				<?php 
					getdata($connection,'Televisions',4);
				 ?>
			</div>
			<div class="item">
				<?php 
				$query="SELECT * FROM seller";
				$result=mysqli_query($connection,$query);
				$no_of_rows = mysqli_num_rows($result);
				if($no_of_rows>0){
					echo "<h2>Our Clients</h2>";
					while($row=mysqli_fetch_array($result)){
						displayClient($row);
					}
				} ?>
			</div>	
		</div>
		<div class="final">
			<h2>final line</h2>
		</div>
	</div>
</body>
</html>