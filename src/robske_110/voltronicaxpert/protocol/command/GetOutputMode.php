<?php
declare(strict_types=1);

namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\GetCommandID;
use robske_110\voltronicaxpert\protocol\response\OutputModeResponse;
use robske_110\voltronicaxpert\protocol\response\Response;

class GetOutputMode extends Command{
	public static string $commandID = GetCommandID::OUTPUT_MODE;
	
	public function decode(string $data): Response{
		return new OutputModeResponse($data);
	}
}