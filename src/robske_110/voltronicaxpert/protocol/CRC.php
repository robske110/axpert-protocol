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
		return $result;
	}
}
