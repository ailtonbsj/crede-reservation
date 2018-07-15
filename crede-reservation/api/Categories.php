<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;

class Categories extends Module {

	public $tableName = 'categories';
	public $orderBy = 'id';
	public $moduleName = 'categories';

	function listAll($isPrintable = false){
		$sql = "SELECT * FROM {$this->tableName}";
		$this->listQuery($sql,[],$isPrintable);
	}
	
}

 ?>