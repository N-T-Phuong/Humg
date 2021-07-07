<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('hs/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('hs/css/adminlte.min.css') }}">
    <link href="{{asset('hs/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('hs/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('hs/css/select2.min.css')}}">
</head>

<body id="" class="hold-transition sidebar-mini layout-fixed">
    <!-- Page Wrapper -->
    <div class="wrapper">
        @include('backend.layout.header')
        @include('backend.layout.nav')

        <!-- Content Wrapper -->
        <div class="content-wrapper" >
            <section class="content">
                <div class="container-fluid pt-1 pb-4">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    @include('backend.layout.footer')
    @stack('js')
</body>
</html>
