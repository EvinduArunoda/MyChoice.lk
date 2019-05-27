<?php require_once('Utility.php') ?>

<?php  
class Seller{
	public $id;
	public $name;
    public $token;
    public $company;
    public $address;
    public $telephone;
    public $mobile;
    public $regNo;
    public $website;
    public $password;
    public $email;
    public $isActive;
    private $utility;

    public function __construct(){
    	$this->utility= new Utility();
    }

    public function init($email,$password,$storeName,$regNo,$token){
        $this->email=$email;
        $this->password=$password;
        $this->name=$storeName;
        $this->regNo=$regNo;
        $this->token=$token;
    }
    //add seller to DB by signing up
	public function addSeller(){
		$result=$this->utility->addSeller($this->email,$this->password,$this->name,$this->regNo);
        return $result;
	}
    //fetch seller detailsfrom the DB and assign them to attribute variables
    public function getBasicInfoByToken($token){
        $result=$this->utility->getBasicInfoByToken($token);
        if ($result){
            $this->id=$result[0]['store_id'];
            $this->name=$result[0]['store_name'];
            $this->token=$token;
            $this->company=$result[0]['company_name'];
            $this->address=$result[0]['store_address'];
            $this->telephone=$result[0]['telephone'];
            $this->mobile=$result[0]['mobile'];
            $this->regNo=$result[0]['registrationNumber'];
            $this->website=$result[0]['website'];
            $this->password=$result[0]['password'];
            $this->email=$result[0]['store_email'];
            $this->isActive=$result[0]['seller_isActive'];
            return true;
        }else{
            return false;
        }
    }

    public function getBasicInfoByEmail($email){
        $result=$this->utility->getBasicInfoByEmail($email);
        if ($result){
            $this->id=$result[0]['store_id'];
            $this->name=$result[0]['store_name'];
            $this->email=$email;
            $this->company=$result[0]['companyName'];
            $this->address=$result[0]['store_address'];
            $this->telephone=$result[0]['telephone'];
            $this->mobile=$result[0]['mobile'];
            $this->regNo=$result[0]['registrationNumber'];
            $this->website=$result[0]['website'];
            $this->password=$result[0]['password'];
            $this->token=$result[0]['token'];
             $this->isActive=$result[0]['seller_isActive'];
            return true;
        }else{
            return false;
        }
    }
}
 ?>