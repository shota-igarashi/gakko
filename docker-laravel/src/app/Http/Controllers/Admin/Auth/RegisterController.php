<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    // 作成に成功したら下記にリダイレクト
    protected $redirectTo = '/gakko/create';

    // ログイン状態を判断 -> 認証不要
    public function __construct()
    {
        $this->middleware('guest');
    }

    // ログインフォーム表示
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(Request $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    
    protected function guard()
    {
        return Auth::guard('admin'); //管理者認証のguardを指定
    }
}
