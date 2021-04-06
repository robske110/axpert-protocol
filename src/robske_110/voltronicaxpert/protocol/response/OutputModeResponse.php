<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class OutputModeResponse extends Response{
	/** @var int See OutputMode class for values */
	public int $outputMode;
	
	protected function decode(FieldStream $dataStream){
		$this->outputMode = (int) $dataStream->get();
	}
}