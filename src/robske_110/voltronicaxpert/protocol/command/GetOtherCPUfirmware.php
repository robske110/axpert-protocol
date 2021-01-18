<?php
declare(strict_types=1);

namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\GetCommandID;
use robske_110\voltronicaxpert\protocol\response\OtherCPUfirmwareResponse;
use robske_110\voltronicaxpert\protocol\response\Response;

class GetOtherCPUfirmware extends Command{
	public static string $commandID = GetCommandID::OTHER_CPU_FIRMWARE;
	
	public function decode(string $data): Response{
		return new OtherCPUfirmwareResponse($data);
	}
}