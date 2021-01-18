<?php
declare(strict_types=1);

namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\GetCommandID;
use robske_110\voltronicaxpert\protocol\response\MainCPUfirmwareResponse;
use robske_110\voltronicaxpert\protocol\response\Response;

class GetMainCPUfirmware extends Command{
	public static string $commandID = GetCommandID::MAIN_CPU_FIRMWARE;
	
	public function decode(string $data): Response{
		return new MainCPUfirmwareResponse($data);
	}
}