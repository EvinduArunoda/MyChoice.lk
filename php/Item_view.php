<?php require_once('initialize.php') ;
$db = Database::getInstance();
$connection = $db->getConnection(); ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>NOVUS CREATIONS</title>
	<link rel="stylesheet" type="text/css" href="../css/seller_view.css"> 
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="main"> 
				<ul>
					<li class="active"><a href="#">Home</a></li>
					<li><a href="services.php">Services</a></li>
					<li><a href="clients.php">Our Clients</a></li>
					<li><a href="contact_us.php">Contact us</a></li>
					<li><a href="about_us.php">About us</a></li>		
				</ul>
			</div>
			<div class="title">
				<h1>MyChoice.lk</h1>
			</div>
		</header>
		<div class="rest">
			<div class="data">
				<div class="profile-data">					
					<?php 
					$color = '';
					$item_id = $_GET['var'];
					$query="SELECT * FROM item WHERE item_id='$item_id' ";
					$result=mysqli_query($connection,$query);
					while($row=mysqli_fetch_assoc($result)){
						$rating = $row['rating'];
						$category_id = $row['category_id'];
						$output = '<ul class="list-inline" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">'; 
						for($count=1; $count<=5; $count++){
							if($count <= $rating) { $color = 'color:#ffcc00;'; } else{ $color = 'color:#ccc;'; }
							$output.='<li class="rating" style="display:inline-block; cursor:pointer; '.$color.'font-size:16px;">&#9733;</li>';
						}
						$output.='</ul>';
						$qry = "SELECT * FROM category WHERE category_id='$category_id' ";
						$rslt=mysqli_query($connection,$qry);
						if ($rslt){
			      			$row2= mysqli_fetch_assoc($rslt);
			      			$category = $row2['category_name'];
						}
						echo "<div class='pic' id='img_dir'>";
							echo "<img src='../images/".$category."/".$row['logo']."'>";
						echo "</div>";
						echo "<div class='profile' style='text-align: left; padding-left: 20px; text-decoration: none;'>";
							echo "<h3>Name : " . $row['model'] . "<br>Display : " . $row['display'] ."<br>Colours : " . $row['colour'] .  "<br>Rating : " . $output . "</h3>";
						echo "</div>";
					} ?>
				</div>
				<div class="display-data">
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>