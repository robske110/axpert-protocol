<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\SetCommandID;

class ResetControlParameters extends SetCommand{
	public static string $commandID = SetCommandID::CONTROL_PARAMETERS_RESET;
}