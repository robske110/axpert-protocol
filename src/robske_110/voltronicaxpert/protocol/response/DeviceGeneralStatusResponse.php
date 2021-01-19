<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class DeviceGeneralStatusResponse extends Response{
	public float $gridVoltage;
	public float $gridFrequency;
	public float $acOutputVoltage;
	public float $acOutputFrequency;
	public float $acOutputApparentPower;
	public float $acOutputActivePower;
	public float $outputLoadPercent;
	public int $busVoltage;
	public float $batteryVoltage;
	public int $batteryChargingCurrent;
	public int $batterySOC;
	public int $inverterHeatSinkTemperature;
	public int $pvInputCurrentBattery;
	public float $pvInputVoltage;
	public float $batteryVoltageFromSCC; //SolarChargeControler
	public int $batteryDischargeCurrent; //SolarChargeControler
	
	public string $deviceStatus1;
	public bool $addSBUPriorityVersion;
	public bool $configurationChanged;
	public bool $sccFirmwareUpdated;
	public bool $loadStatus;
	public bool $batteryVoltageToSteadyWhileCharging; //WTF???
	public bool $chargingStatus;
	public bool $sccChargingStatus;
	public bool $acChargingStatus;
	
	protected function decode(FieldStream $dataStream){
		$this->gridVoltage = (float) $dataStream->get();
		$this->gridFrequency = (float) $dataStream->get();
		$this->acOutputVoltage = (float) $dataStream->get();
		$this->acOutputFrequency = (float) $dataStream->get();
		$this->acOutputApparentPower = (float) $dataStream->get();
		$this->acOutputActivePower = (float) $dataStream->get();
		$this->outputLoadPercent = (float) $dataStream->get();
		$this->busVoltage = (int) $dataStream->get();
		$this->batteryVoltage = (float) $dataStream->get();
		$this->batteryChargingCurrent = (int) $dataStream->get();
		$this->batterySOC = (int) $dataStream->get();
		$this->inverterHeatSinkTemperature = (int) $dataStream->get();
		$this->pvInputCurrentBattery = (int) $dataStream->get();
		$this->pvInputVoltage = (float) $dataStream->get();
		$this->batteryVoltageFromSCC = (float) $dataStream->get();
		$this->batteryDischargeCurrent = (int) $dataStream->get();
		$this->deviceStatus1 = $dataStream->get();
		$this->addSBUPriorityVersion = (bool) $this->deviceStatus1[0];
		$this->configurationChanged = (bool) $this->deviceStatus1[1];
		$this->sccFirmwareUpdated = (bool) $this->deviceStatus1[2];
		$this->loadStatus = (bool) $this->deviceStatus1[3];
		$this->batteryVoltageToSteadyWhileCharging = (bool) $this->deviceStatus1[4];
		$this->chargingStatus = (bool) $this->deviceStatus1[5];
		$this->sccChargingStatus = (bool) $this->deviceStatus1[6];
		$this->acChargingStatus = (bool) $this->deviceStatus1[7];
	}
}