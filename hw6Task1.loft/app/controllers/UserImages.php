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
    protected $avatar;
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
        $this->twig->view('userImages', [
            'title' => 'MyGallery',
            'name' => $this->name,
            'email' => $this->email,
            'photo' => $this->photo,
            'images' => $this->file->getPhotos()
        ]);
    }

    public function initUserData()
    {
        $user = $this->user->getInfoUser($_SESSION['idUser']);
        $this->name = $user[0]['name'];
        $this->email = $user[0]['email'];
        $this->photo = $user[0]['photo'];
        if (empty($this->photo)) {
            $this->avatar = 'noPhoto.jpg';
        } else {
            $this->avatar = $this->photo;
        }
    }

    public function getPostProfilePhoto()
    {
        if ($this->inspectedFile('profilePhoto')) {
            $this->moveFile('profilePhoto');
            $this->user->uploadProfilePhoto($this->postFileName);
        }
        header('Location:' . HOST . 'userImages');
    }

    public function getPostPhoto()
    {
        if ($this->inspectedFile('photo')) {
            $this->moveFile('photo');
            $this->resizePhoto($this->postFileName);
            $this->file->uploadPhoto($this->postFileName);
        }
        header('Location:' . HOST . 'userImages');
    }

    public function inspectedFile($fileName)
    {
        $files = ['jpg', 'png', 'jpeg'];
        if (!empty($_FILES[$fileName])) {
            $this->postFileName = $_FILES[$fileName]['name'];
            $fileExpansion = explode('.', $_FILES[$fileName]['name']);
            if (in_array($fileExpansion[1], $files)) {
                return true;
            }
        }
    }

    public function moveFile($fileName)
    {
        if ($fileName == 'profilePhoto') {
            move_uploaded_file(
                $_FILES[$fileName]['tmp_name'],
                PROFILE . $_FILES[$fileName]['name']
            );
        } else {
            move_uploaded_file(
                $_FILES[$fileName]['tmp_name'],
                PHOTO . $_FILES[$fileName]['name']
            );
        }
    }

    public function resizePhoto($photo)
    {
        Image::make(PHOTO . $photo)
            ->resize(300, 300)
            ->insert(PHOTO . '/watermark.png')
            ->save(PHOTO . $photo);
    }
}
