<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HoSo;
use App\Models\ThuTuc;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
     public function dashboard (Request $request)
     {
         $hs_count = HoSo::count();
         $user_count = User::count();
         $tt_count = ThuTuc::count();
         $hs = HoSo::where('trang_thai','Chờ tiếp nhận')
                ->orderBy('id', 'desc')
                ->paginate(10);
        return view('backend.dash.index', compact('hs_count', 'user_count', 'tt_count', 'hs'));
     }
     public function baocao (Request $request)
     {
         $params = $request->all();
         $startDate = Arr::get($params, 'txt_TU_NGAY', null);
         $endDate = Arr::get($params, 'txt_DEN_NGAY', null);
         $tinhtrang = Arr::get($params, 'tinh_trang', '');
         $hs = HoSo::query();
         if($startDate) {
            $hs = $hs->whereDate('created_at', '>=', Carbon::create($startDate));
         }
         if($endDate) {
            $hs = $hs->whereDate('created_at', '<=', Carbon::create($endDate));
         }
         if($tinhtrang) {
             $hs = $hs->where('trang_thai', $tinhtrang);
         }
         $options = [
            '' => 'Tất cả',
            'Đang xử lý' => 'Đang xử lý',
            'Hoàn thành' => 'Đã hoàn thành',
            'Chờ tiếp nhận' => 'Chờ tiếp nhận',
            'Tiếp nhận' => 'Tiếp nhận'
         ];
         $hs = $hs->orderBy('id', 'desc')->paginate(10);
        return view('backend.dash.baocao_hs', compact( 'hs', 'params', 'options', 'tinhtrang'));
     }
     public function baocao_tt (Request $request)
     {
         $params = $request->all();
         $startDate = Arr::get($params, 'txt_TU_NGAY', null);
         $endDate = Arr::get($params, 'txt_DEN_NGAY', null);
         $hs = HoSo::query();
         if($startDate) {
            $hs = $hs->whereDate('created_at', '>=', Carbon::create($startDate));
         }
         if($endDate) {
            $hs = $hs->whereDate('created_at', '<=', Carbon::create($endDate));
         }
         $hs->tt = ThuTuc::query()
             ->with('danhmuc')
             ->withCount(['hosodangxuly', 'hosodaxuly','hosohuy', 'hosochuaxuly', 'hosotiepnhan'])
             ->orderBy('id', 'desc')->paginate(100);
        return view('backend.dash.baocao_tt', compact( 'hs',  'params'));
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
