<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

/**
 * Implements a
 */
class FieldStream{
	private int $fieldPos = 0;
	private array $fields;
	
	public function __construct(string $data){
		$this->fields = explode($data, " ");
	}
	
	public function setPos(int $fieldPos){
		$this->fieldPos = $fieldPos;
	}
	
	public function skip(int $fieldCnt = 1){
		$this->fieldPos += $fieldCnt;
	}
	
	public function remaining(): int{
		return count($this->fields) - $this->fieldPos;
	}
	
	/**
	 * Reads a field from the stream
	 */
	public function get(): string{
		return $this->fields[$this->fieldPos++];
	}
}