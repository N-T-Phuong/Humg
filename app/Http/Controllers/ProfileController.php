<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        return view('fontend.home.up_profile', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min: 5|max: 50',
            'email' => 'required|email|unique:users,email, '. auth()->user()->id . ',id',
            'phone' => 'max: 30',
            'address' => 'max: 150',
        ], [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email là không hợp lệ',
            'name.required' => 'Họ tên là trường bắt buộc'
        ]);
        $user = User::find($id);
        $user->update($data);
        return redirect()->back()->with('succses', trans('Thành công'));
    }
    public function change_Pass ($id)
    {
//        $user = User::findOrFail($id);
        return view('fontend.home.change_pass');
    }

    public function update_change_Pass (Request $request, $id)
    {
        $user = User::find($id);
        $validator = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:3|max:25',
            're_password' => 'required|min:3|max:25|same:new_password',
        ], [
            'old_password.required' => 'Mật khẩu cũ là trường bắt buộc',
            'new_password.required' => 'Mật khẩu mới là trường bắt buộc',
            'new_password.min'      => 'Mật khẩu mới tối thiểu 3 ký tự',
            're_password.required'  => 'Nhập lại mật khẩu mới là trường bắt buộc',
            're_password.same'      => 'Mật khẩu nhập lại không chính xác'
        ]);
        $oldPassword = $request->input('old_password');

        if (!\Hash::check($oldPassword, $user->password)) {
            return back()->withError('Mật khẩu cũ không chính xác');
        }

        $user->password = bcrypt($request->input('new_password'));
        $user->save();
        return redirect()->route('profile', Auth::id())->withSuccess('Thay đổi mật khẩu thành công');
    }

}
