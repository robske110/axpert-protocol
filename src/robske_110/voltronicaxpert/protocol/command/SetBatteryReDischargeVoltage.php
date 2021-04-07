<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetBatteryReDischargeVoltage extends SetCommand{
	public static string $commandID = SetCommandID::BATTERY_REDISCHARGE_VOLTAGE;
	
	public function __construct(public float $batteryReDischargeVoltage){}
	
	protected function encodePayload(): string{
		return sprintf("%04.1f", $this->batteryReDischargeVoltage);
	}
}