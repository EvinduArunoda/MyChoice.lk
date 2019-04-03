<?php require_once('../inc/Connection.php');
	$db = Database::getInstance();
    $connection = $db->getConnection();  ?>
<?php 
		$companyName="";
		$error="";
	if (isset($_POST['submit'])){
		$companyName=$_POST['companyName'];
		$storeName=$_POST['storeName'];
		$email=$_POST['email'];
		$regCode=$_POST['regCode'];
		$phone=$_POST['phone'];
		$mobile=$_POST['mobile'];
		$fax=$_POST['fax'];
		$website=$_POST['website'];
		$address=$_POST['address'];
		$description="NO";
		$is_Active=0;
		$query="INSERT INTO store(Company_name,Store_name,BusinessRegistrationNumber,Email,Telephone,Mobile,Website,Fax,PostalAddress,Description,Is_Active)VALUES ('{$companyName}','{$storeName}','{$regCode}','{$email}','{$phone}','{$mobile}','{$website}','{$fax}','{$address}','{$description}',{$is_Active})";	
		$result=mysqli_query($connection,$query);
		if($result){
				$_SESSION['Store_id']=mysqli_insert_id($connection);
				echo "Data of The Store is added Successfully";
				header('Location: signup.php');
   		 exit;
		}
		else{
		$error= "data adding failed" ."<br>". mysqli_error($connection);
		}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Store</title>
	<link rel="stylesheet" type="text/css" href="../css/store_add.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="title">
				<h2><?php echo($error) ?></h2>
				<h1>Add a New Store</h1>
			</div>
			<form class="data" action="store_add.php" method="post">
				<div class="basic_data">
					<h1>Basic Information</h1>
					<input type="text" placeholder="Company Name" required="" name="companyName" value="<?php echo($companyName) ?>"><br>
					<input type="text" placeholder="Store Name" required="" name="storeName"><br>
					<input type="email" placeholder="Email Address"required="" name="email"><br>
					<input type="text" placeholder="Registration Code" required="" name="regCode"><br>
					<textarea name="description" placeholder="Enter the Description..." form="usrform"></textarea>
				</div>
				<div class="contact_data">
					<h1>Contact Information</h1>
					<input type="text" placeholder="Phone Number" name="phone" required=""><br>
					<input type="text" placeholder="Mobile" name="mobile" required=""><br>
					<input type="text" placeholder="Fax" name="fax" required=""><br>
					<input type="text" placeholder="Website" name="website" required=""><br>
					<input type="text" placeholder="Postal Address" name="address" required=""><br>
					<input type="submit" value="Submit" name="submit">
				</div>
			</form>
		</header>
	</div>
</body>
</html>