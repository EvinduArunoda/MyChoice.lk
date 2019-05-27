<?php 
	 require_once('DBController.php');
	 require_once('config.php');
	?>




<?php 
	class Utility{
		private $controller;

		public function __construct(){
			$this->controller= new DBController();
		}

		public function addSeller($email,$psw,$storeName,$regNo){
			$query="INSERT INTO seller (store_email,password,store_name,registrationNumber,seller_isActive)VALUES ('$email','$psw','$storeName','$regNo',1)";
			$result=$this->controller->insertQuery($query);
			if($result){
				return true;
			}else{
				return false;
			}
		}
		//get all seller details by token
		public function getBasicInfoByToken($token){
			$query="SELECT * FROM seller WHERE token='$token'";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}

		public function getBasicInfoByEmail($email){
			$query="SELECT * FROM seller WHERE store_email='$email'";
			$result=$this->controller->runQuery($query);
			if($result){
				return $result;
			}else{
				return null;
			}
		}
		//when logging in 
		public function compareLoginDetails($email,$psw){
			$query="SELECT * FROM seller WHERE store_email='$email' AND password='$psw' AND seller_isActive=1";
			$result=$this->controller->numRows($query);

			return $result;
		}
		//add new item to item table and the itemavailability table
		public function addnewItem($model,$brand,$price,$availability,$sellerid){
			$query="SELECT * FROM brand WHERE brand_name='$brand'";
			$result=$this->controller->runQuery($query);
			if($result){
				$category_id=$result[0]['category_id'];
				$brand_id=$result[0]['brand_id'];
			$query1="INSERT INTO item(category_id,model,brand_id,item_isActive)VALUES ('$category_id','$model','$brand_id',0)";
			$result1=$this->controller->insertQuery($query1);
			$itemid=$result1;
			$query3="INSERT INTO itemavailability (store_id,item_id,availability,price,isDeleted) VALUES('$sellerid','$itemid','$availability','$price',1)";
			$result3=$this->controller->insertQuery($query3);
			return $result3;
		}
		}
		////////////////////////////////////////add new entry to itemAvailability table when item exists already in the item table
		public function addItemtoSeller($item_id,$category_id,$price,$availability,$sellerid){
			
			$query2="INSERT INTO itemavailability (category_id,store_id,item_id,availability,price,isDeleted) VALUES('$category_id','$sellerid','$item_id','$availability','$price',0)";
			$result2=$this->controller->insertQuery($query2);
			if ($result2!=0){
				echo "done";
			}
			return $result2;
		}
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function getBasicFeaturesOfItem($model){
			$query="SELECT * FROM seller WHERE model='$model'";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function getCategoryByName($catname){
			$query="SELECT * FROM category WHERE category_name='$catname'";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function getCategoryById($catid){
			$query="SELECT * FROM category WHERE category_id='$catid'";
			$result=$this->controller->runQuery($query);
			return $result;
		}
		
		public function getSellersItemList($sellerid){
			$query="SELECT * FROM item INNER JOIN itemavailability ON item.item_id = itemavailability.item_id WHERE store_id='$sellerid'";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function loadMobileBrands($cat){

			$query="SELECT * FROM brand WHERE category_id='$cat'";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function loaditems($brand_id){
			$query1="SELECT * FROM item WHERE brand_id='$brand_id' and item_isActive=1";
			$result1=$this->controller->runQuery($query1);
			if ($result1){
				return $result1;
			}else{
				return false;
			}
		}

		public function checkAdminPsw($password){
			if ($password=="password123"){
				return true;
			}else{
				return false;
			}
		}

		public function getsellerRequestsList(){
			$query="SELECT * FROM seller WHERE seller_isActive=0";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function getitemRequestsList(){
			$query="SELECT * FROM item INNER JOIN itemavailability ON item.item_id = itemavailability.item_id INNER JOIN seller ON itemavailability.store_id=seller.store_id WHERE item_isActive=0";
			$result=$this->controller->runQuery($query);
			return $result;
		}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function addNewSeller($newstore_id){
		//	$query="UPDATE seller_isActive=1 FROM seller WHERE store_id=$newstore_id ";
			$query = "UPDATE seller SET seller_isActive = 1 WHERE  store_id=$newstore_id";
			$result=$this->controller->updateQuery($query);
			if ($result){
				return $result;
			}else{
				return false;
			}
		}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function RemoveSeller($newstore_id){
		//	$query="UPDATE seller_isActive=1 FROM seller WHERE store_id=$newstore_id ";
			$query = "UPDATE seller SET seller_isActive = 0 WHERE  store_id=$newstore_id";
			$result=$this->controller->updateQuery($query);
			if ($result){
				return $result;
			}else{
				return false;
			}
		}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function RemoveItem($item_id){
		//	$query="UPDATE seller_isActive=1 FROM seller WHERE store_id=$newstore_id ";
			$query = "UPDATE item SET item_isActive = 0 WHERE  item_id=$item_id AND item_isActive = 1" ;
			$query = "UPDATE item SET item_isActive = 1 WHERE  item_id=$item_id AND item_isActive = 0" ;
			$result=$this->controller->updateQuery($query);
			if ($result){
				return $result;
			}else{
				return false;
			}
		}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		public function SellerUpdateItem($sellerid,$item,$price,$availability){
		//	$query="UPDATE seller_isActive=1 FROM seller WHERE store_id=$newstore_id ";
			$query = "UPDATE itemavailability SET availability = '$availability' , price = '$price' WHERE  item_id = '$item' AND store_id = '$sellerid'";

			$result=$this->controller->updateQuery($query);
			if ($result){
				echo "updated";
				return $result;
			}else{
				return false;
			}
		}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		public function add_laptopdetails(){
			
		}
		public function getAdditionalFeatures($item_id){
			$query="SELECT * FROM propertyavailability WHERE item_id=$item_id";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function gettotalsellerList(){
			$query="SELECT * FROM seller";
			$result=$this->controller->runQuery($query);
			return $result;
		}

		public function gettotalitemList(){
			$query="SELECT * FROM category INNER JOIN  brand ON brand.category_id = category.category_id INNER JOIN item ON item.brand_id=brand.brand_id";
			$result=$this->controller->runQuery($query);
			return $result;
		}



	}
?>