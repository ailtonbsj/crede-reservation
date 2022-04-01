<?php 

namespace Orkidea\Core;

//session_start();
//include '../../strings.php';
include 'api/Orkidea/Authenticator.php';

use PDO;

class ModuleLoader extends Storage {

  public $tableName = 'permissions';
  public $orderBy = 'name';
  public $moduleName = 'permissions';
  public static $modules;

  function __construct () {
    parent::__construct(); 
    $username = Authenticator::hasAuthority();
    if(!$username) {
      header('location: ./');
      exit();
    }
    ModuleLoader::$modules = $this->listModulesByUser($username);
    if(!ModuleLoader::$modules) {
      if(isset($_SESSION)) session_destroy();
      header('location: ./');
    }
  }

  function listModulesByUser($username) {
    try {
      $sql = "SELECT * FROM permissions WHERE username = :username ORDER BY priority DESC";
      $stm = $this->connection->prepare($sql);
      $stm->execute(
        array(
          'username' => $username
        )
      );
      //echo $stm->debugDumpParams();
      return $stm->fetchAll(PDO::FETCH_OBJ);
    } catch (\Exception $e) {
      echo $e->getMessage();
      return false;
    }
  }

  function loadViews () {
    global $S;
    foreach (ModuleLoader::$modules as $modulePermission) {
      if(Config::$modules[$modulePermission->module] == 'standard'){
        $formated = str_replace('_', '', $modulePermission->module);

        if($modulePermission->r) include "views/{$formated}-table.php";
        if($modulePermission->c) include "views/{$formated}-form.php";
        $viewDetails = "views/{$formated}-detail.php";
        if($modulePermission->r) if(file_exists($viewDetails)) include $viewDetails;
      }
    }
  }

  function loadControllers () {
    echo "<script src='controllers/Orkidea/Persistence.js'></script>";
    echo "<script src='controllers/Orkidea/Module.js'></script>";
    foreach (ModuleLoader::$modules as $modulePermission) {
      $nameModule = str_replace('_', ' ', $modulePermission->module);
      $formated = str_replace(' ', '', ucwords($nameModule));
      echo "<script src='controllers/".$formated.".js'></script>";
    }
    // echo "<script src='controllers/Calendar.js'></script>";
  }

}

 ?>