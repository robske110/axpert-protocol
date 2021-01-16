<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert;

use Exception;
use robske_110\Logger\Logger;

class SerialDevice implements DeviceConnection{
	/** @var string */
	private $deviceFile;
	
	/** @var int */
	private int $baudrate;
	
	/** @var resource */
	private $stream;
	
	public function __construct(string $deviceFile, int $baudrate = 115200){
		$this->deviceFile = $deviceFile;
		$this->baudrate = $baudrate;
	}
	
	public function open(){
		$this->stream = fopen($this->deviceFile, "r+"); //b?
		if($this->stream === false){
			throw new Exception("Failed to open device ".$this->deviceFile);
		}
		exec("stty -f ".$this->deviceFile." ".$this->baudrate." cs8 -cstopb -parenb");
		stream_set_blocking($this->stream, false);
	}
	
	public function send(string $str){
		Logger::debug("Sending ".$str);
		if(fwrite($this->stream, $str, strlen($str)) !== strlen($str)){
			throw new Exception("Failed to write to device ".$this->deviceFile);
		}
	}
	
	public function readUntil(string $until = "\r", int $maxReads = 500){
		$str = "";
		for($i = 0; $i < $maxReads; ++$i){
			usleep(5000);
			$str .= stream_get_contents($this->stream);
			if(str_contains($str, $until)){
				break;
			}
		}
		return $str;
	}
	
	public function close(){
		fclose($this->stream);
	}
	
	public function __destruct(){
		$this->close();
	}
}