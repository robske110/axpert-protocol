<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class SelectableMaxUtilityChargingCurrentsResponse extends Response{
	/** @var int[] */
	public array $selectableCurrents = [];
	
	protected function decode(FieldStream $dataStream){
		while($dataStream->remaining()){
			$this->selectableCurrents[] = (int) $dataStream->get();
		}
	}
}