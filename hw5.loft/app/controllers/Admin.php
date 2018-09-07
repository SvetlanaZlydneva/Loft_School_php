<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Models\Order;

class Admin
{
    protected $twig;
    protected $user;
    protected $order;
    protected $listUsers;
    protected $listOrders;

    public function __construct()
    {
        $this->twig = new View();
        $this->user = new User();
        $this->order = new Order();
    }

    public function display()
    {
        $this->getListOrders();
        $this->getListUsers();
        $this->twig->view('admin', ['users' => $this->listUsers,'orders' => $this->listOrders]);
    }

    public function getListUsers()
    {
        $this->listUsers = $this->user->listUsers();
    }
    public function getListOrders()
    {
        $this->listOrders = $this->order->listOrders();
    }
}
