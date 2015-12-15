<?php

/**
	This is the model for the table holding the booking information. The model is
	wrapped in the data mapper class
**/

class UserBookings extends \DB\SQL\Mapper{
	function __construct(){
		parent::__construct(\Base::instance()->get('db','userbookings'));
	}
}
