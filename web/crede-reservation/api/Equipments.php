<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;

class Equipments extends Module {

	public $tableName = 'equipments';
	public $orderBy = 'id';
	public $moduleName = 'equipments';

	function listAll($isPrintable = false){
		$filterGid = $this->filterGid($this->tableName);
		$sql = <<<EOF
SELECT
	equipments.id,
	categories.name AS category,
	equipments.name,
	equipments.owner
FROM equipments INNER JOIN categories ON equipments.category = categories.id
WHERE{$filterGid}
EOF;
		$this->listQuery($sql,[],$isPrintable);
	}

	function updateItem($dataOfColumns, $isPrintable = false) {
		$sql = "SELECT * FROM equipments WHERE id = '{$dataOfColumns['id']}'";
		$res = $this->listQuery($sql, [], false);
		$oldGid = $this->gid;
		$this->gid = $res[0]->gid;
		parent::updateItem($dataOfColumns, $isPrintable);
		$this->gid = $oldGid;
	}

	
}

 ?>