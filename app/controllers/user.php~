<?php
/*
	This is the user model wrapped in fatfree's data mapper.
	This extended functionality allows us to use our own functions
	
	db - global constant in config.ini
*/



class User extends Controller{

	protected $user;	
	protected $audit;
		
	function __construct(){
		parent::__construct();
		$this->user = new Users($this->db);
		$this->auth = \Audit::instance();
	}
	
	/**
		Here is the login for the user
		The user login is a function that 
		checks if a user is logged in.
	**/
	public function create($f3){
		$userdetails = $f3->get('POST');
		$username = $userdetails['username'];
		$password = $userdetails['password'];
		$firstname = $userdetails['firstname'];
		$lastname = $lastname['lastname'];	
		
		
		try{
			if(!$this->emailValidate($username)) throw new Exception('invalid mail');
				//now here is where you the user after the password has been hashed 
				//and the entered captcha is the same
		
		}catch(Exception $e){
			$f3->set('message',$e);
		}
		
	}
	
	private function emailValidate($email){
		return $this->auth->email($email);
	}	

	private function hashPassword($password){
		return $this->auth->
	}	
	
}
