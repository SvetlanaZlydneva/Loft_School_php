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

    public function getPassword($idUser)
    {
        $result = $this->where('idUser', $idUser)->value('password');
        return $result;
    }

    public function insertUser($name, $email, $password, $age, $about)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = md5($password);
        $this->age = $age;
        $this->about = $about;
        $this->save();
    }

    public function getById($idUser, $column)
    {
        $result = $this->where('idUser', $idUser)->value($column);
        return $result;
    }

    public function uploadProfilePhoto($fileName)
    {
        $result = $this->where('idUser', $_SESSION['idUser'])->update(array('photo' => $fileName));
        return $result;
    }

    public function listUsersBySort($sort)
    {
        $result = $this->orderBy('age', $sort)->get()->toarray();
        return $result;
    }
}
