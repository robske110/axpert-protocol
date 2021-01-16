<?php
declare(strict_types=1);

use robske_110\Logger\Logger;
use robske_110\voltronicaxpert\Device;
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

#cmds: PEJ