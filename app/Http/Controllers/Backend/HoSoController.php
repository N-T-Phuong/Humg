<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\HocPhan;
use App\Models\HoSo;
use App\Models\SinhVien;
use App\Models\ThuTuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HoSoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoso = HoSo::with('thutuc')->get();
        $form = Form::with('hoso')->get();
        return view('backend.hoso.index', compact('hoso', 'form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $sinhvien = SinhVien::all();
        $thutuc  = ThuTuc::where($id)->first();
        return view('backend.bieumau.gheplop', compact( 'thutuc', 'sinhvien'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $hoso = HoSo::create([
            'sv_id' => Auth::id(),
            'phone' => $request->phone,
            'dia_chi' => $request->diachi,
            'cmnd' => $request->cmnd,
            'ngay_cap' => $request->ngay_cap,
            'noi_cap' => $request->noi_cap,
            'thutuc_id' => $request->tt_id,
        ]);
        if ($request->hasFile('file_dinh_kem')) {
            $files = $request->file('file_dinh_kem');
            foreach ($request->file_dinh_kem as $file) {
                $fileName = time() . '.' .$file->getClientOriginalExtension() ;
                $file->storeAs('file_bm', $fileName);
                $hoso->form->create([
                    'id_hoso' => $hoso->id,
                    'khoa' => $request->khoa,
                    'bo_mon' => $request->bo_mon,
                    'lop' => $request->lop,
                    'ly_do' => $request->ly_do,
                    'tu_ngay' => $request->tu_ngay,
                    'den_ngay' => $request->den_ngay,
                    'hoc_ky' => $request->hoc_ky,
                    'lophp' => $request->lophp,
                    'dia_diem' => $request->dia_diem,
                    'dia_diem_moi' => $request->dia_diem_moi,
                    'do_an' => $request->do_an,
                    'file_dinh_kem' => $fileName,
                ]);
                HocPhan::create([
                    'mahp' => $request->mahp,
                    'tenhp' => $request->tenhp,
                    'nhomhp' => $request->nhomhp,
                ]);
            }
        }
        return redirect(route('nop_ho_so'))->with('error', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public  function  download($file)
    {
        return response()->download(config('file.storage') . $file);
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
        $form = Form::findOrFail($id);
        return view('backend.hoso.edit', compact('hoso', 'form'));
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
        return redirect(route('hoso.index'))->with('error', 'xóa thành công');
//        if ( ) {
//            Storage::delete(config('file.storage') . $file);
//        }
    }
}
