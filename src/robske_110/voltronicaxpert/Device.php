<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert;

use robske_110\voltronicaxpert\protocol\command\Command;
use robske_110\voltronicaxpert\protocol\response\Response;

class Device{
	public function __construct(private DeviceConnection $deviceConnection){
	}
	
	public function sendCommand(Command $command): Response{
		$this->deviceConnection->send($command->encode());
		return $command->decode($this->deviceConnection->readUntil());
	}
	
	/**
	 * @return DeviceConnection
	 */
	public function getDeviceConnection(): DeviceConnection{
		return $this->deviceConnection;
	}
}