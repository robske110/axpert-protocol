<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

use robske_110\Logger\Logger;
use robske_110\voltronicaxpert\protocol\CRC;
use robske_110\voltronicaxpert\protocol\exception\CommandAcknowledgmentError;
use robske_110\voltronicaxpert\protocol\exception\ResponseDecodeError;

abstract class Response extends CharacterStream{
	const START_CHARACTER = "(";
	const END_CHARACTER = "\r";
	
	protected static string $responsePrefix = "";
	
	public function __construct(string $data){
		if(($endCharPos = strpos($data, self::END_CHARACTER)) === false){
			throw new ResponseDecodeError("Could not find END_CHARACTER");
		}
		$data = substr($data, 0, $endCharPos+1); //strips NUL bytes off end
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
		if($payload == "N"){
			if($this->read(2) == "AK"){
				throw new CommandAcknowledgmentError("NAK received");
			}
			$this->skip(-2);
		}
		var_dump($payload);
		
		Logger::debug("remaining: ".$this->remaining());
		var_dump(bin2hex($this->read(3)));
		$this->skip(-3);
		
		$crc = $this->read(2);
		if($crc !== pack("n", CRC::crc16(self::START_CHARACTER.static::$responsePrefix.$payload))){
			Logger::notice("Response checksum incorrect");
			#throw new ResponseDecodeError("Response checksum incorrect");
		}
		if($this->get() !== self::END_CHARACTER){
			throw new ResponseDecodeError("Could not find END_CHARACTER");
		}
		
		$fieldStream = new FieldStream($payload);
		$this->decode($fieldStream);
		if(($remaining = $fieldStream->remaining()) > 0){
			Logger::notice("Did not read all fields from payload! (remaining: ".$remaining.")");
		}
	}
	
	abstract protected function decode(FieldStream $dataStream);
}
