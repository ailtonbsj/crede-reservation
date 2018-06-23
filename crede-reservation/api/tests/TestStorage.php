<?php 

namespace Orkidea\Core;

include "Storage.php";

class Users extends Storage {

	public $tableName = 'users';
	public $orderBy = 'name';
	public $primaryKeyName = 'name';
	
	function __construct () {
		parent::__construct();
		$meuId = $this->insertItem('{"name":"paulo","pass":"123456","fullname":"Paulo"}', true);
		//echo $this->listItem('paulo');
		//echo $this->updateItem('{"name":"paulo","pass":"123abc","fullname":"Paulo Cezar"}');
		//$this->listAll(true);
		//$this->removeItem("paulo");
		$this->removeItem(json_decode($meuId));
	}
}
new Users();

echo "\n\n-------------------\n\n";

class Places extends Storage {

	public $tableName = 'places';
	public $orderBy = 'owner';

	function __construct () {
		parent::__construct();
		$meuId = $this->insertItem('{"name":"NTE","owner":"crede17"}', true);
		//$this->listItem('2',true);
		//$this->updateItem('{"id":"2","name":"NFC","owner":"CREDE17"}', true);
		//$this->listAll(true);
		$this->removeItem(json_decode($meuId));
	}
}
new Places();

 ?>