<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\File;
use App\Fakers\FakerFiles;

class ListImages
{
    protected $twig;
    protected $file;
    protected $listImages;
    protected $fakers;

    public function __construct()
    {
        $this->twig = new View();
        $this->file = new File();
    }

    public function display()
    {
        $this->getListImages();
        $this->twig->view('listImages', ['title' => 'listImages', 'listImages' => $this->listImages]);
    }

    public function getListImages()
    {
        $this->listImages = $this->file->listImages();
    }
    public function initFakers()
    {
        $this->fakers = new FakerFiles();
        $this->fakers->initFaker();
        header('Location:' . HOST . 'listImages');
    }
}
