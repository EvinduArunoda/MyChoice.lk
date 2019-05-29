<?php require_once('initialize.php'); 
$db = Database::getInstance();
$connection = $db->getConnection(); ?>

<?php 
	$msg="";
	if(isset($_POST['upload'])){
		$image = $_FILES['image']['name'];
		$last_id=$_GET['store_id'];
		$sql = "UPDATE seller SET logo='$image' WHERE store_id='$last_id' ";
		$result = mysqli_query($connection,$sql);
		if($result){
			if(move_uploaded_file($_FILES['image']['tmp_name'], "../images/Sellers/".basename($_FILES['image']['name']))){
				$msg= "Uploaded successfully.";
				header("Location:../php/login.php");
			}
			else{
				$msg= "Not uploaded.";
			}
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../css/add_logo.css">
	<title></title>
</head>
<body>
	<header>
		<div class="main" id="content">
			<form class="box" method="post" action="add_logo.php" enctype="multipart/form-data">
				<h3 style="color:red;"> <?php echo($msg) ?> </h3>
				<h1>Add Logo</h1>
				<br><input type="hidden" name="size" value="1000000">
				<input type="file" name="image" required="">
				<br><input type="submit" name="upload" value="Upload Logo">
			</form>
		</div>
	</header>
</body>
</html>