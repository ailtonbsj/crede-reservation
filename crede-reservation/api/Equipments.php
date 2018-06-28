<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;

class Equipments extends Module {

	public $tableName = 'equipments';
	public $orderBy = 'id';
	public $moduleName = 'equipments';

	function listAll($isPrintable = false){
	$sql = <<<EOF
SELECT
	equipments.id,
	categories.name AS category,
	equipments.name,
	equipments.owner
FROM equipments INNER JOIN categories ON equipments.category = categories.id
EOF;
		$this->listQuery($sql,[],$isPrintable);
	}
	
}

 ?>