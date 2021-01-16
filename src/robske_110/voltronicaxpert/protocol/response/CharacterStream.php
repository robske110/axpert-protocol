<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

class CharacterStream{
	private int $pos = 0;
	
	public function __construct(private string $data){
	}
	
	public function skip(int $len){
		$this->pos += $len;
	}
	
	public function setPos(int $pos){
		$this->pos = $pos;
	}
	
	public function getPos(): int{
		return $this->pos;
	}
	
	public function remaining(): int{
		return strlen($this->data) - $this->pos;
	}
	
	public function get(): string{
		return $this->read(1);
	}
	
	/**
	 * Reads $len characters
	 * @param int $len
	 * @return string
	 */
	public function read(int $len = 1): string{
		$this->pos += $len;
		return substr($this->data, $this->pos-$bytes, $bytes);
	}
	
	public function rawData(): string{
		return $this->data;
	}
}