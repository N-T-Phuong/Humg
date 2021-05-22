<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('hs/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{asset('hs/css/style.css')}}" rel="stylesheet">

</head>
<body class="bg-humg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 " style="padding-top: 4em;">
                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                         @endif
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4 font-weight-bold">  QUÊN MẬT KHẨU</h1>
                        </div>
                        <form class="user" method="post" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror"value="{{ old('email') }}"
                                required id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Gửi liên kết đặt lại mật khẩu') }}
                                    </button>
                            <hr>
                        </form>
                        <div class="text-center">
                            @if (Route::has('login'))
                            <a class="btn btn-link" href="{{ route('login') }}">
                                {{ __('Đăng nhập') }}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{asset('hs/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('hs/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('hs/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('hs/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
