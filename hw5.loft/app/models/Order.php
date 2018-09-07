<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Order extends Eloquent
{
    public $timestamps = false;

    public function insertOrder($buyer, $address, $comment, $payment, $callback)
    {
        $this->buyer = $buyer;
        $this->address = $address;
        $this->comment = $comment;
        $this->payment = $payment;
        $this->callback = $callback;
        $this->save();
    }

    public function listOrders()
    {
        $result = $this->leftjoin('users', 'idUser', '=', 'orders.buyer')->get()->toarray();
        return $result;
    }

    public function getOrder()
    {
        $result = $this->orderBy('idOrder', 'desc')->first();
        return $result;
    }

    public function countOrder($buyer)
    {
        $result = $this->where('buyer', $buyer)->count();
        return $result;
    }
}
