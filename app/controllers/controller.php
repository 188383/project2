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
	
	

	public function getDb(){
		return $this->db;
	}
	
	public function setDb($db){
		$this->db = $db;
	}
}
