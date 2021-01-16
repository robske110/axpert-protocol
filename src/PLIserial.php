<?php
namespace robske_110\pylonlv;

class PIPSerial{
	/** @var string */
	private $deviceFile;
	
	/** @var int */
	private $baudrate;
	
	/** @var resource */
	private $stream;
	
	public function __construct(string $deviceFile, int $baudrate = 115200){
		$this->deviceFile = $deviceFile;
		$this->baudrate = $baudrate;
	}
	
	public function open(){
		$this->stream = fopen($this->deviceFile, "r+"); //b?
		if($this->stream === false){
			echo("FAILED TO OPEN");
		}
		#exec("stty -f ".$this->deviceFile." ".$this->baudrate." cs8 -cstopb -parenb");
		stream_set_blocking($this->stream, false);
	}
	
	public function send(string $str, $writeLenDivisor = 2, $maxWriteLen = 8){
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
				echo("FAILED TO WRITE\n"); //throw ex
				return;
			}
		}
		echo("DONE WRITE".PHP_EOL);
		stream_set_blocking($this->stream, false);
	}

	public function readUntil(int $maxReads = 500){
		$str = "";
		for($i = 0; $i < $maxReads; ++$i){
			usleep(1000);
			$str .= stream_get_contents($this->stream);
			if(strpos($str, "\r") !== false){
				echo("\nFound end\n\n");
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


#xmodem (polyn: 0x1021)
function crc16(string $data){
	$result = 0;
	for($i = 0; $i < strlen($data); $i++){
		$result ^= ord($data[$i]) << 8;
		for($bitwise = 0; $bitwise < 8; $bitwise++){
			if(($result <<= 1) & 0x10000){
				$result ^= 0x1021;
			}
			$result &= 0xFFFF;
		}
	}
	return $result;
}

function decToHexStr(int $data, $len = 2){
	return strtoupper(str_pad(substr(dechex($data), -$len), $len, "0", STR_PAD_LEFT));
}

$pipSerial = new PIPSerial("/dev/hidraw0");
$pipSerial->open();
$start = microtime(true);
$pipSerial->send($argv[1].hex2bin(decToHexStr(crc16($argv[1]), 4)).chr(0x0D));
var_dump($pipSerial->readUntil());
echo("Took ".(microtime(true)-$start)."s");


#cmds: PEJ