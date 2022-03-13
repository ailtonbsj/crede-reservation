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
		if(isset($obj->filteredBy['username']))
			$this->filteredBy['username'] = $obj->filteredBy['username'];
		parent::__construct($obj);
	}

	function insertItem ($dataOfColumns, $isPrintable = false) {
		$sql = "SELECT * FROM users WHERE name = '{$dataOfColumns['username']}'";
		$res = $this->listQuery($sql,[], false);
		$oldGid = $this->gid;
		$this->gid = $res[0]->gid;
		parent::insertItem($dataOfColumns, $isPrintable);
		$this->gid = $oldGid;
	}

	function updateItem ($dataOfColumns, $isPrintable = false) {
		$sql = "SELECT * FROM users WHERE name = '{$dataOfColumns['username']}'";
		$res = $this->listQuery($sql,[], false);
		$oldGid = $this->gid;
		$this->gid = $res[0]->gid;
		parent::updateItem($dataOfColumns, $isPrintable);
		$this->gid = $oldGid;
	}

}

 ?>