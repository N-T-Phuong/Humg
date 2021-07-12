<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\HoSoMail;
use App\Models\DanhMuc;
use App\Models\FormType;
use App\Models\HoSo;
use App\Models\ThuTuc;
use App\Models\XuLyHoSo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Mail;

class HoSoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hoso = HoSo::with('formTypes')->get();
        return view('backend.hoso.index', compact('hoso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $thutuc  = ThuTuc::where($id)->first();
        return view('backend.bieumau.gheplop', compact('thutuc'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $code = date('dmY', time()) . '-' . substr(md5(microtime()), rand(0, 26), 5);
        // dd($request->all());
        $hoso = HoSo::create([
            'hoso_code'   => $code,
            'user_id'     => Auth::id(),
            'phone'       => $request->phone,
            'dia_chi'     => $request->diachi,
            'thutuc_id'   => $request->tt_id,
            'ngay_nhan'   => $request->ngay_nhan,
            'ngay_hen_tra'   => $request->ngay_hen,
        ]);
        //         dd($hoso);
        $thutuc = Thutuc::findOrFail($hoso['thutuc_id']);
        if ($request->field) {
            for ($i = 0; $i < count($request->field); $i++) {
                $value = $request->value[$i];
                if ($request->hasFile('file') && $request->file && $request->field[$i] == 'file') {
                    $files = $request->file('file');
                    $value = $thutuc->tenTT . '.' . $files->getClientOriginalExtension();
                    $files->storeAs('public/file_bm', $value);
                }
                FormType::create([
                    'hoso_id' => $hoso->id,
                    'field'   => $request->field[$i],
                    'value'   => $value,
                ]);
            }
        }
        FacadesMail::to(Auth::user()->email)
            ->send(new HoSoMail($code));
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hoso = HoSo::find($id);
        return view('backend.hoso.show', compact('hoso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hoso = HoSo::findOrFail($id);
        $hoso->xlhs;
        return view('backend.hoso.edit', compact('hoso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = $request->validate([
            'trang_thai'     => 'required',
        ]);
        $trangThai = $request->trang_thai;
        $hoso = Hoso::findOrFail($id);
        if ($trangThai == 'Tiếp nhận') { //$hoso->trang_thai == 'Chờ tiếp nhận' &&
            $hoso->trang_thai = $trangThai;
            $hoso->ngay_nhan = Carbon::now();
            $hoso->ngay_hen_tra = Carbon::now()->addDay($hoso->thutuc->tg_giai_quyet);
        }
        $hoso->save();
        return redirect()->route('hoso.index')->with('error', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hoso = HoSo::findOrFail($id);
        $hoso->delete();
        return redirect(route('hoso.index'))->with('error', 'xóa thành công hồ sơ' . "  " . $hoso->hoso_code);
    }

    public function up_Status($id, Request $request)
    {
        $hoso = HoSo::find($id);
        if ($hoso->trang_thai == 'Chờ tiếp nhận') {
            //a = date('Y-m-d H:i:s', strtotime('+'. '5 days' , strtotime($hoso->ngay_nhan)));
            $hoso->ngay_nhan = Carbon::now(); //date('Y-m-d H:i:s'); //
            //            $hoso->ngay_hen_trhoso->trang_thai = HoSo::STATUS_DONE;
        } elseif ($hoso->trang_thai == 'Tiếp nhận') {
            $hoso->trang_thai = HoSo::STATUS_DONE1;
        } else {
            $hoso->trang_thai = HoSo::STATUS_DONE2;
        }
        $hoso->save();
        return redirect()->back()->with('success', 'Cập nhật hồ sơ thành công');
    }
    public function xu_ly_ho_so(Request $request, HoSo $hoso)
    {
        //        dd($request->all());
        $request->validate([
            'noi_dung_xu_ly'        => 'required|max:255',
        ]);
        XuLyHoSo::create([
            'hoso_id'           => $hoso->id,
            'user_id'           => Auth::id(),
            'tg_thuc'           => $request->tg_thuc,
            'noi_dung_xu_ly'    => $request->noi_dung_xu_ly,
            'phong_ban_xu_ly'   => $request->phong_ban_xu_ly,
            'trang_thai' => $request->trang_thai
        ]);
        $hoso->trang_thai = $request->trang_thai;
        $hoso->save();
        return redirect()->back();
    }
}
