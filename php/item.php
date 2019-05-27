<?php 
	require_once('Utility.php');
 ?>

 <?php 
 	abstract class Item{

 		public $item_id;
 		public $category_id;
 		public $model;
 		public $brand;
 		public $price;
 		public $display;
 		public $colour;
 		public $item_isActive;
 		public $utility;

 	public function __construct(){
 		$this->utility=new Utility();
 	}

 	public function init(){
 		$this->model=$_POST['items'];
 		$this->brand=$_POST['brands'];
 		$this->price=$_POST['price'];
 		if ($_POST['availability']=='YES'){
 			$this->availability=1;
 		}else{
 			$this->availability=0;
 		}
 		
 		$this->item_isActive=0;
 	}

 	public function addItem($sellerId){
 		if($_POST['items']=='other'){
 			//add new item to database
 			$this->model=$_POST['newModel'];
 			$result=$this->utility->addnewItem($this->model,$this->brand,$this->price,$this->availability,$sellerId);
 		}else{
 			$result=$this->utility->addItemtoSeller($this->model,$this->brand,$this->price,$this->availability,$sellerId);
 		}
 		if($result){
 			return true;
 		}else{
 			return false;
 		}
 	}
 	public function getDetailsReleventToSeller($sellerid,$itemid){
 		$result=$this->utility->getDetailsReleventToSeller($sellerid,$itemid);
 		if($result){
 			$this->category_id=$result[0]['category_id'];
			$this->model=$result[0]['model'];
			$this->brand=$result[0]['brand'];
			$this->price=$result[0]['price'];
			$this->availability[0]['availability'];
			$this->item_isActive[0]['item_isActive'];
 		}
 	}

 	public function getBasicFeatures($model){
 		$result=$this->utility->getBasicFeaturesOfItem($model);
 		if($result){
 			 $this->item_id=$result[0]['item_id'];
	 		 $this->category_id=$result[0]['category_id'];
	 		 $this->model=$result[0]['model'];
	 		 $this->brand=$result[0]['brand'];
	 		 $this->display=$result[0]['display'];
	 		 $this->colour=$result[0]['colour'];
	 		 $this->item_isActive=$result[0]['item_isActive'];
 		}
 	}

 	public function setBasicFeatures($model){
 		$result=$this->utility->getBasicFeaturesOfItem($model);
 		if($result){
 			 $this->item_id=$result[0]['item_id'];
	 		 $this->category_id=$_POST['category_id'];
	 		 $this->model=$_POST['model'];
	 		 $this->brand=$_POST['brand'];
	 		 $this->display=$_POST['display'];
	 		 $this->colour=$_POST['colour'];
	 		 $this->item_isActive=$_POST['item_isActive'];
 		}
 	}

 	public abstract function getAdditionalItemFeatures();
 	public abstract function init_additional();
 	public abstract function add_details();
 		

 	}
 	
// parent::__construct($item_id,$category_id,$rating,$model,$brand,$display,$batterycapacity,$pricerange,$colour,$item_isActive);
 	class Laptop extends Item{
 		public $processor;
 		public $ram;
 		public $storage;
 		public $batterycapacity;
 		public $os;

 		public function getAdditionalItemFeatures(){
 			$results=$utility->getAdditionalFeatures($this->item_id);
 			foreach($results as $row){
 				$property=$row['property_id'];
 				switch ($property) {
 					case 'processor':
 						$this->processor=$row['value'];
 						break;
 					case 'ram':
 						$this->ram=$row['value'];
 						break;
 					case 'storage':
 						$this->storage=$row['value'];
 						break;
 					case 'batterycapacity':
 						$this->batterycapacity=$row['value'];
 						break;
 					case 'os':
 						$this->os=$row['value'];
 						break;
 					
 					default:
 						$property="";
 						break;
 				}
 			}
 		}

 		public function init_additional(){
 			$this->processor=$_POST['processor'];
			$this->ram=$_POST['ram'];
			$this->storage=$_POST['storage'];
			$this->batterycapacity=$_POST['batterycapacity'];
			$this->os=$_POST['os'];
 		}

 		public function add_details(){
 			$utility->add_laptopdetails($this->processor,$this->ram,$this->storage,$this->batterycapacity,$this->os);
 		}
 	}

 	 class Mobile extends Item{
 		public $camera;
 		public $ram;
 		public $storage;
 		public $batterycapacity;
 		public $fastCharging;
 		public $fingerPrintSensor;
 		public $os;

 		public function init(){
 			parent::init();
 		}
 		public function getAdditionalItemFeatures(){
 			$results=$this->utility->getAdditionalFeatures($this->item_id);
 			foreach($results as $row){
 				$property=$row['property_name'];
 				switch ($property) {
 					case 'camera':
 						$this->camera=$row['value'];
 						break;
 					case 'ram':
 						$this->ram=$row['value'];
 						break;
 					case 'storage':
 						$this->storage=$row['value'];
 						break;
 					case 'batterycapacity':
 						$this->batterycapacity=$row['value'];
 						break;
 					case 'fingerPrintSensor':
 						$this->fingerPrintSensor=$row['value'];
 						break;
 					case 'os':
 						$this->os=$row['value'];
 						break;
 					
 					default:
 						$property="";
 						break;
 				}
 			}
 		}

 		public function init_additional(){
 			$this->camera=$_POST['camera'];
			$this->ram=$_POST['ram'];
			$this->storage=$_POST['storage'];
			$this->batterycapacity=$_POST['batterycapacity'];
			$this->quickCharging=$_POST['quickCharging'];
			$this->fingerPrintSensor=$_POST['fingerPrintSensor'];
			$this->os=$_POST['os'];
 		}

 		public function add_details(){
 			$utility->add_mobiledetails($this->camera,$this->ram,$this->storage,$this->batterycapacity,$this->quickCharging,$this->fingerPrintSensor,$this->os);
 		}
 	}

 	class Television extends Item{
 		public $tvtype;
 		public $screenResolution;

 		public function getAdditionalItemFeatures(){
 			$results=$utility->getAdditionalFeatures($this->item_id);
 			foreach($results as $row){
 				$property=$row['property_id'];
 				switch ($property) {
 					case 'tvtype':
 						$this->tvtype=$row['value'];
 						break;
 					case 'screenResolution':
 						$this->screenResolution=$row['value'];
 						break;
 					
 					default:
 						$property="";
 						break;
 				}
 			}
 		}

 		public function init_additional(){
 			$this->tvtype=$_POST['tvtype'];
 			$this->screenResolution=$_POST['screenResolution'];
 		}

 		public function add_details(){
 			$utility->add_televisiondetails($this->tvtype,$this->screenResolution);
 		}
 	}

 	class Tablet extends Item{
 		public $performance;
 		public $camera;
 		public $batteryCapacity;

 		public function getAdditionalItemFeatures(){
 			$results=$utility->getAdditionalFeatures($this->item_id);
 			foreach($results as $row){
 				$property=$row['property_id'];
 				switch ($property) {
 					case 'camera':
 						$this->camera=$row['value'];
 						break;
 					case 'performance':
 						$this->performance=$row['value'];
 						break;
 					case 'batterycapacity':
 						$this->batterycapacity=$row['value'];
 						break;
 					
 					default:
 						$property="";
 						break;
 				}
 			}
 		}

 		public function init_additional(){
 			$this->performance=$_POST['performance'];
 			$this->camera=$_POST['camera'];
 			$this->batteryCapacity=$_POST['batterycapacity'];

 		}

 		public function add_details(){
 			$utility->add_tabletdetails($this->performance,$this->camera,$this->batterycapacity);
 		}
 		
 	}

 	class itemFactory{
 		public function __construct(){

 		}
 		public static function createItem($type){
 			if($type=='laptop'){
 				return new Laptop();
 			}else if($type=='mobile'){
 				return new Mobile();
 			}else if($type=='tablet'){
 				return new Tablet();
 			}else if($type=='television'){
 				return new Television();
 			}else{
 				return null;
 			}
 		}
 	}
  ?>