<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('backend.user.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('backend.user.add')->with([
            'roles' => $roles
        ]);
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $data = [
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => bcrypt($request->input('password')),
            'phone'     => $request->input('phone'),
            'khoa'      => $request->input('khoa'),
            'lop'       => $request->input('lop'),
            'diachi'    => $request->input('diachi'),
            'ma'        => $request->input('ma'),
        ];
        $user::create($data);
        $role = Role::findOrFail($request->type);
        $user->assignRole($role);
        return redirect()->route('users.create')->with('success', trans('Tạo mới thành công'));

    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('fontend.home.up_profile',compact('user'));
    }
    public function update (UpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = [
            'name'      => $request->input('name'),
            'phone'     => $request->input('phone'),
            'password'  => bcrypt($request->input('password')),
            'diachi'    => $request->input('diachi'),
        ];
        $user->update($data);
        return redirect()->route('users.edit', $id)->with('succses', trans('Sửa thành công'));
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('tt.index'))->with('error', 'xóa thành công');
    }
}
