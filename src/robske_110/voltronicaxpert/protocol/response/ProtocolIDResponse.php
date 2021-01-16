<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class ProtocolIDResponse extends Response{
	public int $protocolID;
	
	protected function decode(FieldStream $dataStream){
		$this->protocolID = (int) $dataStream->get();
	}
}