<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

use robske_110\voltronicaxpert\protocol\DeviceMode;

class DeviceModeResponse extends Response{
	/** @var string See DeviceMode class for interpretation */
	public string $deviceMode;
	
	protected function decode(FieldStream $dataStream){
		$this->deviceMode = $dataStream->get();
	}
	
	public function info(){
		echo("mode: ".DeviceMode::MODES[$this->deviceMode].PHP_EOL);
	}
}