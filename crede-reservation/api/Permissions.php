<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;

class Permissions extends Module {

	public $tableName = 'permissions';
	public $orderBy = 'username';
	public $moduleName = 'permissions';
	public $primaryKeyName = 'username';

}

 ?>