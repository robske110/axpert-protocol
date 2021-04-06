<?php
declare(strict_types=1);

namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\GetCommandID;
use robske_110\voltronicaxpert\protocol\response\Response;
use robske_110\voltronicaxpert\protocol\response\SelectableMaxUtilityChargingCurrentsResponse;

class GetSelectableMaxUtilityChargingCurrents extends Command{
	public static string $commandID = GetCommandID::SELECTABLE_MAX_UTILITY_CHARGING_CURRENTS;
	
	public function decode(string $data): Response{
		return new SelectableMaxUtilityChargingCurrentsResponse($data);
	}
}