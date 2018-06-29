<?php 

namespace Orkidea\Core;

include "Authenticator.php";

use Exception;

abstract class Module extends Storage {

	function __construct ($post) {
		parent::__construct();

		if(!isset($this->moduleName)) 
			throw new Exception(get_class($this) . ' variable required $moduleName');

		$permissions = $this->hasPermission();

		if($permissions) {

			if( $post->action == 'insertItem' && $permissions->c ) {
				$this->insertItem($post->obj, true);
			} elseif ( $post->action == 'listAll' && $permissions->r ) {
				$this->listAll(true);
			} elseif ( $post->action == 'listItem' && $permissions->r ) {
				$this->listItem($post->obj, true);
			} elseif ( $post->action == 'filterByColumns' && $permissions->r ) {
				$this->filterByColumns($post->obj, true);
			} elseif ( $post->action == 'updateItem' && $permissions->u ) {
				$this->updateItem($post->obj, true);
			} elseif ( $post->action == 'removeItem' && $permissions->d ) {
				$this->removeItem($post->obj, true);
			} elseif ( $post->action == 'removeItensFree' && $permissions->d ) {
				$this->removeItensFree(true);
			} elseif ( $post->action == 'listPermissions' ) {
				echo json_encode(array('status' => 'success', 'data' => $permissions));
			} else echo json_encode(array('status' => 'denied'));
			
		} else echo json_encode(array('status' => 'denied'));
	}

	function hasPermission() {
		try {
			$sql = "SELECT * FROM permissions WHERE username = :username AND module = :module";
			$stm = $this->connection->prepare($sql);
			$stm->execute(
				array(
					'username' => Authenticator::hasAuthority(),
					'module' => $this->moduleName
				)
			);
			//echo $stm->debugDumpParams();
			$row = $stm->fetchObject();
			if(!$row) return false;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		return $row;
	}
}

 ?>