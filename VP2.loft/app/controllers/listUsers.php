<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Fakers\FakerUsers;

class ListUsers
{
    protected $twig;
    protected $user;
    protected $listUsers;
    protected $sortByAge;
    protected $fakers;

    public function __construct()
    {
        $this->twig = new View();
        $this->user = new User();
    }

    public function display()
    {
        $this->getListUsers();
        $this->twig->twigLoad('listUsers', ['title' => 'listUsers', 'listUsers' => $this->listUsers]);
    }

    public function getListUsers()
    {
        $this->sortByAge();
        $this->listUsers = $this->user->listUsersBySort($this->sortByAge);
    }

    public function sortByAge()
    {
        if (empty($_POST['sort'])) {
            $this->sortByAge = 'desc';
        } else {
            $this->sortByAge = $_POST['sort'];
        }
    }

    public function initFakers()
    {
        $this->fakers = new FakerUsers();
        $this->fakers->initFaker();
        header('Location:' . HOST . 'listUsers');
    }
}
