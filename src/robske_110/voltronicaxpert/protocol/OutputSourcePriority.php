<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol;

abstract class OutputSourcePriority{
	const UTILITY_FIRST = 0;
	const SOLAR_FIRST = 1;
	const SBU_FIRST = 2;
	
	public const OUTPUT_SOURCE_PRIORITIES = [
		self::UTILITY_FIRST => "Utility first",
		self::SOLAR_FIRST => "Solar first",
		self::SBU_FIRST => "SBU first"
	];
}