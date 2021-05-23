@extends('fontend.include.master')
@section('content')
    <br>
    <br>
    <br>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="guide-page__body bg-color-light box-shadow-main">
                    <h4 class="guide-page__title sidebar__title text-center" style="font-size: 18px;"><span> {{ __('ĐẶT LẠI MẬT KHẨU') }}</span></h4>
                    <div class="guide-page__step">
                        <div class="card shadow mb-4">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="card-header py-3">
                                <form id="mainForm" name="mainForm" action="{{ route('password.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div id="row" class="form-group row ">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                        <div id="column" class="col-md-8 col">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>
                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder=" Mật khẩu">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                 </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>
                                        <div class="col-md-8">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder=" Nhập lại mật khẩu">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 text-center">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary ">
                                                {{ __('Đặt lại mật khẩu') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection