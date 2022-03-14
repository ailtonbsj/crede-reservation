<?php

namespace Orkidea\Core;

abstract class Config {
	
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

	public static function getDbCredentials() {
		return array(
			'host' => getenv('DATABASE_SERV') ? getenv('DATABASE_SERV'): 'localhost',
			'name' => getenv('DATABASE_NAME') ? getenv('DATABASE_NAME') : 'reservation',
			'user' => getenv('DATABASE_USER') ? getenv('DATABASE_USER') : 'postgres',
			'pass' => getenv('DATABASE_PASS') ? getenv('DATABASE_PASS') : 'postgres',
			'type' => getenv('DATABASE_TYPE') ? getenv('DATABASE_TYPE') : 'pg',
		);
	}
}

 ?>