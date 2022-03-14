<?php 

namespace CredeReservationTest;

use Orkidea\Core\Module;
use Orkidea\Core\Authenticator;

include "../Orkidea/Module.php";


class PlacesTest extends Module {
	public $tableName = 'places';
	public $orderBy = 'id';
	public $moduleName = 'places';
}

class UsersTest extends Module {
	public $tableName = 'users';
	public $orderBy = 'name';
	public $moduleName = 'users';
	public $primaryKeysName = ['name'];
}

class PermissionsTest extends Module {
	public $tableName = 'permissions';
	public $orderBy = 'username';
	public $moduleName = 'permissions';
	public $primaryKeysName = ['username','module'];
}

new Authenticator(
	(Object) array(
		'name' => 'admin',
		'pass' => 'admin'
	)
);

/* LIST ITEM */

// echo "\n-------------PLACES-----------\n";

// new PlacesTest(
// 	(Object) array(
// 		'action' => 'listItem',
// 		'obj' => array('id' => '71') 
// 	)
// );
// echo "\n-------------USERS--------------\n";

// new UsersTest(
// 	(Object) array(
// 		'action' => 'listItem',
// 		'obj' => array('name' => 'admin') 
// 	)
// );
// echo "\n----------PERMISSIONS------------\n";

// new PermissionsTest(
// 	(Object) array(
// 		'action' => 'listItem',
// 		'obj' => array('username' => 'admin', 'module' => 'places') 
// 	)
// );

/* LIST ALL */

echo "\n-------------PLACES-----------\n";

new PlacesTest(
	(Object) array(
		'action' => 'listAll',
		'obj' => array('id' => '71') 
	)
);
echo "\n-------------USERS--------------\n";

new UsersTest(
	(Object) array(
		'action' => 'listAll',
		'obj' => array('name' => 'admin') 
	)
);
echo "\n----------PERMISSIONS------------\n";

new PermissionsTest(
	(Object) array(
		'action' => 'listAll',
		'obj' => array('username' => 'admin', 'module' => 'places') 
	)
);

 ?>