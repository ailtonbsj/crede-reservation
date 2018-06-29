<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;
use Orkidea\Core\Authenticator;

class MyActivities extends Module {

	public $tableName = 'activities';
	public $orderBy = 'id';
	public $moduleName = 'my_activities';

	function __construct($obj){
		$this->auth = Authenticator::hasAuthority();
		if($obj->action == 'insertItem') {
			$obj->obj['owner'] = $this->auth;
		}
		parent::__construct($obj);
	}

	function listAll($isPrintable = false){
	$sql = <<<EOF
SELECT
	activities.id, description,
	inittime, finaltime,
	places.name AS place, activities.owner
FROM public.activities
INNER JOIN places ON activities.place = places.id
WHERE activities.owner = :owner
EOF;
		$this->listQuery($sql,array('owner' => $this->auth), $isPrintable);
	}

}

 ?>