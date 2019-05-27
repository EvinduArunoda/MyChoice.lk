<?php require_once('../inc/Connection.php');
	$db = Database::getInstance();
    $connection = $db->getConnection(); ?>

<?php 
	$msg="";
	$itemName="";
	$itemCategory="";
	$price="";
	$isAvailable="";
	if (isset($_POST['submit'])){
		$itemName=$_POST['item_name'];
		$itemCategory=$_POST['categorylist'];
		$category_id="SELECT Category_id FROM category WHERE Category_name='$itemCategory' ";
		$result1=mysqli_query($connection,$category_id);
		$row=mysqli_fetch_assoc($result1);
		$catid=$row['Category_id'];
		$price=$_POST['price'];
		$last_id=$_SESSION['Store_id'];
		$is_Active=1;
		$isAvailable=$_POST['availability'];
		if (($isAvailable)=='YES'){
			$availability=1;
		}
		else{
			$availability=0;
		}
		$query1=("SELECT * FROM item WHERE Item_name='$itemName'");
		$result1=mysqli_query($connection,$query1);
		if ($result1){
			$numOfRows=mysqli_num_rows($result1);
			if($numOfRows>0) {
      			$it_id= mysqli_fetch_assoc($result1)['Item_id'];
			}
			else {
				$query="INSERT INTO item(Item_name,Category_id,Is_Active)VALUES ('{$itemName}',{$catid},{$is_Active})";
				$result=mysqli_query($connection,$query);
				if ($result){
					$it_id=mysqli_insert_id($connection);
				}
			}
			$query3=("SELECT * FROM availabilitycheck WHERE Store_id=$last_id AND Item_id='$it_id'");
			$result3=mysqli_query($connection,$query3);
			if ($result3){
				$numOfRows1=mysqli_num_rows($result3);
				if($numOfRows1>0 ) {
					if(mysqli_fetch_assoc($result1)['Availability']==0){
						$query2="UPDATE availabilitycheck SET availability='$availability' , Delete_request=0 , Price='{$price}' WHERE Store_id=$last_id AND Item_id='$it_id'";
						$result2=mysqli_query($connection,$query2);
						if($result2){
							$msg= "Adding Successful";
							header("Location:../php/seller_acc.php");
						}
						else{
							$msg= "Adding was unsuccessful";
						}
					}
					else {						
      					$msg= "Item already exists in your store";
					}
				} 
				else {
					$query2="INSERT INTO availabilitycheck(Store_id,Item_id,Availability,Price,Category_id)VALUES ({$last_id},{$it_id},{$availability},'{$price}','{$catid}')";
					$result2=mysqli_query($connection,$query2);
					if($result2){
						$msg= "Adding Successful";
						header("Location:../php/seller_acc.php");
					}else{
						$msg= "Adding was unsuccessful";
					}
				}
			}
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>Add an item</title>
	<link rel="stylesheet" href="../css/style_addItem.css">
</head>
<body>
	<header>
		<div class="main">
			<form class="box" action="add_item.php" method="post">
				<h3 style="color:red;"><?php echo($msg) ?></h3>
				<h1>ADD YOUR NEW ITEM</h1>
				<br><input type="text" name="item_name" placeholder="Serial code" value="<?php echo($itemName) ?>"required="" id="">

				<p>
					<label>Select Category</label>
					<select name="categorylist" id="categorylist">
						<option value="Laptop Computers">Laptop Computers</option>
						<option value="Mobile Phones">Mobile Phones</option>
						<option value="Tablets">Tablets</option>
						<option value="Pen drive">PEN DRIVE</option>
						<option value="Mouse">MOUSE</option>
						<option value="MP3 Player">MP3 PLAYER</option>
					</select>					
				</p>

				<input type="text" name="price" placeholder="LKR.120000.00" value="<?php echo($price) ?>" required="" id="">


				<p>
					<label> Enter Availability</label>
						<select name="availability" id="mylist">
							<option value="YES">YES</option>
							<option value="NO">NO</option>
						</select>
				</p>

				<input type="submit" name="submit"value="Submit Details" ><br>
				<p>Do you want to exit ? <a href="seller_acc.php">Click Here</a></p>
			</form>
		</div>
	</header>
</body>
</html>