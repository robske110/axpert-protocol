<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class DSPbootstrapResponse extends Response{
	public bool $dspHasBootstrap;
	
	protected function decode(FieldStream $dataStream){
		$this->dspHasBootstrap = (bool) $dataStream->get();
	}
}