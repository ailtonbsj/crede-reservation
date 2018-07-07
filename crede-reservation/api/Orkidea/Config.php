<?php

namespace Orkidea\Core;

abstract class Config {
	public static $dbCredentials = array(
		'host' => 'localhost',
		'name' => 'reservation',
		'user' => 'postgres',
		'pass' => 'postgres',
		'type' => 'pg',
	);

	public static $modules = array(
	   'users' => 'standard',
	   'permissions' => 'inner',
	   'mixed_data' => 'standard',
	   'activities' => 'standard',
       'my_activities' => 'standard',
       'categories' => 'standard',
       'equipments' => 'standard',
       'equipments_activities' => 'inner',
       'equipments_my_activities' => 'inner',
       'places' => 'standard',
       'schedule' => 'standard'
	);
}

 ?>