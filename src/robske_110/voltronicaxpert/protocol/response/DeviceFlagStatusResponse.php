<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\response;

use robske_110\voltronicaxpert\protocol\DeviceFlag;

class DeviceFlagStatusResponse extends Response{
	public array $enabledFlags;
	public array $disabledFlags;
	
	protected function decode(FieldStream $dataStream){
		$flags = $dataStream->get();
		$enableFlagsPos = strpos($flags, "E");
		$disableFlagsPos = strpos($flags, "D");
		$this->enabledFlags = str_split(substr($flags, $enableFlagsPos+1, $disableFlagsPos-$enableFlagsPos-1));
		$this->disabledFlags = str_split(substr($flags, $disableFlagsPos+1));
	}
	
	public function info(){
		foreach($this->enabledFlags as $enabledFlag){
			echo(DeviceFlag::FLAGS[$enabledFlag]." enabled".PHP_EOL);
		}
		foreach($this->disabledFlags as $enabledFlag){
			echo(DeviceFlag::FLAGS[$enabledFlag]." disabled".PHP_EOL);
		}
	}
}