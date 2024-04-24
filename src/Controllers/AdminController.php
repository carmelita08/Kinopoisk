<?php

namespace Carmelita\FirstProject\Controllers;

use Carmelita\FirstProject\Kernel\Controller\Controller;
use Carmelita\FirstProject\Services\CategoryService;
use Carmelita\FirstProject\Services\MovieService;

class AdminController extends Controller
{
    public function index(): void
    {
        $categories = new CategoryService($this->db());
        $movies = new MovieService($this->db());

        $this->view('admin/index', [
            'categories' => $categories->all(),
            'movies' => $movies->all(),
        ]);
    }
}