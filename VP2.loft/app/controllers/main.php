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
        $this->twig->twigLoad('main', [
            'title' => 'authorization'
        ]);
    }

    public function authorization()
    {
        $resultAuthorization = 0;
        if (!empty($_POST['email'])) {
            if (!empty($_POST['password'])) {
                $idUser = $this->user->searchEmail($_POST['email']);
                if ($idUser > 0) {
                    $password = $this->user->getPassword($idUser);
                    if (strcmp(md5($_POST['password']), $password) == 0) {
                        session_start();
                        $_SESSION['idUser'] = $idUser;
                        if ($_POST['email'] == 'admin') {
                            $resultAuthorization = 4;
                        } else {
                            $resultAuthorization = 1;
                        }
                    } else {
                        $resultAuthorization = 3;
                    }
                } else {
                    $resultAuthorization = 2;
                }
            }
        }
        echo $resultAuthorization;
    }

}
