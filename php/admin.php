<?php 
	class admin{
		private $utility;
		public $password;

		public function __construct($psw){
    		$this->utility= new Utility();
    		$this->password=$psw;
    	}

    	public function login_admin(){
    		$isCorrect=$this->utility->checkAdminPsw($this->password);
    		if ($isCorrect){
    			return true;
    		}else{
    			return false;
    		}
    	}
	}
 ?>