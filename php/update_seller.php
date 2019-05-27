<?php require_once('initialize.php'); 
$db = Database::getInstance();
$connection = $db->getConnection(); 
$seller=$_SESSION['currentseller']; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Seller</title>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			font-family: Century Gothic;
		}

		header{
			background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)) ,url(../img/background2.jpg);
			height: 100vh;
			background-size: cover;
			background-position: center;	
			background-repeat: no-repeat;
		  	background-attachment: scroll;
		}

		.box{
			width: 300px;
			height: 600px;
			padding: 10px 50px 60px 50px;
			margin-left: 35%;
			margin-top: 50px;
			background:#191919;
			text-align: center;
			opacity: 0.9;
			position: absolute;
		}

		.data h1{
			color: white;
			text-transform: uppercase;
			font-weight: 500;
		}

		.box input[type="text"], .box input[type="email"]{
			border:0;
			background: none;
			display: block;
			margin: 8px auto;
			text-align: center;
			border: 2px solid #3498db;
			padding: 14px 10px;
			width: 280px;
			outline: none;
			color: white;
			border-radius: 24px;
			transition: 0.25s;
		}

		.data input[type="text"]:focus{
			border-color: #2ecc71;
		}

		.data input[type="submit"]{
			border:0;
			background: none;
			display: block;
			margin: 9px auto;
			text-align: center;
			border: 2px solid #2ecc71;
			padding: 10px 25px;
			outline: none;
			color: white;
			border-radius: 24px;
			transition: 0.25s;
			cursor: pointer;
		}

		.data input[type="submit"]:hover{
			background: #2ecc71;
		}
		.data h5{
			text-align: left;
			margin: 0;
			padding: 0;
			color: white;
		}
	</style>
</head>
<body>
	<header>
		<div class="wrapper">
			<?php 
			$query = "SELECT * FROM seller WHERE store_id=$seller->id";
			$result=mysqli_query($connection,$query);
			if($result){
				$row=mysqli_fetch_assoc($result);
				$companyName = $row['companyName'];
				$storeName = $row['store_name'];
				$phone = $row['telephone'];
				$mobile = $row['mobile'];
				$address = $row['store_address'];
			
			} ?>
			<div class="box">
				<form action="update_seller.php" method="post">
					<div class="data">
						<h1>Update Details</h1>
						<h5>Company Name</h5><input type="text" value="<?php echo $companyName ?>" required="" name="companyName" onclick='this.value=""'><br>
						<h5>Store Name</h5><input type="text" value="<?php echo $storeName ?>" required="" name="storeName" onclick='this.value=""'><br>
						<h5>Phone Number</h5><input type="text" value="<?php echo $phone ?>" name="phone" required="" onclick='this.value=""'><br>
						<h5>Mobile Number</h5><input type="text" value="<?php echo $mobile ?>" name="mobile" required="" onclick='this.value=""'><br>
						<h5>Address</h5><input type="text" value="<?php echo $address ?>" name="address" required="" onclick='this.value=""'><br>
						<input type="submit" value="Submit" name="submit">
					</div>
				</form>
			</div>
			<?php 

			if (isset($_POST['submit'])){
			$companyName=$_POST['companyName'];
			$storeName=$_POST['storeName'];
			$phone=$_POST['phone'];
			$mobile=$_POST['mobile'];
			$address=$_POST['address'];
			$is_Active=0;
			$query="UPDATE seller SET companyName='$companyName', store_name='$storeName', telephone='$phone' , mobile='$mobile' , website='$website' , store_address='$address' WHERE Store_id='$seller->id'";	
			$result=mysqli_query($connection,$query);
			if($result){
				echo "Data of The Store is added Successfully";
				header('Location: ../php/sellerAcc.php');
	   		 exit;
			}
			else{
				$error= "data adding failed" ."<br>". mysqli_error($connection);
			}
		}

			 ?>
		</div>
	</header>
</body>
</html>