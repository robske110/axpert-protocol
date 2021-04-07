<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetBatteryCutOffVoltage extends SetCommand{
	public static string $commandID = SetCommandID::BATTERY_CUTOFF_VOLTAGE;
	
	public function __construct(public float $batteryUnderVoltage){}
	
	protected function encodePayload(): string{
		return sprintf("%04.1f", $this->batteryUnderVoltage);
	}
}