<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BieuMauController;
use App\Http\Controllers\HomeController;

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/', [HomeController::class, 'home'])->name('dang_nhap');
Route::get('/huong-dan', [HomeController::class, 'huongdan'])->name('huong_dan');
Route::get('/gioi-thieu', [HomeController::class, 'gioithieu'])->name('gioi_thieu');
Route::get('/thu-tuc', [HomeController::class, 'xem_thu_tuc'])->name('dich_vu');
Route::get('/thutuc/{id}', 'Backend\ThuTucController@show')->name('tt.show');
Route::get('/tra-cuu-ho-so-truc-tuyen', 'HomeController@tracuuhoso')->name('tra_cuu');
Route::get('/nop-ho-so', 'Backend\ThuTucController@nop_ho_so')->name('nop_ho_so')->middleware('auth.check')->middleware('role:sinhvien|canbo|admin');
//Biểu mẫu
Route::get('/thutuc-view/{id}', 'BieuMauController@index')->name('bieumau_form');
Route::resource('hoso', 'Backend\HoSoController')->only('create', 'store')->middleware('auth')->middleware('role:sinhvien');
Route::get('/thong-bao', [HomeController::class, 'thongbao'])->name('thong_bao');


Route::group([
    'middleware' => 'auth',
    'prefix' => 'hethong'
], function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('role:admin|canbo');
    Route::get('/bao-cao', 'HomeController@baocao')->name('bao_cao')->middleware('role:admin|canbo');
    Route::get('/bao-cao-loai-thu-tuc', 'HomeController@baocao_tt')->name('bao_cao_tt')->middleware('role:admin|canbo');
    Route::resource('users', 'Backend\UserController')->middleware('role:admin');
    Route::resource('hp', 'Backend\HocPhanController')->middleware('role:admin|canbo');
    Route::resource('danhmuc', 'Backend\DanhMucController')->only('index', 'create', 'store', 'edit', 'update', 'destroy')->middleware('role:admin|canbo');
    Route::resource('tt', 'Backend\ThuTucController')->middleware('role:admin|canbo');
    Route::resource('hoso', 'Backend\HoSoController')->only('index', 'edit', 'update', 'destroy', 'show')->middleware('role:admin|canbo');
    Route::post('/tt-form/{thutuc}', 'BieuMauController@createForm')->name('create_input_form')->middleware('role:admin|canbo');
    Route::delete('/form/{id}', 'BieuMauController@destroy_bm')->name('destroy_form')->middleware('role:admin|canbo');

    // Route::get('/download', 'Backend\HoSoController@download')->name('dow_file')->middleware('role:admin|canbo');
    // Route::get('action/{id}', 'Backend\HoSoController@up_Status')->name('action.status');
    Route::post('/xu-ly-ho-so/{hoso}', 'Backend\HoSoController@xu_ly_ho_so')->name('xlhs')->middleware('role:canbo');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/{id}', 'ProfileController@index')->name('profile');
Route::put('/profile/{id}', 'ProfileController@updateProfile')->name('profile.update');
Route::get('/doi-mat-khau/{id}', 'ProfileController@change_Pass')->name('change_pass');
Route::put('/doi-mat-khau/{id}', 'ProfileController@update_change_Pass')->name('update_change_pass');

Route::get('/canbo/soluongsohoxuly', [HomeController::class, 'soluongsohoxuly'])->name('canbo_sl_hs')->middleware('role:admin|canbo');
