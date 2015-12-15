<?php

/**
	Model of the rooms table in the database, wrapped in the data mapper
**/

class Rooms extends \DB\SQL\Mapper{
	function __construct(){
		parent::__construct(\Base::instance()->get('db','rooms'));
	}
}
