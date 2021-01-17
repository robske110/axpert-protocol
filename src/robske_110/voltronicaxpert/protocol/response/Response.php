<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

use robske_110\Logger\Logger;
use robske_110\voltronicaxpert\protocol\CRC;
use robske_110\voltronicaxpert\protocol\exception\ResponseDecodeError;

abstract class Response extends CharacterStream{
	const START_CHARACTER = "(";
	const END_CHARACTER = "\r";
	
	protected static string $responsePrefix = "";
	
	public function __construct(string $data){
		parent::__construct($data);
		var_dump(bin2hex($data));
		if($this->get() !== self::START_CHARACTER){
			throw new ResponseDecodeError("Could not find START_CHARACTER");
		}
		if(($prefixLen = strlen(static::$responsePrefix)) > 0){
			if($this->read($prefixLen) !== static::$responsePrefix){
				throw new ResponseDecodeError("Response prefix does not match");
			}
		}
		
		$payload = $this->read($this->remaining()-3);
		var_dump($payload);
		
		$crc = $this->read(2);
			throw new ResponseDecodeError("Response checksum incorrect");
		if($crc !== pack("n", CRC::crc16(self::START_CHARACTER.static::$responsePrefix.$payload))){
		}
		if($this->get() !== self::END_CHARACTER){
			throw new ResponseDecodeError("Could not find END_CHARACTER");
		}
		
		$this->decode(new FieldStream($payload));
	}
	
	abstract protected function decode(FieldStream $dataStream);
}
