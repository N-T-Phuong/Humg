<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sinhvien = SinhVien::all();
        return view('backend.sinhvien.index', compact('sinhvien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sinhvien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = $request->validate([
            'tenSV' => 'required|max:255',
            'maSV' => 'required|min:10|max:50',
            'khoa' => 'required|max:255',
            'lop' => 'required|max:255',
            'phone'    => 'required|numeric',
            'email'    => 'required|email',
            'diachi'  => 'required|max:255',
        ]);
        $sinhvien = SinhVien::create($store);
        return redirect(route('sinhvien.index'))->with('thongbao', 'Thêm mới thành công');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        return view('backend.phongban.edit', compact('sinhvien'));
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
            'tenSV' => 'required|max:255',
            'maSV' => 'required|min:10|max:50',
            'khoa'  => 'required|max:255',
            'lop'  => 'required|max:255',
            'phone'    => 'required|numeric',
            'email'    => 'required|email',
            'diachi'  => 'required|max:255',
        ]);
        SinhVien::whereId($id)->update($update);
        return redirect(route('st_index'))->with('thongbao', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sinhvien = SinhVien::findOrFail($id);
        $sinhvien->delete();
        return redirect(route('st_index'))->with('thongbao', 'xóa thành công');
    }
}
