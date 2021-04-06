<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetBatteryReChargeVoltage extends SetCommand{
	public static string $commandID = SetCommandID::BATTERY_RECHARGE_VOLTAGE;
	
	public function __construct(public float $batteryReChargeVoltage){}
	
	protected function encodePayload(): string{
		return (string) round($this->batteryReChargeVoltage, 1);
	}
}