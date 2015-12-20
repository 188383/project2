<?php
/**
	The index class is the class that operates on 
	home page. leads to all the main functionality like 
	registration forms as well as login forms
	
	Remember to set the appropriate variables such as header 
	and footer to make the control smooth
	
	header and footer content is loaded in the controller
**/
class Index extends Controller{
	
	protected $user;	
	protected $room;
	protected $audit;
	protected $bcrypt;
	function __construct(){
		parent::__construct();
		$this->user = new User();
		$this->room = new Room();
		$this->auth = \Audit::instance();
		$this->bcrypt = \BCrypt::instance();
	}
	
	function beforeRoute($f3){
		parent::beforeRoute($f3);
	}
	
	function afterRoute($f3){
		echo Template::instance()->render('index.htm');	
	}
	
	public function index($f3){
		$f3->set('body','home.htm');
	}
	
	function about($f3){
		$f3->set('body','about.htm');
	}
	
	function login($f3){
		$f3->set('login',$f3->get('loginurl'));
		$f3->set('body','login.htm');
		
	}
	
	function register($f3){
		$f3->set('register',$f3->get('registerurl'));
		$f3->set('body','register.htm');
	}
	//add a second function that will allow the user to paginate through 
	//the results and see what he/she they want to try out.
	
	public function logout($f3){
		$f3->clear('SESSION.username');
		$f3->clear('SESSION.userid');
		$f3->reroute($f3->get('loginurl'));		
	}
	
	/**
		Loggin function. This is the function that logs the user in. If an invalid email is passed,
		by definition the database is not checked and the user is notified that there is an error.
		If the user enters the wrong username and password combination, then the user is resent to the 
		log in page to make sure he/she enters the correct values
		
		TODO Move the main part of this to the user class. Make the user class do all the hardwork that is related 
		to the authentication
	**/
	
	
	/**
		This is the list of rooms that the user is the owner of.
		The list is shown in a card where a summary of the room is added.
	**/
	public function userProfile($f3){
		//$rooms = $this->room->listRooms();
		
		/*$rooms = $this->user->listUsers();
		try{
			$f3->set('image','profile.jpg');
			$f3->set('rooms',$rooms);
			
		}catch(Exception $e){
			$f3->set('message','Unexpected Error has occurred');
		}
		*/
		$f3->set('body','profile.htm');
	}		
	
}
