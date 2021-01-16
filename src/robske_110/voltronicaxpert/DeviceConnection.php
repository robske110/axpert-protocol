<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert;

interface DeviceConnection{
	public function send(string $str);
	
	public function readUntil(string $until = "\r");
}