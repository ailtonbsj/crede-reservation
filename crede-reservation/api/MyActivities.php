<?php 

// namespace CredeReservation;

// include "Orkidea/Module.php";

// use Orkidea\Core\Module;
// use Orkidea\Core\Authenticator;

// class MyActivities extends Module {

// 	public $tableName = 'activities';
// 	public $orderBy = 'inittime DESC';
// 	public $moduleName = 'my_activities';
// 	public $filteredBy = ['owner' => ''];

// 	function listAll($isPrintable = false){
// 		$sql = <<<EOFA
// SELECT
// 	activities.id, description,
// 	inittime, finaltime,
// 	places.name AS place, activities.owner
// FROM public.activities
// INNER JOIN places ON activities.place = places.id
// WHERE activities.owner = :owner
// ORDER BY inittime DESC
// EOFA;
// 		$this->listQuery($sql,$this->filteredBy, $isPrintable);
// 	}

// 	function listItem($obj, $isPrintable = false){
// 		$sql = <<<EOFB
// SELECT
// 	activities.*,
// 	places.name AS placename
// FROM activities
// INNER JOIN places ON activities.place = places.id
// WHERE activities.id = :id
// EOFB;
// 		echo json_encode(array(
// 			'status' => 'success',
// 			'data' => $this->listQuery($sql,$obj, false)[0]
// 		));
// 	}

// 	function __construct($obj){
// 		$this->auth = Authenticator::hasAuthority();
// 		$this->filteredBy = ['owner' => $this->auth];
// 		if($obj->action == 'insertItem') {
// 			$obj->obj['owner'] = $this->auth;
// 		}
// 		parent::__construct($obj);
// 	}

// }

/////TRYING

namespace CredeReservation;

include "Activities.php";

use Orkidea\Core\Authenticator;

class MyActivities extends Activities {

 	public $moduleName = 'my_activities';
 	public $filteredBy = ['owner' => ''];

	function listAll($isPrintable = false){
		$sql = <<<EOFA
SELECT
	activities.id, description,
	inittime, finaltime,
	places.name AS place, activities.owner
FROM public.activities
INNER JOIN places ON activities.place = places.id
WHERE activities.owner = :owner
ORDER BY inittime DESC
EOFA;
		$this->listQuery($sql,$this->filteredBy, $isPrintable);
	}

	function __construct($obj){
		$this->auth = Authenticator::hasAuthority();
		$this->filteredBy = ['owner' => $this->auth];
		if($obj->action == 'insertItem') {
			$obj->obj['owner'] = $this->auth;
		}
		parent::__construct($obj);
	}

}

 ?>