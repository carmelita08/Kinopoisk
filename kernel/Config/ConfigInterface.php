<?php

namespace Carmelita\FirstProject\Kernel\Config;

interface ConfigInterface
{
    public function get(string $key, $default = null): mixed;
}