<?php
namespace Carmelita\FirstProject\Kernel;
use Carmelita\FirstProject\Kernel\Container\Container;
use Carmelita\FirstProject\Kernel\Http\Request;
use Carmelita\FirstProject\Kernel\Router\Router;


class App
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function run(): void
    {
        $this->container
            ->router
            ->dispatch(
                $this->container->request->uri(),
                $this->container->request->method()
            );
    }
}