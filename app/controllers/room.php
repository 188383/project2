<?php

class Room extends Controller{

	protected $room;
	
	function __construct(){
		parent::__construct();
		$this->room = new Rooms();
	}
	
	/**
		Create the room
	**/
	public function create($f3){
	
	}
	
	/**
		List the rooms. This function should be as usable as possible.
		Maybe this will be an ajax called function. Leave all the UI modelling 
		the client's browser.
	**/
	
	public function show($f3){
	
	}
	
	/**
		Show the room of the client by id value. This will be useful for when 
		switching between the the multi room view and concrete room view
	**/
	
	public function showById($f3){
	
	}
}
