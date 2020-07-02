<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class BerandaController extends Controller
{
    protected $category;
    public function __construct(){
        $this->category = Category::where('parent_id', null)->get();
    }

    public function index()
    {
        $category = $this->category;
        $products = Product::take(12)->orderBy('id','DESC')->get();
        return view('homepage.homepage',compact('products','category'));
    }

    public function product(){
        $category = $this->category;
        $products = Product::orderBy('id','DESC')->paginate(8);
        return view('homepage.product',compact('products','category'));
    }
}
