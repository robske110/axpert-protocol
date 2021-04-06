<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol;

abstract class ChargerSourcePriority{
	const UTILITY_FIRST = 0;
	const SOLAR_FIRST = 1;
	const SOLAR_AND_UTILITY = 2;
	const ONLY_SOLAR = 3;
	
	public const CHARGER_SOURCE_PRIORITIES = [
		self::UTILITY_FIRST => "Utility first",
		self::SOLAR_FIRST => "Solar first",
		self::SOLAR_AND_UTILITY => "Solar + Utility",
		self::ONLY_SOLAR => "Only solar charging permitted"
	];
}