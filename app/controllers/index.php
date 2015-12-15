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
	
	function __construct(){
		parent::__construct();
		$this->user = new Users($this->db);
	}
	
	public function index($f3){
		echo Template::instance()->render('index.htm');
	}
	
	function about($f3){
		echo Template::instance()->render('about.htm');
	}
	
	function login($f3){
		$f3->set('login',$f3->get('loginurl'));
		//add reset password url
		echo Template::instance()->render('login.htm');
	}
	
	function register($f3){
		$f3->set('register',$f3->get('registerurl'));
		
		echo Template::instance()->render('register.htm');
	}
	
}
