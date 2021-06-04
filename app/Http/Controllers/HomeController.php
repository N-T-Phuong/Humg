<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HoSo;
use App\Models\ThuTuc;
use App\Models\XuLyHoSo;
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
        return view('fontend.home');
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
     public function tracuuhoso (Request $request)
     {
//         $keyword = $request->input('keyword');
////         $query = XuLyHoSo::join('hoso', 'hoso.id', 'xulyhoso.hoso_id')->select('xulyhoso.*', 'hoso.hoso_code');
//         $query = XuLyHoSo::with('HoSo')->get();
//         if ($keyword) {
//             $query->where('hoso_code', 'like', "%{$keyword}%");
//         }
//         $query->orderBy('id', 'desc');
//         $thutuc = $query->paginate(15);
        return view('fontend.tracuuhoso');
     }
     public function xem_thu_tuc (Request $request)
     {
         $keyword = $request->input('keyword');
         $query = ThuTuc::join('danhmuc', 'danhmuc.id', 'thutuc.danhmuc_id')->select('thutuc.*', 'danhmuc.tenDM');
         if ($keyword) {
             $query->where('tenTT', 'like', "%{$keyword}%");
         }
         $query->orderBy('id', 'desc');
         $thutuc = $query->paginate(10);
        return view('fontend.dichvu', compact('thutuc'));
     }
     public function thongbao ()
     {
        return view('fontend.thongbao');
     }
}
