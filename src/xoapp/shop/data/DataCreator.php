<?php

namespace xoapp\shop\data;

use pocketmine\utils\Config;
use xoapp\shop\Loader;

class DataCreator
{
    private Config $config;

    public function __construct(
        private readonly string $path
    )
    {
        $this->config = new Config(Loader::getInstance()->getDataFolder() . $this->path . ".json", Config::JSON);
    }

    public function get(string $key, mixed $defaultValue = null): mixed
    {
        return $this->config->get($key, $defaultValue);
    }

    public function set(string $key, mixed $value): void
    {
        $this->config->set($key, $value);
        $this->config->save();
    }

    public function exists(string $key): bool
    {
        return $this->config->exists($key);
    }

    public function delete(string $key): void
    {
        $this->config->remove($key);
        $this->config->save();
    }

    public function getAll(bool $keys = false): array
    {
        return $this->config->getAll($keys);
    }
}