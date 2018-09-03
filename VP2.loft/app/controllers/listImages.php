<?php

namespace App\Controllers;

use App\Core\View;

class ListImages
{
    protected $twig;

    public function __construct()
    {
        $this->twig = new View();
    }

    public function display()
    {

        $this->twig->twigLoad('listImages', ['title' => 'listImages']);
    }
}
