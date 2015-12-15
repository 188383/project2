<?php

/**
	The ratings table 
**/

class RoomRatings extends \DB\SQL\Mapper{
	function __construct(){
		parent::__construct(\Base::instance()->get('db','roomratings'));
	}
}
