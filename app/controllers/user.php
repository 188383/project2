<?php
/*
	This is the user model wrapped in fatfree's data mapper.
	This extended functionality allows us to use our own functions
	
	db - global constant in config.ini
*/



class User extends Controller{

	protected $user;	
	protected $room;
	protected $audit;
	protected $bcrypt;
	function __construct(){
		parent::__construct();
		$this->user = new Users($this->db);
		$this->room = new Rooms($this->db);
		$this->auth = \Audit::instance();
		$this->bcrypt = \BCrypt::instance();
	}
	
	/**
		Function that processes the user who registers for the website.
		The user email is validated as an email to check for correctness of format.
		If the email is incorrect, the user is then requested to enter again with correct credentials
		
		TODO Add a user security question so that a user can easily reset their password
	**/
	public function create($f3){
		$this->user = new Users($this->db);
		//extract the variables submitted by the POST method
		$userdetails = $f3->get('POST');
		$username = $userdetails['username'];
		$password = $userdetails['password'];
		$firstname = $userdetails['firstname'];
		$lastname = $userdetails['lastname'];	
		
		$this->user->reset();
		$this->user->load(array('username=:username','username=>' . $username));
		
		try{
			if(!$this->auth->email($username)) throw new Exception('Not an email');
			if(!$this->user->dry()) throw new Exception('User exists'); 
			
			$this->user->firstname = $firstname;
			$this->user->lastname = $lastname;
			$this->user->username = $username;
			$this->user->password = $this->hashPassword($password);
			$this->user->save();
		}catch(Exception $e){
			$f3->set('message',$e);
			$f3->reroute('/register');
			//Handle the error and reroute the user appropriately
		}
		
	}
	
	
	
	/**
		Destroy the session data
	**/
	

	
	
	public function rooms($f3){
		$this->room->reset();
		$this->room->load(array('ownerid=?', $f3->get('SESSION.userid')));
		
		if($this->room->dry()){
			echo 'dry';
		}else{
			$users = array();
			$users[$this->room->id] = $this->room->id;
			while($this->user->skip()){
				
			} 
		}
	}
	
	//generate the add room formula
	public function addRoom($f3){
	
		//echo Template::instance()->render('newroom.htm');
	}
	
	public function listUsers(){
		$username = null;
		$firstname = null;
		$lastname = null;
		return $this->user->find(array(),array('order'=>'username','limit'=>1));
	}	
	
		public function authenticate($f3){
		$userdetails = $f3->get('POST');
		
		$username = $userdetails['username'];
		$password = $userdetails['password'];
		
		/*if($username===$f3->get('SESSION.username')){
			$f3->reroute($f3->get('dashboardurl'));
		}*/
		
		try{
			if(!$this->auth->email($username)) throw new Exception('User and or password is not correct');
			
			$this->user->reset();
			$this->user->load(array('username=?',$username));
			echo $this->user->firstname;
			if(!$this->bcrypt->verify($password,$this->user->password)) throw new Exception('password');
			
			$f3->set('SESSION.username',$this->user->username);
			$f3->set('SESSION.userid',$this->user->id);
			$f3->reroute('/user?id=' . $f3->get('SESSION.userid') );
		}catch(Exception $e){
			echo $e;
			//handle appropriate errors
		}
		
	}	
	
	private function emailValidate($email){
		return $this->auth->email($email);
	}	

	private function hashPassword($password){
		return $this->bcrypt->hash($password);
	}
	
	function beforeRoute($f3){
		parent::beforeRoute($f3);
	}	
	
}
