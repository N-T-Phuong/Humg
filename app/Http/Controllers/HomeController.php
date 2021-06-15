<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HoSo;
use App\Models\ThuTuc;
use App\Models\User;
use App\Models\XuLyHoSo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
     public function dashboard ()
     {
         $hs_count = HoSo::count();
         $user_count = User::count();
         $tt_count = ThuTuc::count();
         $hs = HoSo::where('trang_thai','Chờ tiếp nhận')->orderBy('id', 'desc')->paginate(10);
        return view('backend.dash.index', compact('hs_count', 'user_count', 'tt_count', 'hs'));
     }
     public function home ()
     {
        return view('fontend.home');
     }
     public function huongdan ()
     {
        return view('fontend.huong_dan');
     }
     public function gioithieu ()
     {
        return view('fontend.gioithieu');
     }
     public function tracuuhoso (Request $rq)
     {
         $search = $rq->input('search');
         $query = HoSo::query();
         if ($search) {
             $query->where('hoso_code', 'like', "%{$search}%");
         }
         $hoso = $query->orderBy('id', 'desc')->paginate(10);
        return view('fontend.tracuuhoso', compact('hoso'));
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
