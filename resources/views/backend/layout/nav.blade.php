<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class=" brand-link d-flex ml-2" href="https://humg.edu.vn">
        <img src="{{asset('hs/img/logo.png')}}" alt="humg" width="45px" height="45px" class=" img-circle elevation-3" style="opacity: .8">
        <div class="brand-text mx-3 pt-2 font-weight-light font-weight-bold"> HUMG </div>
    </a>
    <hr class="sidebar-divider my-0">
    <!-- Sidebar Menu -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Tài khoản</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Quản lý danh mục
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('tt.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thủ tục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('danhmuc.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Phòng ban</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('hp.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Môn học</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('hoso.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Hồ sơ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bao_cao') }}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Báo cáo</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
