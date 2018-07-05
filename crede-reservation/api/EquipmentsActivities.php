<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;

class EquipmentsActivities extends Module {

	public $tableName = 'equipments_activities';
	public $orderBy = 'activity';
	public $moduleName = 'equipments_activities';
	public $primaryKeysName = ['equipment','activity'];
	public $filteredBy = ['activity' => ''];

	function __construct($obj){
		$this->filteredBy['activity'] = $obj->filteredBy['activity'];
		parent::__construct($obj);
	}

	function listAll($isPrintable = false){
		$sql = <<<EOF
SELECT 
	activities.id AS activity,
	equipments.id AS equipment,
	activities.description AS activitydesc,
	equipments.name AS equipmentname
FROM equipments_activities
INNER JOIN equipments ON equipments.id = equipments_activities.equipment
INNER JOIN activities ON activities.id = equipments_activities.activity
WHERE activity = :activity
EOF;
		$this->listQuery($sql,$this->filteredBy, $isPrintable);
	}

	function insertItem($data, $isPrintable = false){
		try {
			$resp = $this->listQuery(
				'SELECT * FROM activities WHERE id = :activity',
				array('activity' => $data['activity'])
			);
			$result = $this->hasTimestampChock('equipment', $data['equipment'],
				'inittime', $resp[0]->inittime, 'finaltime', $resp[0]->finaltime,
				NULL,'INNER JOIN activities ON activity = activities.id'
			);
			if(is_array($result)){
				if(count($result) == 0){
					parent::insertItem($data, $isPrintable);
				} else {
					echo json_encode(array('status' => 'shock', 'data' => $result));
				}
			} else echo json_encode(array('status' => 'error', 'data' => $result));
		} catch(Exception $e){
			if($isPrintable) array('status' => 'error', 'data' => $e->getMessage());
	      	return false;
		}
	}


}

 ?>