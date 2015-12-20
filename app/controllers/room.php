<?php

class Room extends Controller{

	protected $room;
	protected $user;
	function __construct(){
		parent::__construct();
		$this->room = new Rooms($this->db);
	}
	
	/**
		Create the room
	**/
	public function create($f3){
		$insert = 'INSERT INTO Rooms(floorspace,cost,people,
		type,floor_level,lift,garden,parking,swimmingpool,kitchen,
		ensuite_bathroom,bath_shower,floorheating,airconditioning,washingmachine,
		pets,bed_dressing,laundry_washing_included,cost_of_laundry,seperate_entrance,
		cost_of_cleaning_included,cost_of_cleaning,television,cost_of_television,wifi,
		type_of_bed,suited_for_disabled,pictureurl,addressid,ownerid) VALUES(:floorspace,
		:cost,:people,:type,:floor_level,:lift,:garden,:parking,:swimmingpool,:kitchen,:ensuite_bathroom,
		:bath_shower,:floorheating,:airconditioning,:washingmachine,:pets,:bed_dressing,:laundry_washing_included,:cost_of_laundry,
		:seperate_entrance,:cost_of_cleaning_include,:cost_of_cleaning,:television, :cost_of_television,:wifi,
		:type_of_bed,:suited_for_disabled,:pictureurl,:addressid,:ownerid)';
	
		
		//Do this massive insert so that you can insert the user information from 
		//The client. The client sends this information in the form of a post. The
		//PHP does not recognise the PUT adverb. This has been substituted by the POST 
		//adverb.
		$var = $f3->get('GET');
		print_r( $var);
	}
	
	/**
		List the rooms. This function should be as usable as possible.
		Maybe this will be an ajax called function. Leave all the UI modelling 
		the client's browser.
	**/
	
	public function show($f3){
						
	}
	
	public function listRooms(){
		return $this->room->find();
	}
	
	/**
		Show the room of the client by id value. This will be useful for when 
		switching between the the multi room view and concrete room view
	**/
	
	public function showById($f3){
	
	}
}
