<?php

namespace App\Controllers;

use App\Core\View;

class ListUsers
{
    protected $twig;

    public function __construct()
    {
        $this->twig = new View();
    }

    public function display()
    {

        $this->twig->twigLoad('listUsers', ['title' => 'listUsers']);
    }
}
