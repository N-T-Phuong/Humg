<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HoSo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

     public function dashboard()
     {
        return view('backend.dash.index');
     }
     public function home()
     {
        return view('fontend.home');
     }
     public function index()
     {
        return view('fontend.include.master');
     }
     public function huongdan()
     {
        return view('fontend.huong_dan');
     }
     public function gioithieu()
     {
        return view('fontend.gioithieu');
     }
     public function tracuuhoso()
     {
        return view('fontend.tracuuhoso');
     }
     public function thongbao()
     {
        $hoso = HoSo::all();
        return view('fontend.thongbao', compact('hoso'));
     }
}
