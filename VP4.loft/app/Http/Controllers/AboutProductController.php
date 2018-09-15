<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class AboutProductController extends Controller
{
    public function index()
    {
        return view('about');
    }
}
