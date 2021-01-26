<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\GetCommandID;
use robske_110\voltronicaxpert\protocol\response\DeviceModeResponse;
use robske_110\voltronicaxpert\protocol\response\Response;

class GetDeviceMode extends Command{
	public static string $commandID = GetCommandID::DEVICE_MODE;
	
	public function decode(string $data): Response{
		return new DeviceModeResponse($data);
	}
}