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

    public function getInfoUser($idUser)
    {
        $result = $this->where('idUser', $idUser)->get()->toarray();
        return $result;
    }

    public function create($name, $email, $password, $age, $about)
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
        $this->where('idUser', $_SESSION['idUser'])->update(array('photo' => $fileName));
    }

    public function listUsersBySort($sort)
    {
        $result = $this->orderBy('age', $sort)->get()->toarray();
        return $result;
    }

    public function findById($id)
    {
        $result = $this->where('idUser', $id)->get()->toarray();
        return $result;
    }

    public function deleteById($idUser)
    {
        $this->where('idUser', $idUser)->delete();
    }

    public function updateById($idUser, $column, $value)
    {
        $this->where('idUser', $idUser)->update(array($column => $value));
    }
}
