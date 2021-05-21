@extends('fontend.include.master')
<div class="bg-humg">
@section('content')
    <br>
    <br>
    <div class="container ">
        <div class="row">
            <div class="col-md-6">
                <div class="guide-page__body bg-color-light box-shadow-main">
                    <h4 class="guide-page__title sidebar__title text-center" style="font-size: 20px;"><span> SINH VIÊN ĐĂNG NHẬP</span></h4>
                    <div class="guide-page__step">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">

                                <form id="mainForm" name="mainForm" action="{{route('login')}}" method="post">
                                    @csrf
                                    <div id="row" class="row ">
                                        <div class="col-md-2"></div>
                                        <div id="column" class="col-md-8 col ofset-2">
                                            <div id="P_TEN_DANG_NHAP" class="form-group text">
                                                <label id="" class="control-label">
                                                    <span class="label-content">Email</span>
                                                </label>
                                                <input id="" name="email" type="email" placeholder=" Nhập email đăng nhập" class="form-control @error('email') is-invalid @enderror"value="{{ old('email') }}" required >
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div id="" class="form-group text">
                                                <label id="" class="control-label">
                                                    <span class="label-content">Mật khẩu</span>
                                                </label>
                                                <input id="" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control @error('password') is-invalid @enderror" name="password" required >
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-success btn-block" id="btn-login" > <i class="fas fa-lock "></i>    Đăng nhập</button>
                                        </div>
                                        <div class="col-md-4">
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Quên mật khẩu?') }}
                                            </a>
                                            @endif
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="">
                                                {{ __('Đổi mật khẩu?') }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <a href="{{route('login')}}" class="thumbnail" style="margin-top:15px;text-align: center;padding-top: 10px;">
                                        <img src="{{asset('fe/img/logo_dvc.png')}}" height="40" style="margin-bottom: 3px;">
                                    <div class="caption">
                        <h3 style="font-weight:bold">CÁN BỘ ĐĂNG NHẬP</h3><p>Đăng nhập dành cho cán bộ</p>				</div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
