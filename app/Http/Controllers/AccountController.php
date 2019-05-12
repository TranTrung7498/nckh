<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function list(){
        if (Auth::user()->permission==1){
            $query = DB::table('users')->orderBy('permission','DESC')->get();
        } else {
            $query = DB::table('users')->where('permission','>',2)->orderBy('permission','DESC')->get();
        }
        return view('admin.account.list',['data'=>$query]);
    }
    public function getAdd(){
        return view('admin.account.add');
    }
    public function postAdd(Request $request){

        $this->validate($request,
            [
                'username' => 'required|max:16|unique:users',
                'password' => 'required|min:6',
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min',
                'max' => ':attribute không được lớn hơn :max',
                'unique' => ':attribute đã tồn tại',
            ],
            [
                'username' => 'Tên đăng nhập',
                'password' => 'Mật khẩu',
            ]
        );

        User::create([
            'name' => null,
            'email' => null,
            'username' => $request->username,
            'loginCode' => null,
            'level' => 0,
            'permission' => $request->permission,
            'password' => Hash::make($request->password),
        ]);

        return redirect('admin/account');
    }
    public function update($id){
        $data = DB::table('users')->where('id','=',$id)->get();
        return view('admin.account.update',['data'=>$data]);
    }
    public function postUpdate(Request $request){

    $this->validate($request,
            [
                'username' => 'required|max:16|unique:users',
                'password' => 'required|min:6',
            ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min',
                'max' => ':attribute không được lớn hơn :max',
                'unique' => ':attribute đã tồn tại',
            ],
            [
                'username' => 'Tên đăng nhập',
                'password' => 'Mật khẩu',
            ]
        );

        DB::table('users')->where('id','=',$request->id)
            ->update([
            'name' => null,
            'email' => null,
            'username' => $request->username,
            'loginCode' => null,
            'level' => 0,
            'permission' => $request->permission,
            'password' => Hash::make($request->password),
        ]);

        return redirect('admin/account');
    }

    public function delete($id){
        DB::table('users')->where('id','=',$id)->delete();
        return redirect('admin/account');
    }
}
