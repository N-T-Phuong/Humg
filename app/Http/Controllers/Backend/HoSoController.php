<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\HosoRequest;
use App\Models\User;
use App\Models\FormType;
use App\Models\HoSo;
use App\Models\ThuTuc;
use App\Models\XuLyHoSo;
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
            'user_id'     => Auth::id(),
            'phone'       => $request->phone,
            'dia_chi'     => $request->diachi,
            'thutuc_id'   => $request->tt_id,
        ]);
        // dd($hoso);
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
        return redirect()->back()->with('error', 'Nộp hồ sơ thành công');
    }
    public  function  download($file)
    {
        return response()->download('public/file_bm' . $file);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $hoso = HoSo::join('formTypes', 'formTypes.id', 'hoso.hoso_id')
//            ->select('hoso.*', 'formTypes.*');
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
         $hoso->xulyhoso;
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
        $hoso = HoSo::findById($id);
        $request->validate(
            [
                'name' => 'required',
                'phone'  => 'min:4| max:15',
                'file' => 'file|max:2048',
            ],[
                'name.required' => 'Họ tên không được để trống',
                'phone.min' => 'Số điện thoại không đúng',
                'phone.max' => 'Số điện thoại không đúng',
                'file.max' => 'Dung lượng file quá lớn',
            ]
        );
        $request->offsetunset('_token');
//        if($request->hasFile('upload_avatar')){
//            $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/user';
//
//            $image_path = $destinationPath . "/" . $user->avatar;
//            if (\File::exists($image_path)) {
//                \File::delete($image_path);
//            }
//
//            $image      = $request->file('upload_avatar');
//            $imgName   = time() . '.' . $image->getClientOriginalExtension();
//            $image->move($destinationPath, $imgName);
//            $user->avatar = $imgName;
//        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->active = $request->active;
        $check = $user->save();
        if ($check){
            return redirect()->route('users.index')->with('success','Sửa thành công');
        }
        else{
            return redirect()->back()->with('error','Sửa thất bại, vui lòng thử lại');
        }
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

   public function up_Status( $id, Request $request)
    {
        $hoso = HoSo::find($id);
        // dd($hoso);
        // $xulyhoso = XuLyHoSo::where('hoso_id', $id)->get();

        // if($hoso)
        // {
        //     foreach ( $hoso as $hs ){
        //         $xlhs = XuLyHoSo::create([
        //             'hoso_id'           => $hoso->hoso_code,
        //             'user_id'           => Auth::id(),
        //             'ngay_chuyen_toi'   => $hs->ngay_chuyen_toi ,
        //             'ngay_tiep_nhan'    => $hs->ngay_tiep_nhan ,
        //             'ngay_hen_tra'      => $hs->ngay_hen_tra ,
        //             'phong_ban_xu_ly'   => $hs->phong_ban_xu_ly ,
        //             'noi_dung_xu_ly'    => $hs->noi_dung_xu_ly ,
        //             'trang_thai'        => $hs->trang_thai ,
        //         ]);
        //     }
        // }
        if($hoso->trang_thai=='Chờ tiếp nhận')
        {
            $hoso->trang_thai = HoSo::STATUS_DONE;
        } elseif($hoso->trang_thai=='Tiếp nhận'){
            $hoso->trang_thai = HoSo::STATUS_DONE1;
        }else{
            $hoso->trang_thai = HoSo::STATUS_DONE2;
        }
        $hoso->save();
        return redirect()->back()->with('success','Xử lý hồ sơ thành công');

    }
}
