<?php 

namespace Orkidea\Core;

include 'api/Orkidea/Authenticator.php';

use PDO;

class ModuleLoader extends Storage {

  public $tableName = 'permissions';
  public $orderBy = 'name';
  public $moduleName = 'permissions';
  public static $modules;

  function listModulesByUser($username) {
    try {
      $sql = "SELECT * FROM permissions WHERE username = :username";
      $stm = $this->connection->prepare($sql);
      $stm->execute(
        array(
          'username' => $username
        )
      );
      //echo $stm->debugDumpParams();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
      echo $e->getMessage();
      return false;
    }
  }

  function loadViews () {
    foreach ($this->modules as $modulePermission) {
      if($modulePermission->r) include "views/{$modulePermission->module}-table.html";
      if($modulePermission->c) include "views/{$modulePermission->module}-form.html";
    }
  }

  function loadControllers () {
    echo "<script src='controllers/Orkidea/Persistence.js'></script>";
    echo "<script src='controllers/Orkidea/Module.js'></script>";
    foreach ($this->modules as $modulePermission) {
      echo "<script src='controllers/".ucfirst($modulePermission->module).".js'></script>";
    }
  }

  function __construct () {
    parent::__construct(); 
    $username = Authenticator::hasAuthority();
    if(!$username) {
      header('location: index.html');
      exit();
    }
    $this->modules = $this->listModulesByUser($username);
    if(!$this->modules) header('location: index.html');
  }

}

 ?>