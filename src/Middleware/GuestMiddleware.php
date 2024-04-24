<?php

namespace Carmelita\FirstProject\Middleware;

use Carmelita\FirstProject\Kernel\Middleware\AbstractMiddleware;

class GuestMiddleware extends AbstractMiddleware
{
    public function handle(): void
    {
        if ($this->auth->check()) {
            $this->redirect->to('/home');
        }
    }
}