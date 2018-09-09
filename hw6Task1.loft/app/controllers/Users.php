<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class Users
{
    protected $user;
    protected $twig;
    protected $currentUser;
    protected $resultAuthorization;

    public function __construct()
    {
        $this->user = new User();
        $this->twig = new View();
    }

    public function exit()
    {
        session_destroy();
        header('Location:' . HOST);
    }

    public function edit()
    {
        $this->currentUser = $this->user->findById($_GET['id']);
        $this->twig->view('edit', [
            'title' => 'Edit',
            'id' => $this->currentUser[0]['idUser'],
            'name' => $this->currentUser[0]['name'],
            'email' => $this->currentUser[0]['email'],
            'password' => $this->currentUser[0]['password'],
            'age' => $this->currentUser[0]['age'],
            'about' => $this->currentUser[0]['about']
        ]);
    }

    public function updateUser()
    {
        $this->currentUser = $this->user->findById($_POST['id']);
        if ($this->currentUser[0]['name'] != $_POST['name']) {
            $this->user->updateById($this->currentUser[0]['idUser'], 'name', $this->trim('name'));
        }
        if ($this->currentUser[0]['email'] != $_POST['email']) {
            if (empty($this->user->searchEmail($_POST['email']))) {
                $this->user->updateById($this->currentUser[0]['idUser'], 'email', $this->trim('email'));
            }
        }
        if ($this->currentUser[0]['age'] != $_POST['age']) {
            $this->user->updateById($this->currentUser[0]['idUser'], 'age', $this->trim('age'));
        }
        if ($this->currentUser[0]['about'] != $_POST['about']) {
            $this->user->updateById($this->currentUser[0]['idUser'], 'about', $this->trim('about'));
        }
        header('Location:' . HOST . 'listUsers');
    }

    public function trim($name)
    {
        return trim(htmlspecialchars(strip_tags($_POST[$name])));
    }

    public function delete()
    {
        $this->user->deleteById($_GET['id']);
        header('Location:' . HOST . 'listUsers');
    }

    public function newUser()
    {
        $this->twig->view('newUser', []);
    }

    public function getPostVar()
    {
        $name = $this->inspectedEmptyPost('name');
        $email = $this->inspectedEmptyPost('email');
        $password = $this->inspectedEmptyPost('password');
        $age = $this->inspectedEmptyPost('age');
        $about = $this->inspectedEmptyPost('about');
        if ($this->resultAuthorization == 1) {
            $this->register($name, $email, $password, $age, $about);
        }
        header('Location:' . HOST . 'listUsers');
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

    protected function register($name, $email, $password, $age, $about)
    {
        $this->user->create(
            $name,
            $email,
            $password,
            $age,
            $about
        );
    }
}
