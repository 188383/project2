<?php
function test(){echo test;}
// Kickstart the framework
$f3=require('lib/base.php');
/*
	Include of the controllers 
*/
require('app/controllers/controller.php');
require('app/controllers/booking.php');
require('app/controllers/index.php');
require('app/controllers/room.php');
require('app/controllers/user.php');
/**
	Load all the models 
	
	TODO: maybe automate this process more in the
	future. writing and adding classes is labourious 
**/
require('app/models/users.php');
require('app/models/rooms.php');
require('app/models/userbookings.php');
require('app/models/roomratings.php');



$f3->set('DEBUG',3);
if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

// Load configuration
$f3->config('config.ini');
$f3->config('routes.ini');
$f3->run();
