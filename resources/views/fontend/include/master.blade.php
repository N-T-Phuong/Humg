<!DOCTYPE html>
<html class="no-js" lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dịch vụ thủ tục hành chính - HUMG</title>
    <link async href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('hs/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('fe/BotDetectCaptcha.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('fe/css/css.css')}}" rel="stylesheet"/>
    <link href="{{asset('hs/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>
<body>
<div id="page" class="wrap-main">
    <div class="main-container">
        <div class="wrap-site">
            <header class="header ">
                <div class="container container-fixed">
                    <div class="row">
                        <div class="header__wrap">
                            <div class="col-sm-12 col-xs-5 full-xs">
                                <div class="header__logo">
                                    <a href="/">
                                        <img src="{{asset('hs/img/humg1.jpg')}} " width="300%" height="55px" alt="LOGO">
                                    </a>
                                </div>
                                <div class="header__account account col-xs-3 pull-right  " style="margin-top: -3em;">
                                    {{--<div class="account__action">--}}
                                        {{--<a href="{{route('auth.login')}}" class="text-uppercase color-header font-size-13 font-weight-bold text-red">Đăng nhập</a>--}}
                                    {{--</div>--}}
                                    @if( Auth::check())
                                    <div class="heli" style="display:inline-block">
                                        <a href="#" class="text-capitalize font-italic color-header font-size-14 font-weight-bold text-red" data-toggle="dropdown" id="drop55" role="button" aria-haspopup="true" aria-expanded="false">
                                            User: {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu" id="menu22" aria-labelledby="drop55" style="left:unset">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Profile
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{route('auth.logout')}}">
                                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                    Đăng xuất
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="main-content introduce">
                <nav class="navbar main-menu secondary-bg margin-0" role="navigation">
                    <div class="container">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="collapse navbar-collapse navbar-main ">
                                    <ul class="nav navbar-nav ">
                                        <li>
                                            <a href="{{route('nop_ho_so')}}" >Nộp hồ sơ trực tuyến</a>
                                        </li>
                                        <li>
                                            <a href="">Thủ tục hành chính</a>
                                        </li>
                                        <li>
                                            <a href="{{route('tra_cuu')}}">Tra cứu hồ sơ</a>
                                        </li>
                                        <li>
                                            <a href="{{route('huong_dan')}}">Hướng dẫn</a>
                                        </li>
                                        <li>
                                            <a href="{{route('gioi_thieu')}}">Giới thiệu</a>
                                        </li>
                                        <li>
                                            <a href="{{route('auth.login')}}">Đăng nhập</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>

                @yield('content')
            </div>
                <footer class="footer secondary-bg">
                    <div class="container container-fixed">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="footer__left">
                                    <div class="footer__intro">
                                        <p class="margin-0 color-aa font-size-14 font-weight-medium">
                                            Hệ thống dịch vụ hành chính trực tuyến Trường Đại học Mỏ-Địa chất
                                        </p>
                                    </div>
                                    <div class="footer__address">
                                        <p class="margin-0 color-aa font-size-14 font-weight-medium">
                                            Địa chỉ: 18 phố Viên, Phường Đức Thắng, Quận Bắc Từ Liêm, Thành Phố Hà Nội
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <div id="loading" class="loading" style="background-color: #ddd; height: 100%; width: 100%; position: fixed; z-index: 9999; margin-top: 0px; top: 0px; opacity: 0.7; display: none">
        <img style="position: absolute; left: 50%; top: 50%; width: 100px; height: 100px; margin-left: -50px; margin-top: -50px" src="/Images/load2.gif" />
    </div>
    <script src="{{asset('fe/vendor/bundles/app.js')}}"></script>
    <script src="{{asset('fe/vendor/bundles/wp_vendor.bundle.js')}}"></script>

<script src="{{asset('hs/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('hs/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('hs/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('hs/js/sb-admin-2.min.js')}}"></script>
@yield('js_footer')
</body>
</html>