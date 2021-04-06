<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetDeviceGridWorkingRange extends SetCommand{
	public static string $commandID = SetCommandID::DEVICE_GRID_WORKING_RANGE;
	
	/** @var int See InputVoltageRange class for values */
	public int $inputVoltageRange;
	
	/**
	 * @param int $inputVoltageRange See InputVoltageRange class for values
	 */
	public function __construct(int $inputVoltageRange){
		$this->inputVoltageRange = $inputVoltageRange;
	}
	
	protected function encodePayload(): string{
		return str_pad((string) $this->inputVoltageRange, 2, "0", STR_PAD_LEFT);
	}
}