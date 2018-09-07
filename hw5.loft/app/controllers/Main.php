<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Models\Order;
use App\Core\Swift;

class Main
{
    protected $twig;
    protected $user;
    protected $order;
    protected $swift;
    protected $result = 1;
    protected $delivery = ['street', 'home', 'part', 'appt', 'floor'];
    protected $email;
    protected $name;
    protected $phone;
    protected $address;
    protected $comment;
    protected $payment;
    protected $callback;
    protected $idOrder;

    public function __construct()
    {
        $this->twig = new View();
        $this->user = new User();
        $this->order = new Order();
        $this->swift = new Swift();
    }

    public function display()
    {
        $this->twig->view('main', []);
    }

    public function getPost()
    {
        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
        $this->phone = $_POST['phone'];
        $this->address = $this->getAddress();
        $this->comment = $_POST['comment'];
        $this->payment = $_POST['payment'];
        $this->callback = $_POST['callback'];
        $this->inspectedPost();
        echo $this->result;
        $this->messageEmail();
        $this->swift->sendMessage($this->email, $this->messageEmail(), $this->idOrder);
    }

    public function inspectedPost()
    {

        if (empty($this->email) || empty($this->name) || empty($this->phone) || empty($this->address)) {
            $this->result = 0;
        } else {
            if (empty($this->user->searchEmail($this->email))) {
                $this->user->insertUser($this->name, $this->email, $this->phone);
            }
            $this->order->insertOrder(
                $this->user->searchEmail($this->email),
                $this->address,
                $this->comment,
                $this->payment,
                $this->callback
            );
        }
    }

    public function messageEmail()
    {
        $infoOrder = $this->order->getOrder();
        $this->idOrder = $infoOrder->idOrder;
        $message = date("d.m.Y H:i") . '
               Заказ №' . $infoOrder->idOrder . '
               “Ваш заказ будет доставлен по адресу” ' . $infoOrder->address . '
               DarkBeefBurger за 500 рублей, 1 шт
               “Спасибо - это ваш ' . $this->order->countOrder($infoOrder->buyer) . ' заказ”
               ';
        return $message;
    }

    protected function getAddress()
    {
        $address = [];
        foreach ($this->delivery as $value) {
            if (!empty($_POST[$value])) {
                array_push($address, " {$value} : {$_POST[$value]}");
            }
        }
        return implode(',', $address);
    }
}
