<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol;

abstract class CRC{
	/**
	 * xmodem crc (polyn: 0x1021)
	 * @param string $data
	 *
	 * @return int
	 */
	public static function crc16(string $data){
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
		$low = ($result & 0x00FF);
		if($low === 0x0a || $low === 0x28 || $low === 0x0d){
			$result += 1;
		}
		$high = ($result >> 8);
		if($high === 0x0a || $high === 0x28 || $high === 0x0d){
			$result += 2**8;
		}
		return $result;
	}
}
