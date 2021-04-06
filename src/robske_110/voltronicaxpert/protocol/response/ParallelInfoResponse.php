<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class ParallelInfoResponse extends Response{
	public bool $inverterExists;
	public string $deviceSerial;
	/** @var string See DeviceMode class for interpretation */
	public string $deviceMode;
	public int $faultCode;
	const FAULT_CODES = [
		"FAN_LOCKED",
		"OVER_TEMPERATURE",
		"BATTERY_VOLTAGE_TOO_HIGH",
		"BATTERY_VOLTAGE_TOO_LOW",
		"OUTPUT_SHORT_CIRCUIT_OR_OVER_TEMPERATURE",
		"OUTPUT_VOLTAGE_TOO_HIGH",
		"OVERLOAD_TIME_OUT",
		"BUS_VOLTAGE_TOO_HIGH",
		"BUS_SOFT_START_FAILED",
		11 => "MAIN_RELAY_FAILED",
		51 => "OVER_CURRENT_INVERTER",
		52 => "BUS_SOFT_START_FAILED",
		53 => "INVERTER_SOFT_START_FAILED",
		54 => "SELF_TEST_FAILED",
		55 => "OVER_DC_VOLTAGE_ON_OUTPUT_OF_INVERTER",
		56 => "BATTERY_CONNECTION_IS_OPEN",
		57 => "CURRENT_SENSOR_FAILED",
		58 => "OUTPUT_VOLTAGE_TOO_LOW",
		60 => "INVERTER_NEGATIVE_POWER",
		71 => "PARALLEL_VERSION_DIFFERENT",
		72 => "OUTPUT_CIRCUIT_FAILED",
		80 => "CAN_COMMUNICATION_FAILED",
		81 => "PARALLEL_HOST_LINE_LOST",
		82 => "PARALLEL_SYNCHRONIZED_SIGNAL_LOST",
		83 => "PARALLEL_BATTERY_VOLTAGE_DETECT_DIFFERENT",
		84 => "PARALLEL_LINE_VOLTAGE_OR_FREQUENCY_DETECT_DIFFERENT",
		85 => "PARALLEL_LINE_INPUT_CURRENT_UNBALANCED",
		86 => "PARALLEL_OUTPUT_SETTING_DIFFERENT"
	];
	public float $gridVoltage;
	public float $gridFrequency;
	public float $acOutputVoltage;
	public float $acOutputFrequency;
	public float $acOutputApparentPower;
	public float $acOutputActivePower;
	public float $outputLoadPercent;
	public float $batteryVoltage;
	public int $batteryChargingCurrent;
	public int $batterySOC;
	public float $pvInputVoltage;
	public int $batteryTotalChargingCurrent;
	public int $acTotalOutputApparentPower;
	public int $acTotalOutputActivePower;
	public int $acTotalOutputPercentage;
	public string $inverterStatus;
	public bool $sccOK; //SolarChargeController OK
	public bool $acChargingStatus;
	public bool $sccChargingStatus;
	public int $batteryStatus;
	const BATTERY_STATUS = [
		"BATTERY_OPEN" => 2,
		"BATTERY_UNDER" => 1,
		"BATTERY_NORMAL" => 0
	];
	public bool $gridLoss;
	public bool $loadStatus;
	public bool $configurationChanged;
	/** @var int See OutputMode class for values */
	public int $outputMode;
	public int $chargerSourcePriority;
	public int $maxChargerCurrent;
	public int $maxChargerRange;
	public int $maxACChargerCurrent;
	public int $pvInputCurrentForBattery;
	public int $batteryDischargeCurrent;
	
	protected function decode(FieldStream $dataStream){
		$this->inverterExists = (bool) $dataStream->get();
		$this->deviceSerial = (string) $dataStream->get();
		$this->deviceMode = (string) $dataStream->get();
		$this->faultCode = (int) $dataStream->get();
		$this->gridVoltage = (float) $dataStream->get();
		$this->gridFrequency = (float) $dataStream->get();
		$this->acOutputVoltage = (float) $dataStream->get();
		$this->acOutputFrequency = (float) $dataStream->get();
		$this->acOutputApparentPower = (float) $dataStream->get();
		$this->acOutputActivePower = (float) $dataStream->get();
		$this->outputLoadPercent = (float) $dataStream->get();
		$this->batteryVoltage = (float) $dataStream->get();
		$this->batteryChargingCurrent = (int) $dataStream->get();
		$this->batterySOC = (int) $dataStream->get();
		$this->pvInputVoltage = (float) $dataStream->get();
		$this->batteryTotalChargingCurrent = (int) $dataStream->get();
		$this->acTotalOutputApparentPower = (int) $dataStream->get();
		$this->acTotalOutputActivePower = (int) $dataStream->get();
		$this->acTotalOutputPercentage = (int) $dataStream->get();
		$this->inverterStatus = (string) $dataStream->get();
		$this->sccOK = (bool) $this->inverterStatus[0];
		$this->acChargingStatus = (bool) $this->inverterStatus[1];
		$this->sccChargingStatus = (bool) $this->inverterStatus[2];
		$this->batteryStatus = (int) ($this->inverterStatus[3].$this->inverterStatus[4]); //TODO: verify
		$this->gridLoss = (bool) $this->inverterStatus[5];
		$this->loadStatus = (bool) $this->inverterStatus[6];
		$this->configurationChanged = (bool) $this->inverterStatus[7];
		$this->outputMode = (int) $dataStream->get();
		$this->chargerSourcePriority = (int) $dataStream->get();
		$this->maxChargerCurrent = (int) $dataStream->get();
		$this->maxChargerRange = (int) $dataStream->get();
		$this->maxACChargerCurrent = (int) $dataStream->get();
		$this->pvInputCurrentForBattery = (int) $dataStream->get();
		$this->batteryDischargeCurrent = (int) $dataStream->get();
	}
}