<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;
use App\Category;
use App\User;
use Auth;

class CartController extends Controller
{
    protected $category;
    public function __construct(){
        $this->category = Category::where('parent_id', null)->get();
    }

    public function index(Request $req){
        // Cart::destroy();
        $product = Product::find($req->id);
        Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => $req->qty, 'price' => $product->price]);
        return redirect('keranjang');
    }

    public function keranjang(){
        $category = $this->category;
        return view('homepage.keranjang',compact('category'));
    }

    public function update(Request $req){
        Cart::update($req->rowId, $req->qty);
        $category = $this->category;
        return redirect('keranjang');
    }
    
    public function delete($rowId){
        Cart::remove($rowId);
        $category = $this->category;
        return redirect('keranjang');
    }
}
