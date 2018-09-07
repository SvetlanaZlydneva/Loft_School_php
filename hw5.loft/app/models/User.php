<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    public $timestamps = false;

    public function searchEmail($email)
    {
        $result = $this->where('email', $email)->value('idUser');
        return $result;
    }

    public function insertUser($name, $email, $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->save();
    }

    public function listUsers()
    {
        $result = $this->get()->toarray();
        return $result;
    }
}
