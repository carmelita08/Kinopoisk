<?php

namespace Carmelita\FirstProject\Middleware;

use Carmelita\FirstProject\Kernel\Middleware\AbstractMiddleware;

class AuthMiddleware extends AbstractMiddleware
{
    public function handle(): void
    {
        if (! $this->auth->check()) {
            $this->redirect->to('/login');
        }
    }
}