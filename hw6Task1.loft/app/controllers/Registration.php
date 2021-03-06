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
    protected $resultAuthorization;


    public function __construct()
    {
        $this->twig = new View();
        $this->user = new User();
    }

    public function display()
    {
        $this->twig->view('registration', ['title' => 'registration']);
    }

    public function getPostVar()
    {
        $this->name = $this->inspectedEmptyPost('name');
        $this->email = $this->inspectedEmptyPost('email');
        $this->password = $this->inspectedEmptyPost('password');
        $this->age = $this->inspectedEmptyPost('age');
        $this->about = $this->inspectedEmptyPost('about');
        $this->resultRegistration();
    }

    public function resultRegistration()
    {
        if ($this->resultAuthorization == 1) {
            $this->register();
        }
        echo $this->resultAuthorization;
    }

    public function inspectedEmptyPost($value)
    {

        if (!empty($this->user->searchEmail($_POST['email']))) {
            $this->resultAuthorization = 2;
        } else {
            if (!is_int($_POST['age'])) {
                $this->resultAuthorization = 0;
            }
            if (empty($_POST[$value]) && $value != 'about') {
                $this->resultAuthorization = 0;
            } else {
                $this->resultAuthorization = 1;
                return trim(htmlspecialchars(strip_tags($_POST[$value])));
            }
        }
    }

    protected function register()
    {
        $this->user->create(
            $this->name,
            $this->email,
            $this->password,
            $this->age,
            $this->about
        );
    }
}
