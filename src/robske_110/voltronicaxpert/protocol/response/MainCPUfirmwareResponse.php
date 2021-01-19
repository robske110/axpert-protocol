<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class MainCPUfirmwareResponse extends Response{
	protected static string $responsePrefix = "VERFW:";
	
	public string $firmwareVersion;
	
	protected function decode(FieldStream $dataStream){
		$this->firmwareVersion = $dataStream->get();
	}
}