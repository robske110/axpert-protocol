<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetParallelDeviceChargerPriority extends SetCommand{
	public static string $commandID = SetCommandID::DEVICE_PARALLEL_DEVICE_CHARGER_PRIORITY;
	
	/** @var int See OutputSourcePriority class for values */
	public int $chargerSourcePriority;
	
	/**
	 * @param int $parallelNum The number of the inverter number to set output mode for
	 * @param int $chargerSourcePriority See ChargerSourcePriority class for values
	 */
	public function __construct(public int $parallelNum, int $chargerSourcePriority){
		$this->chargerSourcePriority = $chargerSourcePriority;
	}
	
	protected function encodePayload(): string{
		return $this->parallelNum.str_pad((string) $this->chargerSourcePriority, 2, "0", STR_PAD_LEFT);
	}
}