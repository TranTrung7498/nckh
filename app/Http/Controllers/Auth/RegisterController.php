<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'loginCode' => 'required',
            'email' => 'required|email|max:255',
            'username' => 'required|max:16|unique:users',
            'password' => 'required|min:6|confirmed',
        ],
            [
                'required' => ':attribute không được để trống',
                'min' => ':attribute không được nhỏ hơn :min',
                'max' => ':attribute không được lớn hơn :max',
                'email' => 'Hãy nhập đúng email',
                'unique' => ':attribute đã tồn tại',
                'confirmed' => 'Mật khẩu không khớp',
            ],
            [
                'name' => 'Tên',
                'loginCode' => 'Mã sinh viên/Giảng viên',
                'username' => 'Tên đăng nhập',
                'password' => 'Mật khẩu',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'loginCode' => $data['loginCode'],
            'level' => 0,
            'permission' => $data['permission'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
