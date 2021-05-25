<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class DanhMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuc = DanhMuc::all();
        return view('backend.phongban.index', compact('danhmuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.phongban.create');
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
            'maDM' => 'required|min:2|max:50',
            'tenDM' => 'required|max:255',
            'mota'  => 'required|max:255',
        ]);

        $danhmuc = DanhMuc::create($store);
        return redirect(route('danhmuc.index'))->with('thongbao', 'Thêm mới thành công');
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
        $danhmuc = DanhMuc::findOrFail($id);;
        return view('backend.phongban.edit', compact('danhmuc'));
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
            'maDM' => 'required|min:2|max:50',
            'tenDM' => 'required|max:255',
            'mota'  => 'required|max:255',
        ]);
        DanhMuc::whereId($id)->update($update);
        return redirect(route('danhmuc.index'))->with('thongbao', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $danhmuc = DanhMuc::findOrFail($id);
        $danhmuc->delete();
        return redirect(route('danhmuc.index'))->with('thongbao', 'xóa thành công');
    }
}
