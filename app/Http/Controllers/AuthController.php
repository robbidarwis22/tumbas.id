<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Alert;
use Mail;
use Auth;

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
        $remember_token = base64_encode($data['email']);
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
            'remember_token' => $remember_token,
        ];
        User::create($mydata);
        Mail::send('home',array('firstname' => $data['name'], 'remember_token' => $remember_token), function($pesan) use($data){
            $pesan->to($data['email'],'Verifikasi')->subject('Verifikasi Email');
            $pesan->from('polinemosproyek@gmail.com','Verifikasi Akun email anda');
        });
        alert()->success('Success Message', 'Pendaftaran Berhasil');
		return redirect('/');
    }

    public function verif($token){
        $user = User::where('remember_token',$token)->first();
        if($user->status=="0"){
            $user->status = "1";
        }
        $user->save();
        alert()->success('Success Message', 'Verifikasi Berhasil');
		return redirect('auth/register');
    }

    public function login(Request $request){
        $email = $request->email;
        $pwd = $request->password;

        if(Auth::attempt(['email' => $email,'password' => $pwd])){
            $cek = User::where('id',Auth::user()->id)->first();
            if($cek->status == 0){
            Auth::logout();
            alert()->success('Success Message', 'Maaf akun belum terverifikasi');
            return redirect('/');
            }else{
                return redirect()->back();
            }
        }else{
            alert()->success('Success Message', 'Maaf email atau password tidak sesuai');
		    return redirect('/');
        }
        
    }
}   
