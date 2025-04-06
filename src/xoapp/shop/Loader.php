<?php

namespace xoapp\shop;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

class Loader extends PluginBase
{
    use SingletonTrait {
        setInstance as private;
        reset as private;
    }

    protected function onEnable(): void
    {
        self::setInstance($this);
    }

    protected function onDisable(): void
    {

    }
}