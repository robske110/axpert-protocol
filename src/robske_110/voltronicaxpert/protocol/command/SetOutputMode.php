<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetOutputMode extends SetCommand{
	public static string $commandID = SetCommandID::OUTPUT_MODE;
	
	/**
	 * @param int $parallelNum The number of the inverter number to set output mode for
	 * @param int $outputMode See OutputMode class for values
	 */
	public function __construct(public int $parallelNum, public int $outputMode){}
	
	protected function encodePayload(): string{
		return $this->parallelNum.$this->outputMode;
	}
}