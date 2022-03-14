<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;
use Orkidea\Core\Authenticator;

class Activities extends Module {

	public $tableName = 'activities';
	public $orderBy = 'activities.gid,inittime DESC';
	public $moduleName = 'activities';

	function listAll($isPrintable = false){
		$filterGid = $this->filterGid($this->tableName);
		$sql = <<<EOF
SELECT
	activities.id, description,
	inittime, finaltime,
	places.name AS place,
	places.owner AS placeown,
	activities.owner,
	activities.gid
FROM public.activities
INNER JOIN places ON activities.place = places.id
WHERE{$filterGid}
ORDER BY {$this->orderBy}
EOF;
		$this->listQuery($sql,[], $isPrintable);
	}

	function listItem($obj, $isPrintable = false){
		$sql = <<<EOF
SELECT
	activities.*,
	places.name AS placename,
	places.owner AS placeown
FROM activities
INNER JOIN places ON activities.place = places.id
WHERE activities.id = :id
EOF;
		echo json_encode(array(
			'status' => 'success',
			'data' => $this->listQuery($sql,$obj, false)[0]
		));
	}

	function insertItem($data, $isPrintable = false){
		$result = $this->hasTimestampChock('place', $data['place'],
			'inittime', $data['inittime'], 'finaltime', $data['finaltime']);
		if(is_array($result)){
			if(count($result) == 0){
				$sql = "SELECT * FROM places WHERE id = '{$data['place']}'";
				$res = $this->listQuery($sql, [], false);
				$oldGid = $this->gid;
				$this->gid = $res[0]->gid;
				parent::insertItem($data, $isPrintable);
				$this->gid = $oldGid;
			} else {
				echo json_encode(array('status' => 'shock', 'data' => $result));
			}
		} else echo json_encode(array('status' => 'error', 'data' => $result));
	}

	function updateItem($data, $isPrintable = false){
		$result = $this->hasTimestampChock('place', $data['place'],
			'inittime', $data['inittime'], 'finaltime', $data['finaltime'],
			array('id' => $data['id']));
		if(is_array($result)){
			if(count($result) == 0){
				$sql = "SELECT * FROM places WHERE id = '{$data['place']}'";
				$res = $this->listQuery($sql, [], false);
				$oldGid = $this->gid;
				$this->gid = $res[0]->gid;
				parent::updateItem($data, $isPrintable);
				$this->gid = $oldGid;
			} else {
				echo json_encode(array('status' => 'shock', 'data' => $result));
			}
		} else echo json_encode(array('status' => 'error', 'data' => $result));
	}
}

 ?>