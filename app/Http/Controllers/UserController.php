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
}
