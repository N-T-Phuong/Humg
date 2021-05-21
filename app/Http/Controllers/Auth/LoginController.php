<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('backend.auth.login');
        }
        $credentials = $request->only(['email', 'password']);
        if (Auth::attempt($credentials)) {
//            return redirect()->route('dashboard');
            if (Auth::user()->role == 0) {
                return redirect()->route('dashboard');
            } else if (Auth::user()->role == 1) {
                return redirect()->route('huong_dan');
            }
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
