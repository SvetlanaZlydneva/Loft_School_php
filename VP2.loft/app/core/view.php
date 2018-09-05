<?php

namespace App\Core;

class View
{
    protected $loader;
    protected $twig;

    public function __construct($data = [])
    {
        $this->loader = new \Twig_Loader_Filesystem(VIEWS);
        $this->twig = new \Twig_Environment($this->loader);
        $this->twig->addGlobal('session', $_SESSION);
    }

    public function twigLoad($filename, array $data)
    {
        echo $this->twig->render($filename . ".twig", $data);
    }
}
