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
				if($user['data']->pass == hash('md5', $post->pass)) {
					if(!isset($_SESSION)) session_start();
					$_SESSION['user'] = $post->name;
					$_SESSION['gid'] = $user['data']->gid;
					echo json_encode(array('status' => 'success'));
					return 0;
				}
			} else if($post->name == 'admin') {
				$sql = "";
			}
		}
		$this->denied();
	}

	function denied() {
		echo json_encode(array('status' => 'denied'));
	}

	public static function clearSession() {
		if(!isset($_SESSION)) session_start();
		$_SESSION = array();
		session_destroy();
	}

	public static function logout() {
		Authenticator::clearSession();
		echo json_encode(array('status' => 'success'));
	}

	public static function hasAuthority(){
		if(!isset($_SESSION)) session_start();
		if(isset($_SESSION['user'])) return $_SESSION['user'];
		return false;
	}
}

 ?>