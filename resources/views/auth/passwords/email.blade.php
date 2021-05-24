@extends('fontend.include.master')
@section('content')
<br>
<br>
<div class="container ">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 ">
            <div class="guide-page__body bg-color-light box-shadow-main">
                <h4 class="guide-page__title sidebar__title text-center" style="font-size: 18px;"><span> KHÔI PHỤC MẬT KHẨU ĐĂNG NHẬP</span></h4>
                <div class="guide-page__step">
                    <div class="card shadow mb-4">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card-header py-3">
                            <form id="mainForm" name="mainForm" action="{{ route('password.email') }}" method="post">
                                @csrf
                                <div id="row" class="row ">
                                    <div class="col-md-2"></div>
                                    <div id="column" class="col-md-8 col ofset-2">
                                        <div id="" class="form-group text">
                                            <input id="" name="email" type="email" placeholder=" Nhập email đăng nhập" class="form-control @error('email') is-invalid @enderror"value="{{ old('email') }}" required >
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class=" form-group text  ">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Gửi liên kết đặt lại mật khẩu') }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="text-center">
                                    @if (Route::has('login'))
                                        <a class="btn btn-link" href="{{ route('login') }}">
                                            {{ __('Đăng nhập') }}
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection