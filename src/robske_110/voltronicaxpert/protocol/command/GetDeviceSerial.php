<?php
declare(strict_types=1);

namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\GetCommandID;
use robske_110\voltronicaxpert\protocol\response\Response;
use robske_110\voltronicaxpert\protocol\response\DeviceSerialResponse;

class GetDeviceSerial extends Command{
	public static string $commandID = GetCommandID::DEVICE_SERIAL;
	
	public function decode(string $data): Response{
		return new DeviceSerialResponse($data);
	}
}