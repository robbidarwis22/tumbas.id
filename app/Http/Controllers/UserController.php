<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Alert;

class UserController extends Controller
{
    public function index(){
        $user = User::where('id','!=',Auth::user()->id)->get();
        return view('admin.user.index',compact('user'));
    }

    public function changestatus($id){
        $user = User::find($id);
        if($user->status==0){
            $change = '1';
        }else{
            $change = '0';
        }
        User::where('id',$id)->update(['status' =>$change]);
        alert()->success('Success Message', 'Status Berhasil diperbarui');
        return redirect('admin/user');
    }

    public function create(){
        return view('admin.user.add');
    }

    public function store(Request $data){
        $mydata = ([
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
        ]);
        User::create($mydata);
        alert()->success('Success Message', 'Status Berhasil Disimpan');
        return redirect('admin/user');
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }   

    public function update(Request $data){
        $mydata = ([
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
        ]);
        User::where('id',$data->id)->update($mydata);
        alert()->success('Success Message', 'Status Berhasil diperbarui');
        return redirect('admin/user');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        alert()->success('Success Message', 'Status Berhasil Dihapus');
        return redirect('admin/user');
    }
}
