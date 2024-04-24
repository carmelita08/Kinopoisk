<?php

namespace Carmelita\FirstProject\Kernel\Router;

interface RouterInterface
{
    public function dispatch(string $uri, string $method): void;
}