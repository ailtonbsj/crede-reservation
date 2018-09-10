<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;

class Places extends Module {

	public $tableName = 'places';
	public $orderBy = 'gid,id';
	public $moduleName = 'places';

	function updateItem($dataOfColumns, $isPrintable = false) {
		$sql = "SELECT * FROM places WHERE id = '{$dataOfColumns['id']}'";
		$res = $this->listQuery($sql, [], false);
		$oldGid = $this->gid;
		$this->gid = $res[0]->gid;
		parent::updateItem($dataOfColumns, $isPrintable);
		$this->gid = $oldGid;
	}

}

 ?>