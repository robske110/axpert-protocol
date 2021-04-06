<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetDeviceOutputSourcePriority extends SetCommand{
	public static string $commandID = SetCommandID::DEVICE_OUTPUT_SOURCE_PRIORITY;
	
	/** @var int See OutputSourcePriority for values */
	public int $outputSourcePriority;
	
	/**
	 * @param int $outputSourcePriority See OutputSourcePriority for values
	 */
	public function __construct(int $outputSourcePriority){
		$this->outputSourcePriority = $outputSourcePriority;
	}
	
	protected function encodePayload(): string{
		return str_pad((string) $this->outputSourcePriority, 2, "0", STR_PAD_LEFT);
	}
}