<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class Main
{
    protected $twig;
    protected $user;

    public function __construct()
    {
        $this->twig = new View();
        $this->user = new User();
    }

    public function display()
    {
        $this->twig->view('main', [
            'title' => 'authorization'
        ]);
    }

    public function authorization()
    {
        $resultAuthorization = 0;
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $idUser = $this->user->searchEmail($_POST['email']);
        $user = $this->user->getInfoUser($idUser);
        if ($password == $user[0]['password'] && $email == $user[0]['email']) {
            session_start();
            $_SESSION['idUser'] = $idUser;
            if ($user[0]['rights'] == 1) {
                $resultAuthorization = 2;
            } else {
                $resultAuthorization = 1;
            }
        }
        echo $resultAuthorization;
    }
}
