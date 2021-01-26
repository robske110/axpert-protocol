<?php
declare(strict_types=1);

use robske_110\Logger\Logger;
use robske_110\voltronicaxpert\Device;
use robske_110\voltronicaxpert\protocol\command\GetDeviceFlagStatus;
use robske_110\voltronicaxpert\protocol\command\GetDeviceGeneralStatus;
use robske_110\voltronicaxpert\protocol\command\GetDeviceMode;
use robske_110\voltronicaxpert\protocol\command\GetDeviceRating;
use robske_110\voltronicaxpert\protocol\command\GetDeviceSerial;
use robske_110\voltronicaxpert\protocol\command\GetMainCPUfirmware;
use robske_110\voltronicaxpert\protocol\command\GetOtherCPUfirmware;
use robske_110\voltronicaxpert\protocol\command\GetProtocolID;
use robske_110\voltronicaxpert\USBDevice;

require(__DIR__."/../../Autoloader.php");
Logger::init();

$pipSerial = new USBDevice("/dev/hidraw0");
$pipSerial->open();
$device = new Device($pipSerial);
$start = microtime(true);
var_dump($device->sendCommand(new GetProtocolID()));
echo("Took ".(microtime(true)-$start)."s");
var_dump($device->sendCommand(new GetDeviceSerial()));
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
#cmds: PEJ