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
		'categories'
	);
}

 ?>