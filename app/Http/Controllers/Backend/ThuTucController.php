<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\ThuTuc;
use Illuminate\Http\Request;

class ThuTucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thutuc = ThuTuc::with('danhmuc')->get();
        return view('backend.thutuc.index', compact('thutuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = DanhMuc::all();
//        $thutuc = ThuTuc::all();
        //thutuc::where('trangthai',Thutuc::hienthi)->get();
        return view('backend.thutuc.create', compact( 'danhmuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thutuc = ThuTuc::create($request->all());
        return redirect(route('tt.index'))->with('error', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thutuc = Thutuc::find($id);
        return view('backend.thutuc.show', compact('thutuc'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thutuc = ThuTuc::findOrFail($id);
//        if (!$thutuc) {
//            return (404);
//        }
        $danhmuc = DanhMuc::all();
        return view('backend.thutuc.edit', compact('thutuc','danhmuc'));
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
            'maTT' => 'required|min:2',
            'tenTT' => 'required|max:255',
            'danhmuc_id'  => 'required|max:255',
            'mota' => 'required',
            'tg_giai_quyet'    => 'required',
        ]);
        ThuTuc::whereId($id)->update($update);
        return redirect(route('tt.index'))->with('error', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $thutuc = ThuTuc::findOrFail($id);
        $thutuc->delete();
        return redirect(route('tt.index'))->with('error', 'xóa thành công');
    }
    public function nop_ho_so()
    {
        $thutuc = ThuTuc::with('danhmuc')->get();
        return view('fontend.nop_ho_so.show_thutuc', compact('thutuc'));
    }
}
