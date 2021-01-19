<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class DeviceRatingResponse extends Response{
	public float $gridVoltage;
	public float $gridCurrent;
	public float $acOutputVoltage;
	public float $acOutputFrequency;
	public float $acOutputCurrent;
	public float $acOutputApparentPower;
	public float $acOutputActivePower;
	public float $batteryVoltage;
	public float $batteryReChargeVoltage;
	public float $batteryUnderVoltage;
	public float $batteryBulkVoltage;
	public float $batteryFloatVoltage;
	public int $batteryType;
	public const BATTERY_TYPES = [
		1 => "AGM",
		2 => "FLOODED",
		3 => "USER"
	];
	public int $currentMaxACchargingCurrent;
	public int $currentMaxChargingCurrent;
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
	public int $parallelMaxNum;
	public int $machineType;
	public const MACHINE_TYPES = [
		00 => "Grid tie",
		01 => "Off Grid",
		10 => "Hybrid"
	];
	public bool $hasTransformer;
	public int $outputMode;
	public const OUTPUT_MODES = [
		00 => "single machine output",
		01 => "parallel output",
		02 => "Phase 1 of 3 Phase output",
		03 => "Phase 2 of 3 Phase output",
		04 => "Phase 3 of 3 Phase output"
	];
	public float $batteryReDischargeVoltage;
	public bool $pvOKparallel; //when true all inverters in a parallel system need to have PV for PV OK
	public bool $pvPowerBalance; //when true PV input power will be limited by charge current limit + current load instead of only charge current
	
	protected function decode(FieldStream $dataStream){
		$this->gridVoltage = (float) $dataStream->get();
		$this->gridCurrent = (float) $dataStream->get();
		$this->acOutputVoltage = (float) $dataStream->get();
		$this->acOutputFrequency = (float) $dataStream->get();
		$this->acOutputCurrent = (float) $dataStream->get();
		$this->acOutputApparentPower = (float) $dataStream->get();
		$this->acOutputActivePower = (float) $dataStream->get();
		$this->batteryVoltage = (float) $dataStream->get();
		$this->batteryReChargeVoltage = (float) $dataStream->get();
		$this->batteryUnderVoltage = (float) $dataStream->get();
		$this->batteryBulkVoltage = (float) $dataStream->get();
		$this->batteryFloatVoltage = (float) $dataStream->get();
		$this->batteryType = (int) $dataStream->get();
		$this->currentMaxACchargingCurrent = (int) $dataStream->get();
		$this->currentMaxChargingCurrent = (int) $dataStream->get();
		$this->inputVoltageRange = (int) $dataStream->get();
		$this->outputSourcePriority = (int) $dataStream->get();
		$this->chargerSourcePriority = (int) $dataStream->get();
		$this->parallelMaxNum = (int) $dataStream->get();
		$this->machineType = (int) $dataStream->get();
		$this->hasTransformer = (bool) $dataStream->get();
		$this->outputMode = (int) $dataStream->get();
		$this->batteryReDischargeVoltage = (float) $dataStream->get();
		$this->pvOKparallel = (bool) $dataStream->get();
		$this->pvPowerBalance = (bool) $dataStream->get();
	}
}