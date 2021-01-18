<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class DeviceSerialResponse extends Response{
	public string $deviceSerial;
	
	protected function decode(FieldStream $dataStream){
		var_dump($dataStream);
		$this->deviceSerial = $dataStream->get();
	}
}