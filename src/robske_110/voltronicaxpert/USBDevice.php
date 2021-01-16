<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert;

use Exception;

class USBDevice implements DeviceConnection{
	/** @var string */
	private string $deviceFile;
	
	/** @var resource */
	private $stream;
	
	public function __construct(string $deviceFile){
		$this->deviceFile = $deviceFile;
	}
	
	public function open(){
		$this->stream = fopen($this->deviceFile, "r+");
		if($this->stream === false){
			throw new Exception("Failed to open device ".$this->deviceFile);
		}
		stream_set_blocking($this->stream, false);
	}
	
	/**
	 * @param string $str          The data to write
	 * @param int $writeLenDivisor If the last segment is not divisible by this number, pads with NUL bytes.
	 * @param int $maxWriteLen     Maximum bytes to write in a single fwrite call.
	 *
	 * This function sends the string $str in 8-byte chunks to the USB device. It also makes sure that the bytes written
	 * at a time are divisible by $writeLenDivisor by padding with NUL bytes if needed.
	 * Sending an uneven amount of bytes or more than 8 bytes at a time is not supported by -something-.
	 * I am not quite sure if this is a USB hid device limitation.
	 *
	 */
	public function send(string $str, int $writeLenDivisor = 2, int $maxWriteLen = 8){
		#echo("Sending ".$str);
		//fwrite($this->stream, $str, strlen($str));
		stream_set_blocking($this->stream, true);
		for($written = 0; $written < strlen($str); $written += $res){
			$writeChunk = substr($str, $written);
			$padding = $writeLenDivisor - (strlen($writeChunk) % $writeLenDivisor);
			if($padding !== 0){
				$writeChunk .= str_repeat("\0", $padding);
				echo("Padded writeChunk with ".$padding." NUL bytes. Len is now: ".strlen($writeChunk)."\n");
			}
			$res = fwrite($this->stream, $writeChunk, $maxWriteLen);
			echo("called: fwrite(this->stream, ".bin2hex($writeChunk).", ".$maxWriteLen.")\n");
			echo("lendataleft:".strlen(substr($str, $written))."fwriteresult:".$res);
			var_dump($res);
			if($res == 0){
				throw new Exception("Failed to write to device ".$this->deviceFile);
			}
		}
		echo("DONE WRITE".PHP_EOL);
		stream_set_blocking($this->stream, false);
	}
	
	public function readUntil(string $until = "\r", int $maxReads = 500){
		$str = "";
		for($i = 0; $i < $maxReads; ++$i){
			usleep(1000);
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