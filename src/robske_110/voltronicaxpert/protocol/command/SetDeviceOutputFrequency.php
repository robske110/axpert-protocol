<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetDeviceOutputFrequency extends SetCommand{
	public static string $commandID = SetCommandID::DEVICE_OUTPUT_FREQUENCY;
	
	/** @var int Output frequency (only 50/60Hz supported) */
	public int $deviceOutputFrequency;
	
	/**
	 * @param int $frequency Output frequency (only 50/60Hz supported)
	 */
	public function __construct(int $frequency){
		$this->deviceOutputFrequency = $frequency;
	}
	
	protected function encodePayload(): string{
		return (string) $this->deviceOutputFrequency;
	}
}