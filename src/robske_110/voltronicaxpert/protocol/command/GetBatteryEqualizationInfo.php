<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\GetCommandID;
use robske_110\voltronicaxpert\protocol\response\BatteryEqualizationInfoResponse;
use robske_110\voltronicaxpert\protocol\response\Response;

class GetBatteryEqualizationInfo extends Command{
	public static string $commandID = GetCommandID::BATTERY_EQUALIZATION_INFO;
	
	public function decode(string $data): Response{
		return new BatteryEqualizationInfoResponse($data);
	}
}