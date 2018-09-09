<?php

namespace App\Controllers;

class User
{
    public function display()
    {
        session_destroy();
        header('Location:' . HOST);
    }
}
