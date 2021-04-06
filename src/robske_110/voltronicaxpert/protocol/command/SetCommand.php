<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use robske_110\voltronicaxpert\protocol\response\EmptyResponse;
use robske_110\voltronicaxpert\protocol\response\Response;

abstract class SetCommand extends Command{
	public function decode(string $data): Response{
		return new EmptyResponse($data);
	}
}