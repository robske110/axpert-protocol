<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetSolarPowerBalance extends SetCommand{
	public static string $commandID = SetCommandID::SOLAR_POWER_BALANCE;
	
	/** @var bool $pvPowerBalance whether to limit true PV input power by charge current limit + current load or only charge current limit */
	public function __construct(public bool $pvPowerBalance){}
	
	protected function encodePayload(): string{
		return (string) $this->pvPowerBalance;
	}
}