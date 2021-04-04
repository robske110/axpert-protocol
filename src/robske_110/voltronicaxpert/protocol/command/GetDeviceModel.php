<?php
declare(strict_types=1);

namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\GetCommandID;
use robske_110\voltronicaxpert\protocol\response\Response;
use robske_110\voltronicaxpert\protocol\response\DeviceModelResponse;

class GetDeviceModel extends Command{
	public static string $commandID = GetCommandID::DEVICE_MODEL;
	
	public function decode(string $data): Response{
		return new DeviceModelResponse($data);
	}
}