<?php

namespace Carmelita\FirstProject\Kernel\Middleware;

use Carmelita\FirstProject\Kernel\Auth\AuthInterface;
use Carmelita\FirstProject\Kernel\Http\RedirectInterface;
use Carmelita\FirstProject\Kernel\Http\RequestInterface;

abstract class AbstractMiddleware
{
    public function __construct(
        protected RequestInterface $request,
        protected AuthInterface $auth,
        protected RedirectInterface $redirect
    ) {
    }

    abstract public function handle(): void;
}