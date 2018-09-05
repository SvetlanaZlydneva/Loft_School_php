<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Models\File;
use Intervention\Image\ImageManagerStatic as Image;

class UserImages
{
    protected $twig;
    protected $user;
    protected $file;
    protected $name;
    protected $email;
    protected $photo;
    protected $postFileName;

    public function __construct()
    {
        $this->twig = new View();
        $this->user = new User();
        $this->file = new File();
    }

    public function display()
    {
        $this->initUserData();
        $this->twig->twigLoad('userImages', [
            'title' => 'MyGallery',
            'name' => $this->name,
            'email' => $this->email,
            'photo' => $this->photo,
            'images' => $this->file->getPhotos()
        ]);
    }

    public function initUserData()
    {
        $this->name = $this->user->getById($_SESSION['idUser'], 'name');
        $this->email = $this->user->getById($_SESSION['idUser'], 'email');
        if (empty($this->user->getById($_SESSION['idUser'], 'photo'))) {
            $this->photo = 'noPhoto.jpg';
        } else {
            $this->photo = $this->user->getById($_SESSION['idUser'], 'photo');
        }
    }

    public function deleteSession()
    {
        session_destroy();
        header('Location:' . HOST);
    }

    public function updateProfilePhoto()
    {
        if ($this->inspectedAndMoveFile('profilePhoto')) {
            $this->user->uploadProfilePhoto($this->postFileName);
        } else {
            $this->user->uploadProfilePhoto('notFile.jpg');
        }
        header('Location:' . HOST . 'userImages');
    }

    public function uploadPhoto()
    {
        if ($this->inspectedAndMoveFile('photo')) {
            $this->resizePhoto($this->postFileName);
            $this->file->uploadPhoto($this->postFileName);
        } else {
            $this->file->uploadPhoto('notFile.jpg');
        }
        header('Location:' . HOST . 'userImages');
    }

    public function inspectedAndMoveFile($fileName)
    {
        $resultInspected = false;
        $files = ['jpg', 'png', 'jpeg'];
        if (!empty($_FILES[$fileName])) {
            $this->postFileName = $_FILES[$fileName]['name'];
            $fileExpansion = explode('.', $_FILES[$fileName]['name']);
            if (in_array($fileExpansion[1], $files)) {
                if ($fileName == 'profilePhoto') {
                    move_uploaded_file(
                        $_FILES[$fileName]['tmp_name'],
                        PUB . 'images/profile/' . $_FILES[$fileName]['name']
                    );
                } else {
                    move_uploaded_file(
                        $_FILES[$fileName]['tmp_name'],
                        PUB . 'images/photo/' . $_FILES[$fileName]['name']
                    );
                }
                $resultInspected = true;
            }
        }
        return $resultInspected;
    }

    public function resizePhoto($photo)
    {
        Image::make(PUB . 'images/photo/' . $photo)
            ->resize(300, 300)
            ->insert(PUB . 'images/photo/watermark.png')
            ->save(PUB . 'images/photo/' . $photo);
    }
}
