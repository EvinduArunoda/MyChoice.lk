 <?php 
	require_once('seller.php');
	require_once('item.php');
	require_once('admin.php');
	require_once('logger.php');
	require_once('Utility.php');
	require_once('initialize.php'); 
?>

<?php 
// seller functionalities
if(isset($_POST['signup_seller'])){
	$manager->signupSeller();  
}elseif(isset($_POST['bid'])){
	$manager->loaditems();				 //
}elseif (isset($_POST['login_seller'])){
	$manager->loginSeller(); 	
}elseif(isset($_POST['add_item'])){
	$manager->addItem();			
}elseif(isset($_POST['remove_item'])){
	$manager->removeItemFromSeller();		//
}elseif(isset($_POST['update_itemDetailsbySeller'])){
	$manager->update_itemDetails();			//
}elseif(isset($_POST['update_sellerDetailsbySeller'])){
	$manager->update_SellerDetails();			//
}elseif(isset($_POST['logout_seller'])){
	$manager->logout_seller();
}elseif(isset($_POST['signout_seller'])){
	$manager->signout_seller();
}elseif(isset($_POST['activate_seller'])){
	$manager->activate_seller();
}elseif (isset($_POST['remove_this_seller'])){
	$manager->RemoveSellerByAdmin();
}elseif (isset($_POST['seller_Update_item'])){
	$manager->updateitemSeller();
}elseif(isset($_POST['seller_add_item'])){
	$manager->additemSeller();
  			//
//admin functions
}elseif(isset($_POST['loginAdmin'])){
	$manager->loginAdmin();			//
}elseif(isset($_POST['add_NewItem'])){
	$manager->addnewItem();					//
}elseif(isset($_POST['addnewSeller'])){
	$manager->addNewSeller();
}elseif(isset($_POST['removeSeller'])){
	$manager->removeSeller();
}elseif (isset($_POST['edit_this_item'])){
	$manager->updateItemDetailsbyAdmin();
}elseif (isset($_POST['remove_this_item'])){
	$manager->RemoveItemByAdmin();
}

//system functionalities


class manager{
	private $seller;
	private $mylogger;
	private $isAdmin;
	private $msg;



	// seller methods
	private static $sessions=array();

	public static function getInstance($key)
    {
        if(!array_key_exists($key, self::$sessions)) {
            self::$sessions[$key] = new self();
        }

        return self::$sessions[$key];
    }

    private function __construct(){}

    private function __clone(){}
    //return the list of items of the seller

    public function loadMobileBrands(){
    	$utility= new Utility();
    	$cat=$_SESSION['currentcategory'];
    	$brands=$utility->loadMobileBrands($cat);
    	if ($brands){
    		return $brands;
    	}
    	
    }
    public function newItem(){
    	$_SESSION['currentcategory']=$_POST['category_id'];
    	header("Location:ajax_add_itemform.php");
    }
    public function loaditems(){
    	$seller=$_SESSION['currentseller'];
		$sellerid=$seller->id;
		$utility= new Utility();
		$bid=$_POST['bid'];
		$items=$utility->loaditems($bid);
		if ($items){
		echo json_encode($items);
		}
    }

    public function getSellersItemList(){
    	$seller=$_SESSION['currentseller'];
		$sellerid=$seller->id;
		$utility= new Utility();
		$itemlist=$utility->getSellersItemList($sellerid);
		if ($itemlist){
			$_SESSION['itemlist']=$itemlist;
		}
    }
	public function signupSeller(){

		$email=$_POST['SellerEmail'];
		$psw=$_POST['password'];
		$regNo=$_POST['reg_no'];
		$name=$_POST['store_name'];
		$token="";//$_POST['token'];

		require_once('initialize.php'); 
		$db = Database::getInstance();
		$conn = $db->getConnection(); 
		
		$q = mysqli_query($conn, "SELECT * FROM seller WHERE store_email LIKE '%$email%'") or die(mysqli_error());
		$c = mysqli_num_rows($q);

		if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["reconfirmedPassword"])) {
    		$password = ($_POST["password"]);
    		$cpassword = ($_POST["reconfirmedPassword"]);
	   		if (strlen($_POST["password"]) < '8') {
	        	$this->msg = "Your Password Must Contain At Least 8 Characters!";
	    	}
	    	elseif(!preg_match("#[0-9]+#",$password)) {
	        	$this->msg = "Your Password Must Contain At Least 1 Number!";
	    	}
	    	elseif(!preg_match("#[A-Z]+#",$password)) {
	        	$this->msg = "Your Password Must Contain At Least 1 Capital Letter!";
	    	}
	    	elseif(!preg_match("#[a-z]+#",$password)) {
	        	$this->msg = "Your Password Must Contain At Least 1 Lowercase Letter!";
	    	}
	    	elseif($c != 0){
	        	$this->msg = "Your email address has been used";
	    	}
	    	else{
	    		$this->seller= new seller();
				$this->seller->init($email,$psw,$name,$regNo,$token);

				$entered_to_db=$this->seller->addSeller();
				if($entered_to_db){
					header("Location:login.php");					
				}else{
				//entering to db failed.
				$this->msg="Something went wrong. Please try again or please check your email.";
				}
	    	}
			}
			elseif(!empty($_POST["password"])) {
	    		$this->msg = "Please Check You've Entered Or Confirmed Your Password!";
			} else {
	     	$this->msg = "Please enter password   ";
			}
			header("Location:SignupError.php?msg=".$this->msg);
			

		
	}


	public function activateSeller(){
		$token=$_POST['token'];
		$this->seller=new seller();
		$result=$this->seller->getBasicInfoByDetail();
		if(!($result)){
			header("Location:signup.php");
		}else{
			echo "Your account has been activated successfully.";
		}
	}
	public function loginSeller(){
		$this->msg = "";
		$email=$_POST['SellerEmail'];
		$psw=$_POST['password'];	
		$this->mylogger = new logger($email,$psw);
		$result=$this->mylogger->login();
		if ($result){

			//require_once('initialize.php'); 
			//$db = Database::getInstance();
			//$connection = $db->getConnection(); 

			$_SESSION['set']="set";
			$_SESSION['currentseller']=new seller();
			$gotInfo=($_SESSION['currentseller']->getBasicInfoByEmail($email));
			if($gotInfo){
				$gotlist=$this->getSellersItemList(); 
				echo "<pre>";
				var_dump($gotlist);
				echo "</pre>";
				header("Location:sellerAcc.php");
			}else{
				$this->msg = "something went wrong.Please try again";
			}
		}
		else{
			$this->msg = "Password, Username mismatch";
			header("Location:LoginError.php");
		}
	}
	public function addItem(){
		$seller=$_SESSION['currentseller'];
		$sellerid=$seller->id;
		$cat=$_SESSION['currentcategory'];
		$utility=new Utility();
		$category_name=$utility->getCategoryById($cat);
		//echo "<pre>";
		//var_dump($_SESSION['currentseller']);
		//echo "</pre>";
		$item=itemFactory::createItem($_POST['category_name']);
		$item->init();
		$result=$item->addItem($sellerid);
		if($result){
			echo "item has been successfully added.";
		}else{
			echo "Failed to add the item, Please try again.";
		}
	}

////////////////////////////   add item seller   /////////////////////////////////////////
	public function additemSeller(){
		$seller=$_SESSION['currentseller'];
		$sellerid=$seller->id;
		$model=$_POST['item'];
		$availability=$_POST['list'];
		$price=$_POST['price'];

		require_once('initialize.php'); 
		$db = Database::getInstance();
		$conn = $db->getConnection(); 

		$q = mysqli_query($conn, "SELECT * FROM item WHERE model LIKE '%$model%'") or die(mysqli_error());
		while($row = mysqli_fetch_array($q)){
				$item_id = $row['item_id'];
				$category_id =  $row['category_id'];
		}
		$q1 = mysqli_query($conn, "SELECT * FROM itemavailability WHERE item_id LIKE '%$item_id%' AND store_id LIKE '%$sellerid%'");
		$c = mysqli_num_rows($q1);

		if($c){
			echo("already added that item");
		}
		else{
			$utility=new Utility();
			$utility->addItemtoSeller($item_id,$category_id,$price,$availability,$sellerid);
		}
		
	}


	public function updateitemSeller(){
		$seller=$_SESSION['currentseller'];
		$sellerid=$seller->id;
		$item=$_POST['item'];
		$availability=$_POST['list'];
		$price=$_POST['price'];

		$utility=new Utility();
		$utility->SellerUpdateItem($sellerid,$item,$price,$availability);
		
		
	}
//////////////////////////////////////////////////////////////////////////////////////////
	
	public function removeItemFromSeller(){
		$seller=$_SESSION['currentseller'];
		$sellerid=$seller->id;
		$utility=new Utility();
		$result=$utility->removeItemFromSeller($sellerid,$_POST['item_id']);
		if($result){
			echo "Item is no longer in your item list";
		}else{
			echo "something went wrong. Please try again.";
		}
	}


	public function update_itemDetails(){
		$sellerid=$this->seller->seller_id;
		$item=new Item();
		$model=$_POST['model'];
		$item->getBasicFeatures($model);
		$item->getDetailsReleventToSeller($seller->sellerid,$item->itemid);
	}
	public function update_sellerDetails(){

	}

	//not used
	public function logout_seller(){
		session_unset();
		header("home.php");
	}
	public function signout_seller(){

	}
	//admin methods
	public function loginAdmin(){
		$psw=$_POST['password'];
		$this->mylogger = new admin($psw);
		$result=$this->mylogger->login_admin();
		if ($result){
			$_SESSION['set']="set";
			$this->isAdmin=true;
			$this->getsellerRequestsList();
			$this->getitemRequestsList();
			$this->gettotalsellerList();
			$this->gettotalitemList();
			header("Location:admin_panel.php");
		}else{
			echo "something went wrong.Please try again";
		}

	}
////////////////////    not needed now ///////////////////////////
	public function addnewItem(){
		$_SESSION['requestedseller']=$_POST['requestedseller'];
		$_SESSION['category_name']=$_POST['category_name'];
		$_SESSION['brand_name']=$_POST['brand_name'];
		$cat=$_POST['category_name'];
		if($cat=='laptop'){
			header("Location:add_laptop_html.php");
		}elseif($cat=='mobile'){
			header("Location:add_mobile_html.php");
		}elseif($cat=='television'){
			header("Location:add_television_html.php");
		}elseif ($cat=='tablet') {
			header("Location:add_tablet_html.php");
		}else{
			echo "invalid item";
		}
	}
//////////////////////////////////////////////////////////////////////////////
	
	public function addNewSeller(){
		$utility=new Utility();
		$isAdded=$utility->addNewSeller($_POST['addnewSeller']);
		if ($isAdded){
			echo "new seller Added";
		}
	}
	public function removeSeller(){

	}
	public function updateItemDetailsbyAdmin(){
		$item=itemFactory::createItem($_POST['category_name']);
		$item->getBasicFeatures($_POST['model']);
		$item->getAdditionalItemFeatures();
		echo "<pre>";
		var_dump($item);
		echo "</pre>";
		$_SESSION['current_item']=$item;
		//header("Location:update_mobile_byAdmin.php");
	
	//  Remove item by admin function
	}
	public function RemoveItemByAdmin(){
		$utility=new Utility();
		$isAdded=$utility->RemoveItem($_POST['remove_this_item']);
		if ($isAdded){
			echo "State Changed";
		}
	}






	public function RemoveSellerByAdmin(){
		$utility=new Utility();
		$isAdded=$utility->RemoveSeller($_POST['remove_this_seller']);
		if ($isAdded){
			echo "seller Removed";
		}

	}







	public function getsellerRequestsList(){
		$utility= new Utility();
		$sellerReqlist=$utility->getsellerRequestsList();
		if ($sellerReqlist){
			$_SESSION['sellerReqlist']=$sellerReqlist;
		}
	}

	public function getitemRequestsList(){
		$utility= new Utility();
		$itemReqlist=$utility->getitemRequestsList();
		if ($itemReqlist){
			$_SESSION['itemReqlist']=$itemReqlist;
		}
	}

	public function gettotalsellerList(){
		$utility= new Utility();
		$totsellerlist=$utility->gettotalsellerList();
		if ($totsellerlist){
			$_SESSION['totsellerlist']=$totsellerlist;
		}
	}

	public function gettotalitemList(){
		$utility= new Utility();
		$totitemlist=$utility->gettotalitemList();
		if ($totitemlist){
			$_SESSION['totitemlist']=$totitemlist;
		}
	}

	
}
 ?>