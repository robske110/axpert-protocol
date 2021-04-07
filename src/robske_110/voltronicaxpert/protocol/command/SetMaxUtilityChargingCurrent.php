<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetMaxUtilityChargingCurrent extends SetCommand{
	public static string $commandID = SetCommandID::MAX_PARALLEL_UTILITY_CHARGING_CURRENT;
	
	public function __construct(public int $parallelNum, public int $maxChargingCurrent){}
	
	protected function encodePayload(): string{
		return ((string) $this->parallelNum).sprintf("%02d", $this->maxChargingCurrent);
	}
}