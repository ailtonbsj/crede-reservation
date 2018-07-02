<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;

class Permissions extends Module {

	public $tableName = 'permissions';
	public $orderBy = 'username, priority DESC';
	public $moduleName = 'permissions';
	public $primaryKeysName = ['username','module'];
	public $filteredBy = ['username' => ''];

	function __construct($obj){
		$this->filteredBy['username'] = $obj->filteredBy['username'];
		parent::__construct($obj);
	}

}

 ?>