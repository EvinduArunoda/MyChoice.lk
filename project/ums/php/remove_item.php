<?php require_once('../inc/Connection.php');
	$db = Database::getInstance();
    $connection = $db->getConnection(); ?>

<?php 
	$msg="";
	$itemName="";
	if (isset($_POST['submit'])){
		$itemName=$_POST['item_name'];
		$item_id="SELECT Item_id FROM item WHERE Item_name='$itemName' ";
		$result1=mysqli_query($connection,$item_id);
		$row=mysqli_fetch_assoc($result1);
		$itemId=$row['Item_id'];
		$thisStore_id=$_SESSION['Store_id'];
		$query1=("SELECT * FROM availabilitycheck WHERE Store_id=$thisStore_id AND Item_id='$itemId'");
		$result1=mysqli_query($connection,$query1);
		if ($result1){
			$numOfRows=mysqli_num_rows($result1);
			if($numOfRows==0) {
      			$msg= "Item not found";
			} else {
				if(mysqli_fetch_assoc($result1)['Delete_request']==1){
					$msg="Item has been already removed";
				}else{
    			$query2=" UPDATE availabilitycheck SET Delete_request=1,Availability=0 WHERE Store_id=$thisStore_id AND Item_id=$itemId ";
				$result2=mysqli_query($connection,$query2);
				if($result2){
					$msg="The item will be permanently removed soon";
				}else{
					$msg= "Removing Failed,Please re-check entered details ";
				}
				}
			}
		}else{
			$msg= "Removing Failed";
		}

		
		
	}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>login</title>
	<link rel="stylesheet" href="../css/style_removeItem.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="main">
			<form class="box" action="remove_item.php" method="post">
				<h3 style="color:red;"><?php echo($msg) ?></h3>
				<h1>ENTER ITEM NAME</h1>
				<br><input type="text" name="item_name" placeholder="Serial code" value="<?php echo($itemName) ?>"required="" id=""><br>
				<input type="submit" name="submit"value="Submit Details" ><br>
				<p>Do you want to exit ? <a href="seller_acc.php">Click Here</a></p>
			</form>
		</div>
	</header>
</body>
</html>
