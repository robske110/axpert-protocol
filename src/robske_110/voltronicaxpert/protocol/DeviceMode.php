<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol;

abstract class DeviceMode{
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
}