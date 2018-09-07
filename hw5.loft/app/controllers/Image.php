<?php

namespace App\Controllers;

use App\Core\View;
use Intervention\Image\ImageManagerStatic as ImageIntervention;

class Image
{
    protected $twig;
    protected $postFileName;

    public function __construct()
    {
        $this->twig = new View();
    }

    public function display()
    {
        $this->twig->view('image', []);
    }

    public function getPostImage()
    {
        if ($this->inspectedFile()) {
            $this->moveFile();
            $this->resizePhoto($this->postFileName);
        }
        header('Location:'.HOST.'public/uploads/');
    }

    public function inspectedFile()
    {
        $files = ['jpg', 'png', 'jpeg'];
        if (!empty($_FILES['img'])) {
            $this->postFileName = $_FILES['img']['name'];
            $fileExpansion = explode('.', $_FILES['img']['name']);
            if (in_array($fileExpansion[1], $files)) {
                return true;
            }
        }
    }

    public function moveFile()
    {
        move_uploaded_file(
            $_FILES['img']['tmp_name'],
            UPLOADS . $_FILES['img']['name']
        );
    }

    public function resizePhoto($img)
    {
        ImageIntervention::make(UPLOADS . $img)
            ->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->rotate(-45)
            ->insert(UPLOADS . 'watermark.png')
            ->save(UPLOADS . $img);
    }
}
