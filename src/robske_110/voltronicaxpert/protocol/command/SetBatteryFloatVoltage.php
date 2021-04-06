<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetBatteryFloatVoltage extends SetCommand{
	public static string $commandID = SetCommandID::BATTERY_FLOAT_VOLTAGE;
	
	public function __construct(public float $batteryFloatVoltage){}
	
	protected function encodePayload(): string{
		return (string) round($this->batteryFloatVoltage, 1);
	}
}