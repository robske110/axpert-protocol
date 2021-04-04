<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class DeviceModelResponse extends Response{
	public string $modelName;
	public int $acOutputApparentPower; //VA
	public float $acOutputPowerFactor; //pct (protocol can only send 0-99%)#
	public int $unitPhase;
	public int $totalPhases;
	public int $acOutputNominalVoltage;
	public int $gridNominalVoltage; //V
	public int $batteryPieces;
	public float $batteryVoltagePerPiece; //V
	
	protected function decode(FieldStream $dataStream){
		$this->modelName = trim($dataStream->get(), "#");
		$this->acOutputApparentPower = (int) trim($dataStream->get(), "#");
		$this->acOutputPowerFactor = (float) trim($dataStream->get()) / 100;
		$phaseInfo = explode("/", $dataStream->get());
		$this->unitPhase = (int) $phaseInfo[0];
		$this->totalPhases = (int) $phaseInfo[1];
		$this->acOutputNominalVoltage = (int) $dataStream->get();
		$this->gridNominalVoltage = (int) $dataStream->get();
		$this->batteryPieces = (int) $dataStream->get();
		$this->batteryVoltagePerPiece = (float) $dataStream->get();
	}
}