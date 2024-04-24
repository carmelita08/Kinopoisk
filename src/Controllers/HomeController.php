<?php

namespace Carmelita\FirstProject\Controllers;

use Carmelita\FirstProject\Kernel\Controller\Controller;
use Carmelita\FirstProject\Kernel\View\View;
use Carmelita\FirstProject\Services\MovieService;

class HomeController extends Controller
{
    public function index(): void
    {
        $movies = new MovieService($this->db());

        $this->view('home', [
            'movies' => $movies->new(),
        ], 'Главная страница');
    }
}