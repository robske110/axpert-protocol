<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;


class DefaultSettingsResponse extends Response{
	public float $acOutputVoltage;
	public float $acOutputFrequency;
	public int $maxACchargingCurrent;
	public float $batteryUnderVoltage;
	public float $batteryFloatVoltage;
	public float $batteryBulkVoltage;
	public float $batteryReChargeVoltage;
	public int $maxChargingCurrent;
	public int $inputVoltageRange;
	public const INPUT_VOLTAGE_RANGES = [
		0 => "APPLIANCE",
		1 => "UPS"
	];
	public int $outputSourcePriority;
	public const OUTPUT_SOURCE_PRIORITIES = [
		0 => "Utility first",
		1 => "Solar first",
		2 => "SBU first"
	];
	public int $chargerSourcePriority;
	public const CHARGER_SOURCE_PRIORITIES = [
		0 => "Utility first",
		1 => "Solar first",
		2 => "Solar + Utility",
		3 => "Only solar charging permitted"
	];
	public int $batteryType;
	public const BATTERY_TYPES = [
		1 => "AGM",
		2 => "FLOODED",
		3 => "USER"
	];
	public bool $buzzerEnabled;
	public bool $powerSavingEnabled;
	public bool $overloadRestartEnabled;
	public bool $overTemperatureRestartEnabled;
	public bool $lcdBacklightEnabled;
	public bool $alarmPrimarySourceInterrupt;
	public bool $faultCodeRecordEnabled;
	public bool $overloadBypassEnabled;
	public bool $lcdDisplayDefaultPageTimeoutEnabled;
	/** @var int See OutputMode class for values */
	public int $outputMode;
	public float $batteryReDischargeVoltage;
	public bool $pvOKparallel; //when true all inverters in a parallel system need to have PV for PV OK
	public bool $pvPowerBalance; //when true PV input power will be limited by charge current limit + current load instead of only charge current
	
	protected function decode(FieldStream $dataStream){
		$this->acOutputVoltage = (float) $dataStream->get();
		$this->acOutputFrequency = (float) $dataStream->get();
		$this->maxACchargingCurrent = (int) $dataStream->get();
		$this->batteryUnderVoltage = (float) $dataStream->get();
		$this->batteryFloatVoltage = (float) $dataStream->get();
		$this->batteryBulkVoltage = (float) $dataStream->get();
		$this->batteryReChargeVoltage = (float) $dataStream->get();
		$this->maxChargingCurrent = (int) $dataStream->get();
		$this->inputVoltageRange = (int) $dataStream->get();
		$this->outputSourcePriority = (int) $dataStream->get();
		$this->chargerSourcePriority = (int) $dataStream->get();
		$this->batteryType = (int) $dataStream->get();
		$this->buzzerEnabled = (bool) $dataStream->get();
		$this->powerSavingEnabled = (bool) $dataStream->get();
		$this->overloadRestartEnabled = (bool) $dataStream->get();
		$this->overTemperatureRestartEnabled = (bool) $dataStream->get();
		$this->lcdBacklightEnabled = (bool) $dataStream->get();
		$this->alarmPrimarySourceInterrupt = (bool) $dataStream->get();
		$this->faultCodeRecordEnabled = (bool) $dataStream->get();
		$this->overloadBypassEnabled = (bool) $dataStream->get();
		$this->lcdDisplayDefaultPageTimeoutEnabled = (bool) $dataStream->get();
		$this->outputMode = (int) $dataStream->get();
		$this->batteryReDischargeVoltage = (float) $dataStream->get();
		$this->pvOKparallel = (bool) $dataStream->get();
		$this->pvPowerBalance = (bool) $dataStream->get();
		//undocumented field. observed values: 000
	}
}