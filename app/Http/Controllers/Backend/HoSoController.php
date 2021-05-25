<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\HosoRequest;
use App\Models\Form;
use App\Models\FormType;
use App\Models\HoSo;
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
        //$hoso = HoSo::with('thutuc')->get(); //??
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
        $hoso = HoSo::create([
            'user_id' => Auth::id(),
            'phone' => $request->phone,
            'dia_chi' => $request->diachi,
            'ma' => $request->ma,
            'khoa' => $request->khoa,
            'lop' => $request->lop,
            'thutuc_id' => $request->tt_id,
        ]);
        $thutuc = Thutuc::findOrFail($hoso['thutuc_id']);
        $thutuc->forms;
        foreach($thutuc->forms as $form) {
            $formValue = FormType::create([
                'hoso_id' => $hoso->id,
                'field' => $form->field,
                'value' => $hoso[$form->field] // $hoso[123] $hoso['mssv']
            ]);
        }
        //TODO
        $fileName = "";
        if ($request->hasFile('file_dinh_kem')) {
            $files = $request->file('file_dinh_kem');
            $fileName = time() . '.' . $files->getClientOriginalExtension();
            $files->storeAs('public/file_bm', $fileName);
        }

        $form = FormType::create([
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

        // if ($request->tenhp) {
        //     for ($i = 0; $i < count($request->tenhp); $i++) {
        //         HocPhan::create([
        //             'form_id' => $form->id,
        //             'mahp' => $request->mahp[$i],
        //             'tenhp' => $request->tenhp[$i],
        //             'nhomhp' => $request->nhomhp[$i],
        //         ]);
        //     }
        // }
        return redirect(route('nop_ho_so'))->with('error', 'Nộp hồ sơ thành công');
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
        return response()->download('public/file_bm' . $file);
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
        //            Storage::delete('public/file_bm' . $file);
        //        }
    }
}
