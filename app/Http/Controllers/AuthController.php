<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Alert;

class AuthController extends Controller
{
    protected $category;
    public function __construct(){
        $this->category = Category::where('parent_id', null)->get();
    }

    public function register(){
        $category = $this->category;
        return view('homepage.register',compact('category'));
    }

    protected function store(Request $data)
    {
        $mydata = [
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'birthday' => $data['birthday'],
            'role' => $data['role'],
            'status' => "0",
            'password' => bcrypt($data['password']),
        ];
        User::create($mydata);
        alert()->success('Success Message', 'Pendaftaran Berhasil');
		return redirect('/');
    }
}   
