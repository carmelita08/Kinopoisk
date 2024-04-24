<?php

namespace Carmelita\FirstProject\Kernel\Config;

use Carmelita\FirstProject\Kernel\Config\ConfigInterface;

class Config implements ConfigInterface
{
    public function get(string $key, $default = null): mixed
    {
        [$file, $key] = explode('.', $key);

        $configPath = APP_PATH."/config/$file.php";

        if (! file_exists($configPath)) {
            return $default;
        }

        $config = require $configPath;

        return $config[$key] ?? $default;
    }
}