<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class DeviceModeResponse extends Response{
	public string $deviceMode;
	
	const POWER_ON = "P";
	const STANDBY = "S";
	const GRID = "L";
	const BATTERY = "B";
	const FAULT = "F";
	const POWER_SAVING = "H";
	
	const MODES = [
		self::POWER_ON => "POWER ON",
		self::STANDBY => "STANDBY",
		self::GRID => "GRID",
		self::BATTERY => "BATTERY",
		self::FAULT => "FAULT",
		self::POWER_SAVING => "POWER SAVING"
	];
	
	protected function decode(FieldStream $dataStream){
		$this->deviceMode = $dataStream->get();
	}
	
	public function info(){
		echo("mode: ".self::MODES[$this->deviceMode].PHP_EOL);
	}
}