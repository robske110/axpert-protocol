<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol;

abstract class InputVoltageRange{
	const RANGE_APPLIANCE = 1;
	const RANGE_UPS = 2;
	
	public const INPUT_VOLTAGE_RANGES = [
		self::RANGE_APPLIANCE => "APPLIANCE",
		self::RANGE_UPS => "UPS"
	];
}