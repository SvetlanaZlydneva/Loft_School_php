<?php

namespace App\Controllers;

use App\Core\View;

class UserImages
{
    protected $twig;

    public function __construct()
    {
        $this->twig = new View();
    }

    public function display()
    {

        $this->twig->twigLoad('userImages', ['title' => 'MyGallery']);
    }
}
