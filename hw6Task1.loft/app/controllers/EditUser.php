<?php

namespace App\Controllers;

use App\Models\User;
use App\Core\View;

class EditUser
{
    protected $user;
    protected $twig;
    protected $idUser;
    protected $editUser;

    public function __construct()
    {
        $this->user = new User();
        $this->twig = new View();
    }

    public function display()
    {

        $this->twig->view('edit', [
            'title' => 'edit',
            'name' => $this->editUser[0]['name'],
            'email' => $this->editUser[0]['email'],
            'password' => $this->editUser[0]['password'],
            'age' => $this->editUser[0]['age'],
            'about' => $this->editUser[0]['about']
        ]);
    }

    public function getId()
    {
        $this->idUser = $_GET['id'];
        $this->editUser = $this->user->findById($this->idUser);
        $this->display();
        $this->update();
    }

    public function update()
    {
        if (!empty($_POST['name'])&&$this->editUser[0]['name'] != $_POST['name']) {
            $this->user->updateModifiedField($this->idUser, 'name', $this->trimPost('name'));
        }
        if ($this->editUser[0]['email'] != $_POST['email']) {
            $this->user->updateModifiedField($this->idUser, 'email', $this->trimPost('email'));
        }
        if ($this->editUser[0]['password'] != md5($_POST['password'])) {
            $this->user->updateModifiedField($this->idUser, 'password', md5($this->trimPost('password')));
        }
        if ($this->editUser[0]['age'] != $_POST['age']) {
            $this->user->updateModifiedField($this->idUser, 'age', $this->trimPost('age'));
        }
        if ($this->editUser[0]['about'] != $_POST['about']) {
            $this->user->updateModifiedField($this->idUser, 'about', $this->trimPost('about'));
        }
        header('Location:' . HOST . 'listUsers');
    }

    public function trimPost($value)
    {
        return trim(htmlspecialchars(strip_tags($_POST[$value])));
    }
}
