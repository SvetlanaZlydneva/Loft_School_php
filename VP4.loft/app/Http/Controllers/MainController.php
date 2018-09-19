<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main', ['title' => 'Главная', 'categories' => Category::all(), 'products' => Product::all()]);
    }
}
