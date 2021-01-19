<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\GetCommandID;
use robske_110\voltronicaxpert\protocol\response\DeviceFlagStatusResponse;
use robske_110\voltronicaxpert\protocol\response\Response;

class GetDeviceFlagStatus extends Command{
	public static string $commandID = GetCommandID::DEVICE_FLAG_STATUS;
	
	public function decode(string $data): Response{
		return new DeviceFlagStatusResponse($data);
	}
}