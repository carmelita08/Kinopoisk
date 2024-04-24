<?php

namespace Carmelita\FirstProject\Kernel\Http;

interface RedirectInterface
{
    public function to(string $url);
}