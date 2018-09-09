<?php

namespace APP\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

class File extends Eloquent
{
    public $timestamps = false;

    public function uploadPhoto($fileName)
    {
        $this->user = $_SESSION['idUser'];
        $this->fileName = $fileName;
        $this->save();
    }

    public function getPhotos()
    {
        $result = $this->select('fileName')->where('user', $_SESSION['idUser'])->get()->toarray();
        return $result;
    }
    public function listImages()
    {
        $result =  $this->leftjoin('users', 'idUser', '=', 'files.user')->get()->toarray();
        return $result;
    }
}
