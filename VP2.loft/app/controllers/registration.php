<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class Registration
{
    protected $twig;
    protected $user;
    protected $name;
    protected $email;
    protected $password;
    protected $age;
    protected $about;
    protected $resultAuthorization = 1;


    public function __construct()
    {
        $this->twig = new View();
        $this->user = new User();
    }

    public function display()
    {
        $this->twig->twigLoad('registration', ['title' => 'registration']);
    }

    public function getPost()
    {
        $this->name = $this->inspectedEmptyPost('name');
        $this->email = $this->inspectedEmptyPost('email');
        $this->password = $this->inspectedEmptyPost('password');
        $this->age = $this->inspectedEmptyPost('age');
        $this->about = $this->inspectedEmptyPost('about');
        if ($this->resultAuthorization == 1) {
            $this->initialize();
        }
        echo $this->resultAuthorization;
    }

    public function inspectedEmptyPost($value)
    {
        if (!is_int($_POST['age'])) {
            $this->resultAuthorization = 0;
        }
        if (!empty($this->user->searchEmail($_POST['email']))) {
            $this->resultAuthorization = 2;
        } else {
            if (!empty($_POST[$value])) {
                return trim(htmlspecialchars(strip_tags($_POST[$value])));
            } elseif (empty($_POST['about'])) {
                $this->resultAuthorization = 1;
                return trim(htmlspecialchars(strip_tags($_POST[$value])));
            }
        }
    }

    protected function initialize()
    {
        $this->user->insertUser(
            $this->name,
            $this->email,
            $this->password,
            $this->age,
            $this->about
        );
    }
}
