<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetPVokCondition extends SetCommand{
	public static string $commandID = SetCommandID::PV_OK_CONDITION;
	
	/** @var bool $pvOKparallel whether all inverters in a parallel system need to have PV for PV OK */
	public function __construct(public bool $pvOKparallel){}
	
	protected function encodePayload(): string{
		return (string) $this->pvOKparallel;
	}
}