<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\GetCommandID;
use robske_110\voltronicaxpert\protocol\response\ParallelInfoResponse;
use robske_110\voltronicaxpert\protocol\response\Response;

class GetParallelInfo extends Command{
	public static string $commandID = GetCommandID::PARALLEL_INFO;
	
	/** @var int The inverter number to fetch info for. */
	public int $parallelNum;
	
	public function __construct(int $parallelNum){
		$this->parallelNum = $parallelNum;
	}
	
	public function decode(string $data): Response{
		return new ParallelInfoResponse($data);
	}
	
	protected function encodePayload(): string{
		return (string) $this->parallelNum;
	}
}