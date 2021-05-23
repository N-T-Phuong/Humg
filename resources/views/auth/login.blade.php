<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('hs/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('hs/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('hs/css/style.css')}}" rel="stylesheet">
</head>

<body class="bg-humg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 " style="padding-top: 4em;">
                <div class="card o-hidden border-0 shadow-lg my-5 ">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h1 class="h3 text-gray-900 mb-4">HUMG Xin Chào!</h1>
                        </div>
                        <form class="user" method="post" action="{{route('login')}}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email"
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required id="exampleInputEmail"
                                    aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password"
                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                    name="password" required id="exampleInputPassword" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block" style="font-size: 18px;"><i
                                    class="fas fa-lock mr-3"></i>Đăng nhập</button>
                            <hr>
                        </form>
                        {{--<div class="text-center">--}}
                            {{--@if (Route::has('password.request'))--}}
                            {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                {{--{{ __('Quên mật khẩu?') }}--}}
                            {{--</a>--}}
                            {{--@endif--}}
                        {{--</div>--}}
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