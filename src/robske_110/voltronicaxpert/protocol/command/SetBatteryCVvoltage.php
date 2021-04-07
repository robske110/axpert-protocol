<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetBatteryCVvoltage extends SetCommand{
	public static string $commandID = SetCommandID::BATTERY_CV_VOLTAGE;
	
	public function __construct(public float $batteryCVvoltage){}
	
	protected function encodePayload(): string{
		return sprintf("%04.1f", $this->batteryCVvoltage);
	}
}