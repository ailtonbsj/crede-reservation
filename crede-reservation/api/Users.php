<?php 

namespace CredeReservation;

include "Orkidea/Module.php";
include "Orkidea/Group.php";

use Orkidea\Core\Module;
use Orkidea\Core\Group;

class Users extends Module {

	public $tableName = 'users';
	public $orderBy = 'gid,name';
	public $moduleName = 'users';
	public $primaryKeysName = ['name'];

	public function __construct($object){
		$ngid = Group::getGid($object->obj['gid']);
		unset($object->obj['gid']);
		session_start();
		$this->gid = "".$_SESSION['gid'];
		if( ($ngid >= intval($this->gid)) &&
			($ngid <= Group::getEndGid($this->gid)) ){
			$this->gid = $ngid;
		}
		parent::__construct($object);
	}

	public function listAll(){
		$obj = parent::listAll();
		foreach ($obj['data'] as $i => $v) {
			$hgid = Group::getHumanGid($v->gid);
			$obj['data'][$i]->gid = $hgid;
		}
		echo json_encode($obj);
	}

	public function listItem($ids){
		$obj = parent::listItem($ids);
		$obj['data']->gid = Group::getHumanGid($obj['data']->gid);
		echo json_encode($obj);
	}
}

 ?>