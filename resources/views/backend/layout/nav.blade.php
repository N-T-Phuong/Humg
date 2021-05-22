<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://humg.edu.vn">
        {{--<div class="sidebar-brand-icon rotate-n-15">--}}
        {{--<i class="fas fa-laugh-wink"></i>--}}
        {{--</div>--}}
        <img src="{{asset('hs/img/logo.png')}}" alt="" width="50px" height="50px">
        <div class="sidebar-brand-text mx-3"> HUMG </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    {{--<li class="nav-item">--}}
    {{--<a class="nav-link" href="{{route('nop_ho_so')}}">--}}
    {{--<i class="fas fa-fw fa-table"></i>--}}
    {{--<span>Nộp hồ sơ trực tuyến</span></a>--}}
    {{--</li>--}}
    <hr class="sidebar-divider ">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Quản Lý Danh Mục</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class=" bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('danhmuc.index')}}">Phòng Ban</a>
                <a class="collapse-item" href={{route('tt.index')}}>Thủ Tục</a>
                <a class="collapse-item" href="">Quy Trình</a>
                {{--<a class="collapse-item" href="#">Bước</a>--}}
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('hoso.index')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Quản lý hồ sơ</span></a>
    </li>
    {{--<li class="nav-item">--}}
    {{--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">--}}
    {{--<i class="fas fa-fw fa-folder"></i>--}}
    {{--<span>Quản lý Sinh Viên</span>--}}
    {{--</a>--}}
    {{--<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"--}}
    {{--data-parent="#accordionSidebar">--}}
    {{--<div class="bg-white py-2 collapse-inner rounded">--}}
    {{--<a class="collapse-item" href="{{route('sinhvien.index')}}">Sinh Viên</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</li>--}}
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Cài đặt</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="{{route('auth.login')}}">Login</a>
                <a class="collapse-item" href="{{route('auth.logout')}}">Logout</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            </div>
        </div>
    </li>

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<!-- End of Sidebar -->