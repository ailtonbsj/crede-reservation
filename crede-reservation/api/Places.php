<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;

class Places extends Module {

	public $tableName = 'places';
	public $orderBy = 'gid,id';
	public $moduleName = 'places';

}

 ?>