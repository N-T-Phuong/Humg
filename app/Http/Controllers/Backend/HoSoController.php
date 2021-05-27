<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\HosoRequest;
use App\Models\User;
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
        $code = substr(md5(microtime()), rand(0,26),5);
        // dd($request->all());

        $hoso = HoSo::create([
            'hoso_code'   => $code,
            'user_id'     => Auth::user()->name,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'dia_chi'     => $request->diachi,
            'maSV'        => $request->ma,
            'khoa'        => $request->khoa,
            'lop'         => $request->lop,
            'thutuc_id'   => $request->tt_id,
        ]);
        $thutuc = Thutuc::findOrFail($hoso['thutuc_id']);
        if ($request->field) {
            for ($i = 0; $i < count($request->field); $i++) {
                $value = $request->value[$i];
                if ($request->hasFile('file') && $request->file && $request->field[$i] == 'file') {
                    $files = $request->file('file');
                    $value = time() . '.' . $files->getClientOriginalExtension();
                    $files->storeAs('public/file_bm', $value);
                }
                FormType::create([
                    'hoso_id' => $hoso->id,
                    'field'   => $request->field[$i],
                    'value'   => $value,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Nộp hồ sơ thành công');
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
