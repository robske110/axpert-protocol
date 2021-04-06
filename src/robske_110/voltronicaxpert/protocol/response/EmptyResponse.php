<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

use robske_110\voltronicaxpert\protocol\exception\CommandAcknowledgmentError;

class EmptyResponse extends Response{
	protected function decode(FieldStream $dataStream){
		if($this->get() !== "ACK"){
			throw new CommandAcknowledgmentError("Inverter did not acknowledge command.");
		}
	}
}