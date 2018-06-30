<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;

class EquipmentsActivities extends Module {

	public $tableName = 'equipments_activities';
	public $orderBy = 'activity';
	public $moduleName = 'equipments_activities';
	public $primaryKeysName = ['equipment','activity'];

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
EOF;
		$this->listQuery($sql,[], $isPrintable);
	}	
}

 ?>