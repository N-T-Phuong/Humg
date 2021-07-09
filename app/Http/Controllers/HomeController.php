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
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function dashboard(Request $request)
    {
        $hs_count = HoSo::count();
        $user_count = User::count();
        $tt_count = ThuTuc::count();
        $hs = HoSo::where('trang_thai', 'Chờ tiếp nhận')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('backend.dash.index', compact('hs_count', 'user_count', 'tt_count', 'hs'));
    }
    public function baocao(Request $request)
    {
        $params = $request->all();
        $startDate = Arr::get($params, 'txt_TU_NGAY', null);
        $endDate = Arr::get($params, 'txt_DEN_NGAY', null);
        $tinhtrang = Arr::get($params, 'tinh_trang', '');
        $hs = HoSo::query();
        if ($startDate) {
            $hs = $hs->whereDate('created_at', '>=', Carbon::create($startDate));
        }
        if ($endDate) {
            $hs = $hs->whereDate('created_at', '<=', Carbon::create($endDate));
        }
        if ($tinhtrang) {
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
        return view('backend.dash.baocao_hs', compact('hs', 'params', 'options', 'tinhtrang'));
    }
    public function baocao_tt(Request $request)
    {
        $params = $request->all();
        $startDate = Arr::get($params, 'txt_TU_NGAY', null);
        $endDate = Arr::get($params, 'txt_DEN_NGAY', null);
        if ($startDate) $startDate = Carbon::create($startDate);
        if ($endDate) $endDate = Carbon::create($endDate);
        $thutuc = Thutuc::query()
            ->withCount([
                'hosodangxuly' => function ($query) use ($startDate, $endDate) {
                    if ($startDate) {
                        $query->whereDate('created_at', '>=', $startDate);
                    }
                    if ($endDate) {
                        $query->whereDate('created_at', '<=', $endDate);
                    }
                },
                'hosochuaxuly' => function ($query) use ($startDate, $endDate) {
                    if ($startDate) {
                        $query->whereDate('created_at', '>=', $startDate);
                    }
                    if ($endDate) {
                        $query->whereDate('created_at', '<=', $endDate);
                    }
                },
                'hosodaxuly' => function ($query) use ($startDate, $endDate) {
                    if ($startDate) {
                        $query->whereDate('created_at', '>=', $startDate);
                    }
                    if ($endDate) {
                        $query->whereDate('created_at', '<=', $endDate);
                    }
                },
                'hosotiepnhan' => function ($query) use ($startDate, $endDate) {
                    if ($startDate) {
                        $query->whereDate('created_at', '>=', $startDate);
                    }
                    if ($endDate) {
                        $query->whereDate('created_at', '<=', $endDate);
                    }
                },
                'hosohuy' => function ($query) use ($startDate, $endDate) {
                    if ($startDate) {
                        $query->whereDate('created_at', '>=', $startDate);
                    }
                    if ($endDate) {
                        $query->whereDate('created_at', '<=', $endDate);
                    }
                },
            ])
            ->orderBy('hosodangxuly_count', 'desc')
            ->orderBy('hosochuaxuly_count', 'desc')
            ->orderBy('hosodaxuly_count', 'desc')
            ->orderBy('hosotiepnhan_count', 'desc')
            ->orderBy('hosohuy_count', 'desc')
            ->get();
        return view('backend.dash.baocao_tt', compact('thutuc', 'params',));
    }
    public function home()
    {
        return view('fontend.home');
    }
    public function huongdan()
    {
        return view('fontend.huong_dan');
    }
    public function gioithieu()
    {
        return view('fontend.gioithieu');
    }
    public function tracuuhoso(Request $rq)
    {
        $search = $rq->input('search');
        $query = HoSo::query();
        if ($search) {
            $query->where('hoso_code', 'like', "%{$search}%");
        }
        $hoso = $query->orderBy('id', 'desc')->paginate(10);
        return view('fontend.tracuuhoso', compact('hoso'));
    }
    public function xem_thu_tuc(Request $request)
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
    public function thongbao()
    {
        return view('fontend.thongbao');
    }

    public function soluongsohoxuly()
    {
        $startDate = new Carbon('first day of this month');
        $canbo = User::query()
            ->select('users.id', 'users.name', 'users.phongban_id')
            ->role('canbo')
            ->withCount([
                'xulyhoso' => function ($query) use ($startDate) {
                    $query->leftJoin('hoso', 'hoso.id', 'xulyhoso.hoso_id')
                        ->whereDate('xulyhoso.created_at', '>=', $startDate)
                        ->where('hoso.trang_thai', '!=', 'Chờ tiếp nhận');
                }
            ])
            ->orderBy('xulyhoso_count', 'DESC')
            ->get();
        // return $canbo;
        // return $startDate;
        return view('backend.dash.baocao_canbo', compact('canbo', 'startDate'));
    }
}
