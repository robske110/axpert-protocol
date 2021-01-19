<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class OtherCPUfirmwareResponse extends Response{
	protected static string $responsePrefix = "VERFW2:";
	
	public string $firmwareVersion;
	
	protected function decode(FieldStream $dataStream){
		$this->firmwareVersion = $dataStream->get();
	}
}