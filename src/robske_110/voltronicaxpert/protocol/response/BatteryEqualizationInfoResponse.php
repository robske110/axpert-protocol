<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class BatteryEqualizationInfoResponse extends Response{
	public bool $batteryEqualizationEnabled;
	public int $batteryEqualizationTime;
	public int $batteryEqualizationInterval;
	public int $batteryEqualizationMaxCurrent;
	public int $remainingTimeForNextEqualization;
	public int $batteryEqualizationVoltagePerUnit;
	public int $batteryCVchargeTime;
	public int $batteryEqualizationTimeout;
	
	protected function decode(FieldStream $dataStream){
		$this->batteryEqualizationEnabled = (bool) $dataStream->get();
		$this->batteryEqualizationTime = (int) $dataStream->get();
		$this->batteryEqualizationInterval = (int) $dataStream->get();
		$this->batteryEqualizationMaxCurrent = (int) $dataStream->get();
		$this->remainingTimeForNextEqualization = (int) $dataStream->get();
		$this->batteryEqualizationVoltagePerUnit = (int) $dataStream->get();
		$this->batteryCVchargeTime = (int) $dataStream->get();
		$this->batteryEqualizationTimeout = (int) $dataStream->get();
		$dataStream->get(); //Unknown field
	}
}