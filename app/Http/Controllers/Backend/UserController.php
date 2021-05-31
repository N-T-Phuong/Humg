<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('backend.user.index',compact('users'));
    }

    public function create()
    {
        return view('backend.user.add');
    }

    public function store(Request $request)
    {
        if (User::create($request->all())) {
            return redirect()->back()->with('success','Thêm mới tài khoản người dùng thành công');
        }else{
            return redirect()->back()->with('error','Thêm mới tài khoản thất bại, vui lòng thử lại');
        }
    }

    public function edit($id)
    {
        $user = User::findById($id);
        return view('backend.user.edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findById($id);
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$user->id.',id',
                'phone'  => 'min:4| max:15',
                'upload_avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],[
                'name.required' => 'Họ tên không được để trống',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng',
                'email.unique' => 'Email đã tồn tại',
                'phone.min' => 'Số điện thoại không đúng',
                'phone.max' => 'Số điện thoại không đúng',
                'upload_avatar.image' => 'File phải là ảnh',
                'upload_avatar.max' => 'Dung lượng file quá lớn',
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
    public function destroy($id)
    {
        $user = User::findById($id);
        $user->delete();
        return redirect(route('tt.index'))->with('error', 'xóa thành công');
//        if ($user->delete()) {
//            $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/user';
//
//            $image_path = $destinationPath . "/" . $user->avatar;
//            if (\File::exists($image_path)) {
//                \File::delete($image_path);
//            }
//            return redirect()->back()->with('success','Xóa thành công');
//        }
//        else {
//            return redirect()->back()->with('error','Xóa không thành công');
//        }
    }
}
