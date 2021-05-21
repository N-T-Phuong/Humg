
@extends('fontend.include.master')
@section('js_footer')
<!-- Page level plugins -->
<script src="{{asset('hs/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('hs/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('hs/js/demo/datatables-demo.js')}}"></script>
@endsection
@section('content')
    <section class="breadcrumbs margin-0">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <i class="fas fa-angle-right"></i>
                <li class="active">Tra cứu hồ sơ</li>
            </ol>
        </div>
    </section>
    <section id="guide" class="guide-page">
        <div class="container">
            <div class="row">
                <div class=" col-md-2"></div>
                <div class="col-md-8 offset-2">
                    <div class="guide-page__body bg-color-light box-shadow-main">
                        <h2 class="guide-page__title sidebar__title text-center"><span>Sinh viên tra cứu hồ sơ trực tuyến</span></h2>
                        <div class="guide-page__step">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <table style="width: 100%;">
                                        <tbody>
                                        <tr>
                                            <td style="width: 20%;"></td>
                                            <td style="width: 20%;">
                                                <div class="form-group">
                                                    <input type="text" name="Keyword" id="Keyword" placeholder="Nhập mã hồ sơ" autocomplete="off" class="form-control secondary-color font-size-14" value="">
                                                </div>
                                            </td>
                                            <td style="width: 5%;"></td>
                                            <td style="width: 30%;">
                                                <div class="form-group ">
                                                    <button class="btn btn-main font-size-16 font-weight-bold">
                                                        Tra cứu
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if(session('thongbao'))
                                    <div class="alert alert-success">
                                        {{session('thongbao')}}
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <tbody>
                                            <tr>
                                                <th style="padding-left: 5px; padding-top: 3px">Mã sinh viên</th>
                                                <td id="msv" style="padding-left: 5px; padding-top: 3px"></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-left: 5px; padding-top: 3px">Họ tên</th>
                                                <td id="ten" style="padding-left: 5px; padding-top: 3px"></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-left: 5px; padding-top: 3px">Điện thoại</th>
                                                <td id="phone" style="padding-left: 5px; padding-top: 3px"></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-left: 5px; padding-top: 3px">Email</th>
                                                <td id="email" style="padding-left: 5px; padding-top: 3px"></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-left: 5px; padding-top: 3px">Mã thủ tục</th>
                                                <td id="maTT" style="padding-left: 5px; padding-top: 3px"></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-left: 5px; padding-top: 3px">Ngày nhận</th>
                                                <td id="ngaynhan" style="padding-left: 5px; padding-top: 3px"></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-left: 5px; padding-top: 3px">Người nhận</th>
                                                <td id="canbo" style="padding-left: 5px; padding-top: 3px"></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-left: 5px; padding-top: 3px">Bộ phận tiếp nhận</th>
                                                <td id="phongban" style="padding-left: 5px; padding-top: 3px"></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-left: 5px; padding-top: 3px">Ngày chuyển tới</th>
                                                <th id="ngay_chuyen_toi" style="padding-left: 5px; padding-top: 3px"></th>
                                            </tr>
                                            <tr>
                                                <th style="padding-left: 5px; padding-top: 3px">Số ngày xử lý</th>
                                                <td id="tg_th" style="padding-left: 5px; padding-top: 3px"></td>
                                            </tr>
                                            <tr>
                                                <th style="width: 150px; padding-left: 5px; padding-top: 3px">Kết quả xử lý</th>
                                                <td id="kq_xl" style="padding-left: 5px; padding-top: 3px"></td>
                                            </tr>
                                            <tr>
                                                <th style="padding-left: 5px; padding-top: 3px">Ngày trả</th>
                                                <td id="ngaytra" style="padding-left: 5px; padding-top: 3px"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection