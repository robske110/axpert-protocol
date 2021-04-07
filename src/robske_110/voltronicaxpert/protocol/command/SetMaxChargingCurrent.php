<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetMaxChargingCurrent extends SetCommand{
	public static string $commandID = SetCommandID::MAX_PARALLEL_CHARGING_CURRENT;
	
	public function __construct(public int $parallelNum, public int $maxChargingCurrent){
		if($this->maxChargingCurrent >= 100){
			throw new \InvalidArgumentException("SetMaxChargingCurrent only supports 0-99A. Use SetMaxChargingCurrentExtended for values above 100A!");
		}
	}
	
	protected function encodePayload(): string{
		return ((string) $this->parallelNum).sprintf("%02d", $this->maxChargingCurrent);
	}
}