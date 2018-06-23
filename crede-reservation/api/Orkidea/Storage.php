<?php 

namespace Orkidea\Core;

include "Config.php";

use PDO, Exception;

abstract class Storage {

	public $connection;
	public $primaryKeyName = 'id';

	function __construct () {
		if(!isset($this->tableName)) 
			throw new Exception(get_class($this) . ' must have a $tableName');
		if(!isset($this->orderBy)) 
			throw new Exception(get_class($this) . ' must have a $orderBy');
		$this->connectDb(Config::$dbCredentials);
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
			$labels = '';
			$values = '';
			foreach ($dataOfColumns as $k => $v) {
				$labels = "$k,$labels";
				$values = ":$k,$values";
			}
			if($this->primaryKeyName == 'id') {
				$labels .= $this->primaryKeyName;
				if (Config::$dbCredentials['type'] == 'pg') {
					$values .= 'DEFAULT';
				} else {
					$values .= 'NULL';
				}			
			}
			$labels = trim($labels,",");
			$values = trim($values,",");
			$sql = "INSERT INTO {$this->tableName} ($labels) VALUES ($values)";
			$stm = $this->connection->prepare($sql);
			//echo $stm->debugDumpParams();
			$result = $stm->execute((array) $dataOfColumns);
			if($result) {
				if($this->primaryKeyName == 'id')
					$resp = array('status' => 'success', 'data' => $this->connection->lastInsertId());
				else $resp = array('status' => 'success', 'data' => $dataOfColumns[$this->primaryKeyName]);
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
			$labels = '';
			foreach ($dataOfColumns as $k => $v) {
				$labels = "$k=:$k,$labels";
			}
			$labels = trim($labels,',');
			$sql = "UPDATE {$this->tableName} SET {$labels} WHERE {$this->primaryKeyName} = :{$this->primaryKeyName}";
			$stm = $this->connection->prepare($sql);
			//echo $stm->debugDumpParams();
			$stm->execute((array) $dataOfColumns);
			$resp = array('status' => 'success', 'data' => $dataOfColumns[$this->primaryKeyName]);
			if($isPrintable) echo json_encode($resp);
			return $resp;
		} catch (Exception $e) {
			$resp = array('status' => 'error', 'data' => $e->getMessage());
			echo json_encode($resp);
			exit();
		}
	}

	function listAll($isPrintable = false) {
		try {
			$sql = "SELECT * FROM {$this->tableName} ORDER BY {$this->orderBy} ASC";
			$stm = $this->connection->prepare($sql);
			//echo $stm->debugDumpParams();
			$stm->execute();

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

	function searchFilter() {}

	function listItem($id, $isPrintable = false) {
		try {
			$sql = "SELECT * FROM {$this->tableName} WHERE {$this->primaryKeyName} = :id";
			$stm = $this->connection->prepare($sql);
			$stm->execute(array('id' => $id));

			$row = $stm->fetchObject();
			if(!$row) throw new Exception('there is no record on table!');
			$resp = array('status' => 'success', 'data' => $row);
		} catch (Exception $e) {
			$resp = array('status' => 'error', 'data' => $e->getMessage());
		}
		if($isPrintable) echo json_encode($resp);
		return $resp;
	}

	function removeItem($id, $isPrintable = false) {
		try {
			$sql = "DELETE FROM {$this->tableName} WHERE {$this->primaryKeyName} = :id";
			$stm = $this->connection->prepare($sql);
			$resp = $stm->execute(array('id' => $id));
			//echo $stm->debugDumpParams();
			//if ($resp) {
			$resp = array('status' => 'success');
		} catch (Exception $e) {
			$resp = array('status' => 'error', 'data' => $e->getMessage());
		}
		if($isPrintable) echo json_encode($resp);
		return $resp;
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