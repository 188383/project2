<?php
/**
	This is the parent controller. All controllers should have these common traits:
	connection to database
	control flow from data to view and from view to data
**/
class Controller{
	protected $db;
	function __construct(){
		$this->db = new \DB\SQL(\Base::instance()->get('db'));
	}
	/**
		What is to be done before the route is run by the routing mechanism.
		This method should be doing session checking to render the proper ui elements 
		and make sure the user is sent to the correct areas
	
	**/
	public function beforeRoute($f3){
	
	
		$user = new Users($this->db);
		$sessionId = $f3->get('SESSION.userid');
		$user->load(array('id=?',$sessionId));
		
		
		if($user->dry()){
			$links = array(
				'home'=>'/',
				'about'=>'/about',
				'login'=>$f3->get('loginurl'),
				'signup'=>$f3->get('registerurl')
			);				
			$f3->set('links',$links);	
		}else{
			$links = array(
				'home'=>'/',
				'about'=>'/about',
				'dashboard'=>$f3->get('dashboardurl'),
				'logout'=>'/logout'
			);	
			
			$f3->set('links',$links);			
		}
		
		
		
		$f3->set('head','partials/head.htm');
		$f3->set('mainnav','partials/nav.htm');
		$f3->set('foot','partials/foot.htm');
	}
	
	
	
	public function getDb(){
		return $this->db;
	}
	
	public function setDb($db){
		$this->db = $db;
	}
}
