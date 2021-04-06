<?php
declare(strict_types=1);
namespace robske_110\voltronicaxpert\protocol\command;

use InvalidArgumentException;
use robske_110\voltronicaxpert\protocol\SetCommandID;

class SetDeviceFlagStatus extends SetCommand{
	public static string $commandID = SetCommandID::DEVICE_FLAG_STATUS;
	
	/** @var bool Whether to enable (or disable) the flags */
	public bool $enable;
	/** @var string[] An array containing the DeviceFlags (see DeviceFlag class for list of flags) */
	public array $flags;
	
	/**
	 * @param string[] $flags Array containing the DeviceFlags (see DeviceFlag class for list of flags)
	 * @param bool $enable Whether to enable the flags (true for enable, false for disable)
	 */
	public function __construct(array $flags, bool $enable){
		if (empty($flags)){
			throw new InvalidArgumentException("Must at least supply one flag!");
		}
		if (count($flags) > 3){
			throw new InvalidArgumentException("A maximum of 3 flags are supported!");
		}
		$this->flags = $flags;
		$this->enable = $enable;
	}
	
	protected function encodePayload(): string{
		return ($this->enable ? "E" : "D") . implode("", $this->flags);
	}
}