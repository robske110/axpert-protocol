<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class OtherCPUfirmwareResponse extends Response{
	protected static string $responsePrefix = "VERFW2:";
	
	public string $firmwareVersion;
	
	protected function decode(FieldStream $dataStream){
		var_dump($dataStream);
		$this->firmwareVersion = $dataStream->get();
	}
}