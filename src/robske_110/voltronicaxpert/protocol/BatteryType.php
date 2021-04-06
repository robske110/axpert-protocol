<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol;

abstract class BatteryType{
	const AGM = 1;
	const FLOODED = 2;
	const USER = 3;
	
	public const BATTERY_TYPES = [
		self::AGM => "AGM",
		self::FLOODED => "FLOODED",
		self::USER => "USER"
	];
}