<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function Check(Request $request) {
        $data=[
            'username'=>$request->username,
            'password'=>$request->password,
            /*'permission'=>$request->permission,*/
        ];
        if(Auth::attempt($data)){
            $temp = Auth::user()->permission;
            if ($temp==1||$temp==2){
                return redirect('admin/home');
            }
            else {
                return redirect('user/home');
            }
        }else{
            return redirect('/login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
