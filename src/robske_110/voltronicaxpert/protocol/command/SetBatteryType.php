<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetBatteryType extends SetCommand{
	public static string $commandID = SetCommandID::BATTERY_TYPE;
	
	/** @var int See BatteryType class for values */
	public int $batteryType;
	
	/**
	 * @param int $batteryType See BatteryType class for values
	 */
	public function __construct(int $batteryType){
		$this->batteryType = $batteryType;
	}
	
	protected function encodePayload(): string{
		return str_pad((string) $this->batteryType, 2, "0", STR_PAD_LEFT);
	}
}