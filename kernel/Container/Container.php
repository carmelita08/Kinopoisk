<?php

namespace Carmelita\FirstProject\Kernel\Container;

use Carmelita\FirstProject\Kernel\Auth\Auth;
use Carmelita\FirstProject\Kernel\Auth\AuthInterface;
use Carmelita\FirstProject\Kernel\Config\Config;
use Carmelita\FirstProject\Kernel\Config\ConfigInterface;
use Carmelita\FirstProject\Kernel\Database\Database;
use Carmelita\FirstProject\Kernel\Database\DatabaseInterface;
use Carmelita\FirstProject\Kernel\Http\Redirect;
use Carmelita\FirstProject\Kernel\Http\RedirectInterface;
use Carmelita\FirstProject\Kernel\Http\Request;
use Carmelita\FirstProject\Kernel\Http\RequestInterface;
use Carmelita\FirstProject\Kernel\Router\Router;
use Carmelita\FirstProject\Kernel\Router\RouterInterface;
use Carmelita\FirstProject\Kernel\Session\Session;
use Carmelita\FirstProject\Kernel\Session\SessionInterface;
use Carmelita\FirstProject\Kernel\Storage\Storage;
use Carmelita\FirstProject\Kernel\Storage\StorageInterface;
use Carmelita\FirstProject\Kernel\Validator\Validator;
use Carmelita\FirstProject\Kernel\Validator\ValidatorInterface;
use Carmelita\FirstProject\Kernel\View\View;
use Carmelita\FirstProject\Kernel\View\ViewInterface;

class Container
{
    public readonly RequestInterface $request;

    public readonly RouterInterface $router;

    public readonly ViewInterface $view;

    public readonly ValidatorInterface $validator;

    public readonly RedirectInterface $redirect;

    public readonly SessionInterface $session;

    public readonly ConfigInterface $config;

    public readonly DatabaseInterface $database;

    public readonly AuthInterface $auth;

    public readonly StorageInterface $storage;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->validator = new Validator();
        $this->request->setValidator($this->validator);
        $this->redirect = new Redirect();
        $this->session = new Session();
        $this->config = new Config();
        $this->database = new Database($this->config);
        $this->auth = new Auth($this->database, $this->session, $this->config);
        $this->storage = new Storage($this->config);
        $this->view = new View($this->session, $this->auth, $this->storage);
        $this->router = new Router(
            $this->view,
            $this->request,
            $this->redirect,
            $this->session,
            $this->database,
            $this->auth,
            $this->storage
        );
    }
}