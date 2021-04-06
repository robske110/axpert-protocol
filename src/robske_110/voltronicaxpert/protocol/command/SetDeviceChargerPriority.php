<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetDeviceChargerPriority extends SetCommand{
	public static string $commandID = SetCommandID::DEVICE_CHARGER_PRIORITY;
	
	/** @var int See OutputSourcePriority for values */
	public int $chargerSourcePriority;
	
	/**
	 * @param int $chargerSourcePriority See ChargerSourcePriority for values
	 */
	public function __construct(int $chargerSourcePriority){
		$this->chargerSourcePriority = $chargerSourcePriority;
	}
	
	protected function encodePayload(): string{
		return str_pad((string) $this->chargerSourcePriority, 2, "0", STR_PAD_LEFT);
	}
}