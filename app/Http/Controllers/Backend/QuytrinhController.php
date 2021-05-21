<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\QuyTrinh;
use App\Models\ThuTuc;
use Illuminate\Http\Request;

class QuytrinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quytrinh = QuyTrinh::with('id_thutuc')->get();
        return view('backend.quytrinh.index', compact('quytrinh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quytrinh = QuyTrinh::all();
        $thutuc = ThuTuc::all();
        return view('backend.quytrinh.create', compact('thutuc', 'quytrinh'));
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
            'maQT' => 'required|min:2|max:50',
            'tenQT' => 'required|max:255',
            'bieu_mau' => 'required|max:255',
            'trang_thai'  => 'required|max:255',
        ]);

        $quytrinh = Quytrinh::create($request->all());
        return redirect(route('qt.index'))->with('thongbao', 'Thêm mới thành công');
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
        $quytrinh = Quytrinh::findOrFail($id);
        $thutuc = Thutuc::all();
        return view('backend.quytrinh.edit', compact('quytrinh','thutuc'));
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
            'maQT' => 'required|min:2|max:50',
            'tenQT' => 'required|max:255',
            'bieu_mau' => 'required|max:255',
            'trang_thai'  => 'required|max:255',
        ]);
        Quytrinh::whereId($id)->update($update);
        return redirect(route('qt.index'))->with('thongbao', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quytrinh = Quytrinh::findOrFail($id);
        $quytrinh->delete();
        return redirect(route('qt.index'))->with('thongbao', 'xóa thành công');
    }
}
