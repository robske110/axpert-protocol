<?php
declare(strict_types=1);

namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\GetCommandID;
use robske_110\voltronicaxpert\protocol\response\DefaultSettingsResponse;
use robske_110\voltronicaxpert\protocol\response\Response;
use robske_110\voltronicaxpert\protocol\response\DeviceModelResponse;

class GetDefaultSettings extends Command{
	public static string $commandID = GetCommandID::DEFAULT_SETTINGS;
	
	public function decode(string $data): Response{
		return new DefaultSettingsResponse($data);
	}
}