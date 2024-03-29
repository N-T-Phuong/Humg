<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
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

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt(array($fieldType => $credentials['email'], 'password' => $credentials['password']))) {
            //            return redirect()->route('dashboard');
            if (Auth::user()->hasRole('admin')) // Check admin => dashboard
                return redirect()->route('dashboard');
            if (Auth::user()->hasRole('canbo')) // check can bo => canbo
                return redirect()->route('dang_nhap');
            return redirect()->route('dang_nhap');
        } else {
            return redirect()->route('login')->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }
}
