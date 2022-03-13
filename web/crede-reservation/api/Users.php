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
		if($object->action == 'insertItem' || $object->action == 'updateItem') {
			$object->obj['pass'] = md5($object->obj['pass']);
			$role = $object->obj['role'];
			unset($object->obj['role']);
		}

		if(isset($object->obj['gid'])) $ngid = Group::getGid($object->obj['gid']);
		unset($object->obj['gid']);
		session_start();
		$this->gid = "".$_SESSION['gid'];
		
		if(isset($ngid)) {
			if( ($ngid >= intval($this->gid)) &&
			($ngid <= Group::getEndGid($this->gid)) ){
				$this->gid = $ngid;
			}
		}

		parent::__construct($object);

		if($object->action == 'insertItem'){
			try {
				if($role == 'role1') {
					$sqlPerms = array(
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'schedule', false, true, false, false, 70, :ngid);",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'activities', false, true, false, false, 60, :ngid)",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'my_activities', true, true, true, true, 50, :ngid);",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'equipments', true, true, true, true, 40, :ngid);",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'equipments_activities', false, true, false, false, 39, :ngid);",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'equipments_my_activities', true, true, true, true, 38, :ngid);",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'places', true, true, true, true, 20, :ngid);",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'categories', true, true, true, true, 10, :ngid);",						
					);
				} else {
					$sqlPerms = array(
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'activities', false, true, false, false, 60, :ngid)",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'categories', false, true, false, false, 10, :ngid);",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'equipments', false, true, false, false, 40, :ngid);",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'equipments_activities', false, true, false, false, 39, :ngid);",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'equipments_my_activities', true, true, true, true, 38, :ngid);",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'my_activities', true, true, true, true, 50, :ngid);",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'places', false, true, false, false, 20, :ngid);",
						"INSERT INTO permissions(username, module, c, r, u, d, priority, gid) VALUES (:name, 'schedule', false, true, false, false, 70, :ngid);"
					);
				}
				foreach ($sqlPerms as $sql) {
					$stm = $this->connection->prepare($sql);
					$stm->execute(
						array(
							'name' => $object->obj['name'],
							'ngid' => $ngid
						)
					);
					$row = $stm->fetchObject();
				}
			} catch (\Exception $e) {
				echo $e->getMessage();
			}
		}
	}

	public function listAll($isPrintable = false){
		$obj = parent::listAll();
		foreach ($obj['data'] as $i => $v) {
			$hgid = Group::getHumanGid($v->gid);
			$obj['data'][$i]->gid = $hgid;
		}
		echo json_encode($obj);
	}

	public function listItem($ids, $isPrintable = false){
		$obj = parent::listItem($ids);
		$obj['data']->gid = Group::getHumanGid($obj['data']->gid);
		echo json_encode($obj);
	}
}
