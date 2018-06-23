<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;

class Users extends Module {

	public $tableName = 'users';
	public $orderBy = 'name';
	public $moduleName = 'users';
	public $primaryKeyName = 'name';

}

 ?>