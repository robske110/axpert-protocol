<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol;

abstract class OutputMode{
	const SINGLE_MACHINE_OUTPUT = 00;
	const PARALLEL_OUTPUT = 01;
	const PHASE_1_OF_3_OUTPUT = 02;
	const PHASE_2_OF_3_OUTPUT = 03;
	const PHASE_3_OF_3_OUTPUT = 04;
	
	public const OUTPUT_MODES = [
		00 => "single machine output",
		01 => "parallel output",
		02 => "Phase 1 of 3 Phase output",
		03 => "Phase 2 of 3 Phase output",
		04 => "Phase 3 of 3 Phase output"
	];
}