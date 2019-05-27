<?php 

require_once('initialize.php');
if(isset($_SESSION['set'])){}
else{
	header("Location:customer.php");
}

$db = Database::getInstance();
$connection = $db->getConnection();


 ?>

<?php 
 	$folder = "";

	function display($row,$price,$folder){
		echo "<div class='item-column'>";
			echo "<div class='pict' id='img_dir'>";
				echo "<img src='../images/$folder/".$row['logo']."'>";
			echo "</div>";
			echo "<h4>" . $row['model'] . "</h4>";
			echo "<h5>Price : ".$price."</h5>";
		echo "</div>";
	}

	function find($connection,$Store_id,$folder,$id){
		$query1="SELECT * FROM itemavailability WHERE store_id='$Store_id' AND category_id=$id";
		$result1=mysqli_query($connection,$query1);
		$count = mysqli_num_rows($result1);
		if($count>0){
			echo "<h2>".$folder."</h2>";
			while($row1=mysqli_fetch_assoc($result1)){
				if($row1['isDeleted']==0){
					$item_id = $row1['item_id'];
					$query2="SELECT * FROM item WHERE item_id='$item_id' ";
					$result2=mysqli_query($connection,$query2);
					if ($result2){
						$numOfRows=mysqli_num_rows($result2);
						if($numOfRows>0) {
			      			$row2= mysqli_fetch_assoc($result2);
			      			display($row2,$row1['price'],$folder);
					    }
					}
				}
			}
		}
	}

  ?>

<!DOCTYPE html>
<html>
<head>
	<title>NOVUS CREATIONS</title>
	<link rel="stylesheet" type="text/css" href="../css/seller_acc.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script type="text/javascript">
  	function myFunction(){
  		var popup = document.getElementById("myPopup");
  		popup.classList.toggle("show");
  	}
  </script>
</head>
<body>
	<header class="clearfix">
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
			<div class="side-bar clearfix">
				<div class="category clearfix">
					<h4>Account</h4>
					<ul>		
						<li><a href="../php/sellerAcc.php">My Profile</a></li>
						<li><a href="SellerProducts.php">My Products</a></li>
					</ul>
				</div>
				<div class="category clearfix">
					<h4>Settings</h4>
					<ul>
						<li><a href="sellercatsel.php">Add Item</a></li>
						<li><a href="update_seller.php">Edit Profile</a></li>
						<li><a href="SellerEditItem.php">Edit Item</a></li>
						<li><a href="LogOutSeller.php">Log Out</a></li>
						<li><a href="#">Delete Account</a></li>
					</ul>
				</div>
			</div>
			<div class="data">
				<div class="profile-data">					
					<?php 

					$seller=$_SESSION['currentseller'];
					$Store_id = $seller->id;
					$query="SELECT * FROM seller WHERE store_id='$Store_id' ";
					$result=mysqli_query($connection,$query);
					while($row=mysqli_fetch_assoc($result)){
						echo "<div class='pic' id='img_dir'>";
							echo "<img src='../images/Sellers/".$row['logo']."'>";
						echo "</div>";
						echo "<div class='profile'>";
							echo "<h3>" . $row['store_name'] . "<br>" . $row['companyName'] . "</h3>";
						echo "</div>";
					} ?>
				</div>
				<div class="display-items">
					<div class="items">
						<?php find($connection,$Store_id,"Mobile Phones",1); ?>
					</div>
					<div class="items clearfix">
						<?php find($connection,$Store_id,"Laptops",3); ?>
					</div>
					<div class="items clearfix">
						<?php find($connection,$Store_id,"Tablets",2); ?>
					</div> 
					<div class="items clearfix">
						<?php find($connection,$Store_id,"Televisions",4); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>