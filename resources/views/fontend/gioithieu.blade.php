@extends('fontend.include.master')
@section('content')
    <section class="breadcrumbs margin-0">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li class="active">Giới thiệu</li>
            </ol>
        </div>
    </section>
    <section id="introduce_search">
        <div class="container">
            <div class="title--2 text-center">
                <h2 class="title__text text-uppercase font-size-15 font-weight-bold secondary-color">Tra cứu thông tin hồ sơ</h2>
                <p class="title__des font-size-15 color-55">
                    Hệ thống dịch vụ công trực tuyến sẽ giúp sinh viên tra cứu hồ sơ một cách dễ dàng
                </p>
            </div>
            <div class="introduce__search-info">
                <div class="row">
                    <div class="item col-sm-4">
                        <div class="item__wrap text-center">
                            <div class="item__icon">
                                <i class="fa fa-diamond"></i>
                            </div>
                            <h3 class="item__title text-uppercase font-size-15 font-weight-bold position-rel">
                                Tiện lợi cao
                            </h3>
                            <div class="item__des font-size-15 color-55">
                                Công dân, doanh nghiệp sau khi đăng nhập bằng tài khoản đã được đăng ký và xác thực bởi cơ quan nhà nước có thể thực hiện các dịch vụ hành chính công một cách đơn giản, thuận tiện
                            </div>
                        </div>
                    </div>
                    <div class="item col-sm-4">
                        <div class="item__wrap text-center">
                            <div class="item__icon">
                                <i class="fa fa-pie-chart"></i>
                            </div>
                            <h3 class="item__title text-uppercase font-size-15 font-weight-bold position-rel">
                                Dễ quản lý
                            </h3>
                            <div class="item__des font-size-15 color-55">
                                Cán bộ sử dụng Hệ thống thông tin chính quyền điện tử để tiếp nhận hồ sơ trực tuyến, và trực tiếp, luân chuyển và xử lý hồ sơ, trả kết quả hồ sơ và thực hiện thống kê, báo cáo tùy theo vai trò được phân công.
                            </div>
                        </div>
                    </div>
                    <div class="item col-sm-4">
                        <div class="item__wrap text-center">
                            <div class="item__icon">
                                <i class="fa fa-paper-plane"></i>
                            </div>
                            <h3 class="item__title text-uppercase font-size-15 font-weight-bold position-rel">
                                Sử dụng đơn giản
                            </h3>
                            <div class="item__des font-size-15 color-55">
                                Các giao dịch với cơ quan nhà nước, xử lý hồ sơ thực hiện dịch vụ hành chính công trực tiếp tại bộ phận một cửa hoặc trực tuyến tại Hệ thống dịch vụ công trực tuyến Thành phố Hà Nội.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection