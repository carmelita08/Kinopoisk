<?php

namespace Carmelita\FirstProject\Kernel\Middleware;

interface MiddlewareInterface
{
    public function check(array $middlewares = []): void;

}