<?php 

namespace Orkidea\Core;

include "Config.php";

use PDO, Exception;

abstract class Storage {

	public $connection;
	public $primaryKeysName = ['id'];
	public $filteredBy = [];
	public $gid = '';

	function __construct () {
		if(!isset($this->tableName)) 
			throw new Exception(get_class($this) . ' must have a $tableName');
		if(!isset($this->orderBy)) 
			throw new Exception(get_class($this) . ' must have a $orderBy');
		$this->connectDb(Config::getDbCredentials());
		if($this->gid == ''){
			if(!isset($_SESSION)) session_start();
			if(isset($_SESSION['gid'])) $this->gid = "".$_SESSION['gid'];
		}
	}

	function connectDb ($dbCredentials) {
		try {
			if ($dbCredentials['type'] == 'pg')
				$db = "pgsql:dbname={$dbCredentials['name']};host={$dbCredentials['host']}";
			else $db = "mysql:host={$dbCredentials['host']};dbname={$dbCredentials['name']};charset=utf8";
			$this->connection = new PDO($db, $dbCredentials['user'], $dbCredentials['pass']);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
			echo $e->getMessage();
			exit();
		}
	}

	function insertItem ($dataOfColumns, $isPrintable = false) {
		try {
			$dataOfColumns['gid'] = $this->gid;

			$keys = array_keys($dataOfColumns);
			$labels = join(',', $keys);
			$values = ':'.join(',:', $keys);

			if($this->primaryKeysName[0] == 'id') {
				$labels .= ','.$this->primaryKeysName[0];
				if (Config::getDbCredentials()['type'] == 'pg') {
					$values .= ',DEFAULT';
				} else {
					$values .= ',NULL';
				}			
			}
			$sql = "INSERT INTO {$this->tableName} ($labels) VALUES ($values)";
			$stm = $this->connection->prepare($sql);
			//echo $stm->debugDumpParams();
			$result = $stm->execute((array) $dataOfColumns);
			if($result) {
				if($this->primaryKeysName[0] == 'id')
					$resp = array('status' => 'success', 'data' => $this->connection->lastInsertId());
				else {
					$valOfKeys = array_map(
						function($pkn) use (&$dataOfColumns){
							return $dataOfColumns[$pkn];
						},
						$this->primaryKeysName
					);
					$resp = array('status' => 'success', 'data' => $valOfKeys);
				}
				if($isPrintable) echo json_encode($resp);
				return $resp;
			} else throw new Exception("Error to insert data");
		} catch (Exception $e) {
			$resp = array('status' => 'error', 'data' => $e->getMessage());
			echo json_encode($resp);
			exit();
		}	
	}

	function updateItem($dataOfColumns, $isPrintable = false) {
		try {
			$dataOfColumns['gid'] = $this->gid;
			//labels
			$labels = '';
			foreach ($dataOfColumns as $k => $v) {
				$labels = "$k=:$k,$labels";
			}
			$labels = trim($labels,',');
			//filter pk
			$keyNames = $this->primaryKeysName;
			$first = array_shift($keyNames);
			$frag = array_reduce(
				$keyNames,
				function($v1, $v2){return "$v1 AND $v2 = :$v2";},
				"$first = :$first"
			);
			$sql = "UPDATE {$this->tableName} SET {$labels} WHERE $frag";
			$stm = $this->connection->prepare($sql);
			//echo $stm->debugDumpParams();
			$stm->execute((array) $dataOfColumns);
			$valOfKeys = array_map(
				function($pkn) use (&$dataOfColumns){
					return $dataOfColumns[$pkn];
				},
				$this->primaryKeysName
			);
			$resp = array('status' => 'success', 'data' => $valOfKeys);
			if($isPrintable) echo json_encode($resp);
			return $resp;
		} catch (Exception $e) {
			$resp = array('status' => 'error', 'data' => $e->getMessage());
			echo json_encode($resp);
			exit();
		}
	}

	function generateWhere($filter){
		$keyNames = array_keys($filter);
		$first = array_shift($keyNames);
		return array_reduce(
			$keyNames,
			function($v1, $v2){return "$v1 AND $v2 = :$v2";},
			"$first = :$first"
		);
	}

	function listAll($isPrintable = false) {
		try {
			$frag = 'WHERE ';
			if(count($this->filteredBy) > 0) $frag .= $this->generateWhere($this->filteredBy) . ' AND ';
			$frag .= self::filterGid($this->tableName);
			$sql = "SELECT * FROM {$this->tableName} $frag ORDER BY {$this->orderBy}";
			$stm = $this->connection->prepare($sql);
			//echo $stm->debugDumpParams();
			$stm->execute($this->filteredBy);

			$lista = array();
			while ($row = $stm->fetchObject()) {
				array_push($lista, $row);
			}
			$resp = array('status' => 'success', 'data' => $lista);
			if($isPrintable) echo json_encode($resp);
			return $resp;
		} catch (Exception $e) {
			$resp = array('status' => 'error', 'data' => $e->getMessage());
			echo json_encode($resp);
			exit();
		}
	}

	function listQuery($sql, $columns, $isPrintable = false){
	    try {
	      $stm = $this->connection->prepare($sql);
	      $stm->execute($columns);
	      //echo $stm->debugDumpParams();
	      $resp = $stm->fetchAll(PDO::FETCH_OBJ);
	      if($isPrintable)
	      	echo json_encode(array('status' => 'success', 'data' => $resp));
	      return $resp;
	    } catch (Exception $e) {
	      if($isPrintable) array('status' => 'error', 'data' => $e->getMessage());
	      return false;
	    }
	}

	function hasTimestampChock($filterLabel, $filterValue, $initLabel,
		$initValue, $finalLabel, $finalValue, $primaryKeys = NULL, $innerJoin = ''){

	    try {
	      if(strtotime($initValue) > strtotime($finalValue))
	      	throw new Exception('wrong interval');
		  $sql = "SELECT * FROM {$this->tableName} $innerJoin WHERE $filterLabel = :filterValue AND NOT ( ($initLabel >= :initValue AND $initLabel >= :finalValue) OR ($finalLabel <= :initValue AND $finalLabel <= :finalValue) )";
		  $columns = array(
	      	'filterValue' => $filterValue,
	      	'initValue' => $initValue,
	      	'finalValue' => $finalValue
	      );
		  if(isset($primaryKeys)){
		  	$sql .= 'AND NOT (' . $this->generateWhere($primaryKeys) . ')';
		  	$columns = array_merge($columns, $primaryKeys);
		  }
	      $stm = $this->connection->prepare($sql);
	      $stm->execute($columns);
	      //echo $stm->debugDumpParams();
	      $resp = $stm->fetchAll(PDO::FETCH_OBJ);
	      return $resp;
	    } catch (Exception $e) {
	      return $e->getMessage();
	    }
	}

	function complexFilter($dataOfColumns, $isPrintable = false, $orLogic = false, $likeCompare = false) {
		$conector = $orLogic ? ' OR ' : ' AND ';
		try {
			if(count($dataOfColumns) < 1) throw new Exception('no filter found!');
			$sql = "SELECT * FROM {$this->tableName} WHERE ";
			$isFirst = true;
			foreach ($dataOfColumns as $colunm => $value) {
				$isFirst ? $isFirst = false : $sql .= $conector;
				$sql .= $likeCompare ? "{$colunm} LIKE '%{$value}%'" : "{$colunm} = '{$value}'";
			}
			$stm = $this->connection->prepare($sql);
			$stm->execute();
			$rows = $stm->fetchAll(PDO::FETCH_OBJ);
			if(!$rows) throw new Exception('there is no record on table!');
			$resp = array('status' => 'success', 'data' => $rows);
		} catch (Exception $e) {
			$resp = array('status' => 'error', 'data' => $e->getMessage());
		}
		if($isPrintable) echo json_encode($resp);
		return $resp;
	}

	function filterByColumns($dataOfColumns, $isPrintable = false) {
		return $this->complexFilter($dataOfColumns, $isPrintable);
	}

	// function searchFilter() {}

	public function listItem($ids, $isPrintable = false) {
		try {
			$keyNames = $this->primaryKeysName;
			$first = array_shift($keyNames);
			$frag = array_reduce(
				$keyNames,
				function($v1, $v2){return "$v1 AND $v2 = :$v2";},
				"$first = :$first"
			);
			$sql = "SELECT * FROM {$this->tableName} WHERE " . $frag;
			$stm = $this->connection->prepare($sql);
			//echo $stm->debugDumpParams();
			$stm->execute($ids);
			$row = $stm->fetchObject();
			if(!$row) throw new Exception('there is no record on table!');
			$resp = array('status' => 'success', 'data' => $row);
		} catch (Exception $e) {
			$resp = array('status' => 'error', 'data' => $e->getMessage());
		}
		if($isPrintable) echo json_encode($resp);
		return $resp;
	}

	function removeItem($pks, $isPrintable = false) {
		try {
			$keyNames = $this->primaryKeysName;
			$first = array_shift($keyNames);
			$frag = array_reduce(
				$keyNames,
				function($v1, $v2){return "$v1 AND $v2 = :$v2";},
				"$first = :$first"
			);
			$sql = "DELETE FROM {$this->tableName} WHERE " . $frag;
			$stm = $this->connection->prepare($sql);
			$resp = $stm->execute($pks);
			//echo $stm->debugDumpParams();
			$resp = array('status' => 'success');
		} catch (Exception $e) {
			$resp = array('status' => 'error', 'data' => $e->getMessage());
		}
		if($isPrintable) echo json_encode($resp);
		return $resp;
	}

	function filterGid($tableName){
		$gid = $this->gid;
		$gid_f = $gid;
		for($i = strlen($gid)-1; $i > 0; $i--){
			if($gid[$i] != '0') break;
			$gid_f[$i] = '9';		
		}
		return " {$tableName}.gid >= $gid AND {$tableName}.gid <= $gid_f";
	}

	function removeItensFree($isPrintable = false) {
		try {
			$noFree = [];
			foreach ($this->listAll()['data'] as $item) {
					if($this->removeItem($item->id)['status'] == 'error')
						array_push($noFree, $item->id);
			}
			$resp = array('status' => 'success', 'data' => $noFree);
		} catch (Exception $e) {
			$resp = array('status' => 'error', 'data' => $e->getMessage());
		}
		if($isPrintable) echo json_encode($resp);
		return $resp;
	}

}

 ?>