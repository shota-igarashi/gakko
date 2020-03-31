<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout'); //変更
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');  //変更
    }

    protected function guard()
    {
        return \Auth::guard('admin');  //変更
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();  //変更
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');  //変更
    }
}
