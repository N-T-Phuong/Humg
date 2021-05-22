<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt(array($fieldType => $credentials['email'], 'password' => $credentials['password']))) {
            //            return redirect()->route('dashboard');
            if (Auth::user()->hasRole('admin')) // Check admin => dashboard
                return redirect()->route('dashboard');
            if (Auth::user()->hasRole('canbo')) // check can bo => canbo
                return redirect()->route('huong_dan');
            return redirect()->route('huong_dan');
        } else {
            return redirect()->route('auth.login')->with('thongbao', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('auth.login'));
    }
}
