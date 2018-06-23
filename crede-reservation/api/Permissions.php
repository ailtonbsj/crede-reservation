<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;

class Permissions extends Module {

	public $tableName = 'permissions';
	public $orderBy = 'username';
	public $moduleName = 'permissions';
	public $primaryKeyName = 'username';
	
	// function __construct ($post) {
	//  	parent::__construct($post);
	// }
}


// namespace CredeReservation;

// use Orkidea\Core\Storage;
// use Orkidea\Core\Authenticator;

// include "Authenticator.php";

// class Users extends Storage {

// 	public $tableName = 'users';
// 	public $primaryKeyName = 'name';
// 	public $orderBy = 'name';
	
// 	function __construct ($post) {
// 		parent::__construct();

// 		if(Authenticator::hasAuthority()) {
// 			echo Authenticator::hasAuthority();

// 		switch ($post->action) {
// 			case 'insertItem':
// 				$this->insertItem($post->obj, true);
// 				break;
// 			case 'updateItem':
// 				$this->updateItem($post->obj, true);
// 				break;
// 			case 'listAll':
// 				$this->listAll(true);
// 				break;
// 			case 'removeItem':
// 				$this->removeItem($post->obj, true);
// 				break;
// 			default:
// 				$this->listItem($post->obj, true);
// 		}


// 		} else echo json_encode(array('status' => 'denied'));

// 	}

// 	function hasPermission () {
// 		var_dump(Authenticator::hasAuthority());
// 	}
// }

 ?>