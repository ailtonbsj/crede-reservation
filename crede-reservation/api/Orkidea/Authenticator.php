<?php 

namespace Orkidea\Core;

include "Storage.php";

class Authenticator extends Storage {

	public $tableName = "users";
	public $orderBy = "name";
	public $primaryKeysName = ['name'];
	
	function __construct($post) {
		parent::__construct();

		if (isset($post->name)) {
			$user = $this->listItem(array('name' => $post->name));
			if($user['status'] == 'success'){
				if($user['data']->pass == $post->pass) {
					session_start();
					$_SESSION['user'] = $post->name;
					$_SESSION['gid'] = $user['data']->gid;
					echo json_encode(array('status' => 'success'));
					return 0;
				}
			}
		}
		$this->denied();
	}

	function denied() {
		Authenticator::clearSession();
		echo json_encode(array('status' => 'denied'));
	}

	public static function clearSession() {
		session_start();
		$_SESSION = array();
		session_destroy();
	}

	public static function logout() {
		Authenticator::clearSession();
		echo json_encode(array('status' => 'success'));
	}

	public static function hasAuthority(){
		session_start();
		if(isset($_SESSION['user'])) return $_SESSION['user'];
		return false;
	}
}

 ?>