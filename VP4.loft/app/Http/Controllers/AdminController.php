<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $category;
    protected $product;
    protected $posFileName='noPhoto.jpg';

    public function __construct()
    {
        $this->category = new Category();
        $this->product = new Product();
    }

    public function index()
    {
        return view('admin', ['title' => 'Admin', 'categories' => Category::all(), 'products' => Product::all()]);
    }

    public function postCategory()
    {

        if (empty(Category::where('name', $_POST['name'])->value('name'))) {
            $this->category->create($_POST['name']);
        }
        return redirect()->route('admin');
    }

    public function delCategory()
    {
        Category::where('id', $_POST['id'])->delete();
        return redirect()->route('admin');
    }

    public function postProduct()
    {
        $this->product->create(
            $_POST['name'],
            $_POST['category'],
            $_POST['price'],
            $this->posFileName,
            $_POST['description']
        );
        return redirect()->route('admin');
    }
    public function delProduct()
    {
        Product::where('id', $_POST['id'])->delete();
        return redirect()->route('admin');
    }

}
