<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\CRC;
use robske_110\voltronicaxpert\protocol\response\Response;

abstract class Command{
	const END_SEP = 0x0D;
	
	public static string $commandID;
	
	public function encode(): string{
		$payload = static::$commandID.$this->encodePayload();
		return $payload.pack("n", CRC::crc16($payload)).chr(self::END_SEP);
	}
	
	protected function encodePayload(): string{
		return "";
	}
	
	abstract public function decode(string $data): Response;
}
