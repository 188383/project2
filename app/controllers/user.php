<?php
/*
	This is the user model wrapped in fatfree's data mapper.
	This extended functionality allows us to use our own functions
	
	db - global constant in config.ini
*/



class User extends Controller{

	protected $user;	
	protected $audit;
	protected $bcrypt;
	function __construct(){
		parent::__construct();
		$this->user = new Users($this->db);
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
		Loggin function. This is the function that logs the user in. If an invalid email is passed,
		by definition the database is not checked and the user is notified that there is an error.
		If the user enters the wrong username and password combination, then the user is resent to the 
		log in page to make sure he/she enters the correct values
	**/
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
			//reroute to dashboard that will be built next
			//$f3->reroute($f3->get('dashboardurl'));
			$f3->reroute('/');
		}catch(Exception $e){
			echo $e;
			//handle appropriate errors
		}
		
	}	
	
	/**
		Destroy the session data
	**/
	
	public function logout($f3){
		$f3->clear('SESSION.username');
		$f3->clear('SESSION.userid');
		$f3->reroute($f3->get('loginurl'));		
	}
	
	/**
		show the users profile details here. Decide whether this is 
		information that should be retrieved using ajax calls or rather just load 
		a static webpage. The ajax calls could get complex
	**/
	
	public function profile($f3){
		$vars = $f3->get('GET');
		
	}
	
	//generate the add room formula
	public function addRoom($f3){
	
		echo Template::instance()->render('newroom.htm');
	}
	
	private function emailValidate($email){
		return $this->auth->email($email);
	}	

	private function hashPassword($password){
		return $this->bcrypt->hash($password);
	}
	
		
	
}
