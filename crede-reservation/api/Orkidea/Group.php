<?php 

namespace Orkidea\Core;

class Group {

	function __construct($obj){
		// echo "\n\n" . self::getGid(self::$groupSchema,'MEC');
		// echo "\n\n" . self::getHumanGid(self::$groupSchema,1000000000);
		// echo "\n\n" . self::getGid(self::$groupSchema,'MEC/SEDUC-CE');
		// echo "\n\n" . self::getHumanGid(self::$groupSchema,1001000000);
		// echo "\n\n" . self::getGid(self::$groupSchema,'MEC/SEDUC-CE/Crede17');
		// echo "\n\n" . self::getHumanGid(self::$groupSchema,1001001000);
		// echo "\n\n" . self::getGid(self::$groupSchema,'MEC/SEDUC-CE/Crede17/CERE');
		// echo "\n\n" . self::getHumanGid(self::$groupSchema,1001001001);
		// echo "\n\n" . self::getGid(self::$groupSchema,'MEC/SEDUC-CE/Crede17/EEEP Ico');
		// echo "\n\n" . self::getHumanGid(self::$groupSchema,1001001002);
		// echo "\n\n" . self::getGid(self::$groupSchema,'MEC/SEDUC-CE/Crede20');
		// echo "\n\n" . self::getHumanGid(self::$groupSchema,1001002000);
		// echo "\n\n" . self::getGid(self::$groupSchema,'MEC/SEDUC-CE/Crede20/Adolf');
		// echo "\n\n" . self::getHumanGid(self::$groupSchema,1001002001);
		// echo "\n\n" . self::getGid(self::$groupSchema,'MEC/SEDUC-CE/Crede20/Moama');
		// echo "\n\n" . self::getHumanGid(self::$groupSchema,1001002002);
		// echo "\n\n" . self::getGid(self::$groupSchema,'MEC/SEDUC-PB');
		// echo "\n\n" . self::getHumanGid(self::$groupSchema,1002000000);
		// echo "\n\n" . self::getGid(self::$groupSchema,'MEC/SEDUC-PB/GRE01');
		// echo "\n\n" . self::getHumanGid(self::$groupSchema,1002001000);
		// echo "\n\n" . self::getGid(self::$groupSchema,'MEC/SEDUC-PB/GRE02');
		// echo "\n\n" . self::getHumanGid(self::$groupSchema,1002002000);
		// echo "\n\n" . self::getGid(self::$groupSchema,'MEC/SEDUC-PB/GRE02/EEM Jave');
		// echo "\n\n" . self::getHumanGid(self::$groupSchema,1002002001);
		echo self::getSchema($obj->gid);
	}

	public static $groupSchema = [
		'MEC' => [
			'SEDUC-CE' => [
				'Crede17' => [
					'CERE' => [],
					'EEEP Ico' => []
				],
				'Crede20' => [
					'Adolf' => [],
					'Moama' => []
				]
			],
			'SEDUC-PB' => [
				'GRE01' => [],
				'GRE02' => [
					'EEM Jave' => []
				]
			]
		]
	];

	public static $totalLevels = 4;
	public static $maxHomeDecimalByGroup = 3; //max 1000 groups

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

	function getGid($hier){
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

	function getHumanGid($gid){
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

	function getEndGid($gid){
		$gid_f = $gid;
		for($i = strlen($gid)-1; $i > 0; $i--){
			if($gid[$i] != '0') break;
			$gid_f[$i] = '9';		
		}
		return $gid_f;
	}
}

 ?>