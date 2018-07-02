<?php 

namespace CredeReservation;

include "Orkidea/Module.php";

use Orkidea\Core\Module;
use Orkidea\Core\Authenticator;

class Activities extends Module {

	public $tableName = 'activities';
	public $orderBy = 'id';
	public $moduleName = 'activities';

	function listAll($isPrintable = false){
		$sql = <<<EOF
SELECT
	activities.id, description,
	inittime, finaltime,
	places.name AS place, activities.owner
FROM public.activities
INNER JOIN places ON activities.place = places.id
EOF;
		$this->listQuery($sql,[], $isPrintable);
	}

	function listItem($obj, $isPrintable = false){
		$sql = <<<EOF
SELECT
	activities.*,
	places.name AS placename
FROM activities
INNER JOIN places ON activities.place = places.id
WHERE activities.id = :id
EOF;
		echo json_encode(array(
			'status' => 'success',
			'data' => $this->listQuery($sql,$obj, false)[0]
		));
	}

	function __construct($obj){
		$this->auth = Authenticator::hasAuthority();
		if($obj->action == 'insertItem') {
			$obj->obj['owner'] = $this->auth;
		}
		parent::__construct($obj);
	}

}

 ?>