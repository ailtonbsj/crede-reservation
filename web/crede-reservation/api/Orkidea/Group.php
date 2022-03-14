<?php 

namespace Orkidea\Core;

class Group {

	public static $groupSchema = [
		'SEDUC' => [
			'CREDE' => [
				'Escola' => []
			]
		]
	];

	public static $totalLevels = 4;
	public static $maxHomeDecimalByGroup = 3; //max 1000 groups

	function __construct($obj){
		echo self::getSchema($obj->gid);
	}

	function getSchema($father){
		$schema = self::$groupSchema;
		if($father != ''){
			$tk = explode('/', $father);
			foreach ($tk as $key) {
				$schema = $schema[$key];
			}
		}
		return json_encode($schema);
	}

	public static function getHumanGid($gid){
		$totalLevels = self::$totalLevels;
		$maxHomeDecimalByGroup = self::$maxHomeDecimalByGroup;
		$gid = "$gid";
		$gid = str_pad($gid,$totalLevels * $maxHomeDecimalByGroup,'0',STR_PAD_LEFT);
		$schema = self::$groupSchema;
		$hier = '';
		for($i = 0; $i < $totalLevels; $i++){
			$index = intval(substr($gid, $i*$maxHomeDecimalByGroup,$maxHomeDecimalByGroup));
			if($index == 0) break;
			$key = array_keys($schema)[$index-1];
			$schema = $schema[$key];
			$hier .= '/' . $key;
		}
		return substr($hier,1);
	}

	public static function getEndGid($gid){
		$gid_f = $gid;
		for($i = strlen($gid)-1; $i > 0; $i--){
			if($gid[$i] != '0') break;
			$gid_f[$i] = '9';		
		}
		return $gid_f;
	}

	public static function getGid($hier){
		$schema = self::$groupSchema;
		$totalLevels = self::$totalLevels;
		$maxHomeDecimalByGroup = self::$maxHomeDecimalByGroup;
		$levels = explode('/',$hier);
		$gid = '';
		foreach ($levels as $part) {
			$num = 1;
			foreach ($schema as $name => $children) {
				if($name == $part){
					$schema = $children;
					$gid .= str_pad(
						$num,$maxHomeDecimalByGroup,'0', STR_PAD_LEFT);
					break;
				}
				$num++;
			}
		}
		$gid .= str_pad('',
			($totalLevels - count($levels))*$maxHomeDecimalByGroup,'0');
		return $gid;
	}
}

 ?>