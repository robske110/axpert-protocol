<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class DeviceWarningStatusResponse extends Response{
	public string $deviceWarningStatus;
	
	public bool $hasFault = false;
	public bool $hasWarning = false;
	
	public array $faults = [];
	public array $warnings = [];
	
	const TYPE_NONE = 0;
	const TYPE_FAULT = 1;
	const TYPE_WARNING = 2;
	const TYPE_WARNING_OR_FAULT = 3; //special case: bit 1 determines if fault or warning
	
	const RESERVED = ["reserved", self::TYPE_NONE];
	const UNKNOWN = ["unknown", self::TYPE_NONE];
	
	const WARNINGS = [
		self::RESERVED,
		["Inverter fault", self::TYPE_FAULT],
		["Bus Over", self::TYPE_FAULT],
		["Bus Under", self::TYPE_FAULT],
		["Bus Soft Fail", self::TYPE_FAULT],
		["LINE_FAIL", self::TYPE_WARNING],
		["OPVShort", self::TYPE_WARNING],
		["Inverter voltage too low", self::TYPE_FAULT],
		["Inverter voltage too high", self::TYPE_FAULT],
		["Over temperature", self::TYPE_WARNING_OR_FAULT],
		["Fan locked", self::TYPE_WARNING_OR_FAULT],
		["Battery voltage high", self::TYPE_WARNING_OR_FAULT],
		["Battery low alarm ", self::TYPE_WARNING],
		self::RESERVED,
		["Battery under shutdown", self::TYPE_WARNING],
		self::RESERVED,
		["Overload", self::TYPE_WARNING_OR_FAULT],
		["Eeprom fault", self::TYPE_WARNING],
		["Inverter Over Current", self::TYPE_FAULT],
		["Inverter Soft Fail", self::TYPE_FAULT],
		["Self Test Fail", self::TYPE_FAULT],
		["OP DC Voltage Over", self::TYPE_FAULT],
		["Bat Open", self::TYPE_FAULT],
		["Current Sensor Fail", self::TYPE_FAULT],
		["Battery Short", self::TYPE_FAULT],
		["Power limit", self::TYPE_WARNING],
		["PV voltage high", self::TYPE_WARNING],
		["MPPT overload fault", self::TYPE_WARNING], //docs say so...
		["MPPT overload warning", self::TYPE_WARNING],
		["Battery too low to charge", self::TYPE_WARNING],
		self::RESERVED,
		self::RESERVED,
		["PV voltage high 2", self::TYPE_WARNING],
		["MPPT overload fault 2", self::TYPE_WARNING], //docs say so...
		["MPPT overload warning 2", self::TYPE_WARNING],
		["Battery too low to charge 2", self::TYPE_WARNING],
		["PV voltage high 3", self::TYPE_WARNING],
		["MPPT overload fault 3", self::TYPE_WARNING], //docs say so...
		["MPPT overload warning 3", self::TYPE_WARNING],
		["Battery too low to charge 3", self::TYPE_WARNING],
	];
	
	protected function decode(FieldStream $dataStream){
		$this->deviceWarningStatus = $dataStream->get();
		$inverterFaultBit1 = false;
		for($i = 0; $i < strlen($this->deviceWarningStatus); ++$i){
			if(!isset(self::WARNINGS[$i])){
				//
			}
			if(!$this->deviceWarningStatus[$i]){
				continue;
			}
			
			if($i == 1){
				$inverterFaultBit1 = true;
				$this->hasFault = true;
			}
			$description = self::WARNINGS[$i][0];
			switch(self::WARNINGS[$i][1]){
				case self::TYPE_NONE:
					break;
				case self::TYPE_FAULT:
					$this->hasFault = true;
					$this->faults[] = $description;
					break;
				case self::TYPE_WARNING_OR_FAULT:
					if($inverterFaultBit1){
						$this->faults[] = $description;
						break;
					}
				case self::TYPE_WARNING:
					$this->hasWarning = true;
					$this->warnings[] = $description;
					break;
			}
		}
	}
}