<?php
declare(strict_types=1);

use robske_110\Logger\Logger;
use robske_110\voltronicaxpert\Device;
use robske_110\voltronicaxpert\protocol\command\GetBatteryEqualizationInfo;
use robske_110\voltronicaxpert\protocol\command\GetDefaultSettings;
use robske_110\voltronicaxpert\protocol\command\GetDeviceFlagStatus;
use robske_110\voltronicaxpert\protocol\command\GetDeviceGeneralStatus;
use robske_110\voltronicaxpert\protocol\command\GetDeviceMode;
use robske_110\voltronicaxpert\protocol\command\GetDeviceModel;
use robske_110\voltronicaxpert\protocol\command\GetDeviceRating;
use robske_110\voltronicaxpert\protocol\command\GetDeviceSerial;
use robske_110\voltronicaxpert\protocol\command\GetDeviceWarningStatus;
use robske_110\voltronicaxpert\protocol\command\GetDSPbootstrap;
use robske_110\voltronicaxpert\protocol\command\GetMainCPUfirmware;
use robske_110\voltronicaxpert\protocol\command\GetOtherCPUfirmware;
use robske_110\voltronicaxpert\protocol\command\GetOutputMode;
use robske_110\voltronicaxpert\protocol\command\GetParallelInfo;
use robske_110\voltronicaxpert\protocol\command\GetProtocolID;
use robske_110\voltronicaxpert\protocol\command\GetSelectableMaxChargingCurrents;
use robske_110\voltronicaxpert\protocol\command\GetSelectableMaxUtilityChargingCurrents;
use robske_110\voltronicaxpert\protocol\command\SetDeviceFlagStatus;
use robske_110\voltronicaxpert\protocol\DeviceFlag;
use robske_110\voltronicaxpert\USBDevice;

require(dirname(__FILE__, 4)."/vendor/autoload.php");
Logger::init();

$pipSerial = new USBDevice("/dev/hidraw0");
$pipSerial->open();
$device = new Device($pipSerial);
$start = microtime(true);

$dFS = $device->sendCommand(new GetDeviceFlagStatus());
var_dump($dFS);
$dFS->info();

$device->sendCommand(
	new SetDeviceFlagStatus([DeviceFlag::POWER_SAVING_FLAG], false)
);

$dFS = $device->sendCommand(new GetDeviceFlagStatus());
var_dump($dFS);
$dFS->info();



var_dump($device->sendCommand(new GetProtocolID()));
Logger::log("Took ".(microtime(true)-$start)."s");
var_dump($device->sendCommand(new GetDeviceSerial()));
var_dump($device->sendCommand(new GetDeviceModel()));
var_dump($device->sendCommand(new GetMainCPUfirmware()));
var_dump($device->sendCommand(new GetOtherCPUfirmware()));
var_dump($device->sendCommand(new GetDeviceRating()));
$dFS = $device->sendCommand(new GetDeviceFlagStatus());
var_dump($dFS);
$dFS->info();
var_dump($device->sendCommand(new GetDeviceGeneralStatus()));
$dM = $device->sendCommand(new GetDeviceMode());
var_dump($dM);
$dM->info();
var_dump($device->sendCommand(new GetDeviceWarningStatus()));
var_dump($device->sendCommand(new GetDefaultSettings()));
var_dump($device->sendCommand(new GetSelectableMaxChargingCurrents()));
var_dump($device->sendCommand(new GetSelectableMaxUtilityChargingCurrents()));
var_dump($device->sendCommand(new GetOutputMode()));
//var_dump($device->sendCommand(new GetDSPbootstrap()));
var_dump($device->sendCommand(new GetParallelInfo(0)));
var_dump($device->sendCommand(new GetBatteryEqualizationInfo));