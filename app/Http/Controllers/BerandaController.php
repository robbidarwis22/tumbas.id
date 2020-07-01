<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class BerandaController extends Controller
{
    public function index()
    {
        $products = Product::take(12)->orderBy('id','DESC')->get();
        return view('homepage.homepage',compact('products'));
    }
}
