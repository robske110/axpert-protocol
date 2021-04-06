<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol;

abstract class GetCommandID{
	const DEVICE_PROTOCOL = "QPI";
	const DEVICE_SERIAL = "QID";
	const DEVICE_MODEL = "QMD";
	const MAIN_CPU_FIRMWARE = "QVFW";
	const OTHER_CPU_FIRMWARE = "QVFW2";
	const DEVICE_RATING_INFO = "QPIRI";
	const DEVICE_FLAG_STATUS = "QFLAG";
	const DEVICE_GENERAL_STATUS = "QPIGS";
	const DEVICE_MODE = "QMOD";
	const DEVICE_WARNINGS = "QPIWS";
	const DEFAULT_SETTINGS = "QDI";
	const SELECTABLE_MAX_CHARGING_CURRENTS = "QMCHGCR";
	const SELECTABLE_MAX_UTILITY_CHARGING_CURRENTS = "QMUCHGCR";
	const DSP_BOOTSTRAP = "QBOOT";
	const OUTPUT_MODE = "QOPM";
	const PARALLEL_INFO = "QPGS";
	const BATTERY_EQUALIZATION_INFO = "QBEQI";
}
