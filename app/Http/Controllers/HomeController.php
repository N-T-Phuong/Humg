<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function dashboard ()
    {
         return view('backend.dash.index');
    }
    public function home ()
    {
         return view('fontend.dang_nhap');
    }
    public function index ()
    {
         return view('fontend.include.master');
    }
    public function huongdan ()
    {
         return view('fontend.huong_dan');
    }
    public function gioithieu ()
    {
         return view('fontend.gioithieu');
    }
    public function tracuuhoso()
    {
        return view('fontend.tracuuhoso');
    }
}
