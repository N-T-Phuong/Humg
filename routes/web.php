<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;



Auth::routes();

Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout')->middleware('auth');
Route::get('/', [HomeController::class, 'home'])->name('dang_nhap');
Route::get('/huong-dan', [HomeController::class, 'huongdan'])->name('huong_dan');
Route::get('/gioi-thieu', [HomeController::class, 'gioithieu'])->name('gioi_thieu');
Route::get('/thutuc/{id}', 'Backend\ThuTucController@show')->name('tt.show');
Route::get('/tra-cuu-ho-so-truc-tuyen', 'HomeController@tracuuhoso')->name('tra_cuu');
//Biểu mẫu
Route::get('/thutuc-view/{id}', 'BieuMauController@index')->name('bieumau_form');
Route::get('/nop-ho-so', 'Backend\ThuTucController@nop_ho_so')->name('nop_ho_so')->middleware('auth');

Route::group([
    'middleware' => 'auth',
    'prefix' => 'user'
], function () {
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::resource('danhmuc', 'Backend\DanhMucController')->only('index', 'create', 'store', 'edit', 'update', 'destroy');;
    Route::resource('sinhvien', 'Backend\SinhVienController')->only('index', 'create', 'store', 'edit', 'update', 'destroy');;
    Route::resource('tt', 'Backend\ThuTucController')->only('index', 'create', 'store', 'edit', 'update', 'destroy');;
    Route::resource('hoso', 'Backend\HoSoController');
    Route::resource('qt', 'Backend\QuyTrinhController')->only('index', 'create', 'store', 'edit', 'update', 'destroy');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
