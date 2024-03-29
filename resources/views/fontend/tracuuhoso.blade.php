@extends('fontend.include.master')
@section('js_footer')
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}
@endsection
@section('content')
<section class="breadcrumbs margin-0">
    <div class="container">
        <ol class="breadcrumb">
            <li>
                <a href="/">Trang chủ</a>
            </li>
            <li class="active">Tra cứu hồ sơ</li>
        </ol>
    </div>
</section>
<section id="guide" class="guide-page">
    <div class="container">
        <div class="row">
            @if(session('error'))
                <div class="" style=" padding: 1em;">
                    <div class="text-center">
                        <img src="{{ asset('fe/img/thongbao.jpg') }}" alt="gửi thông tin thành công" width="140px">
                    </div>
                    <h2 class="text-center font-weight-bold font-size-17" style="color: #138f30; margin-top: 10px">Đã gửi thông tin hồ sơ thành công</h2>
                    <div class="font-size-20 text-center alert" style="color: #0e0ca1">
                        Sinh viên lấy <strong>mã hồ sơ</strong> tra cứu tại email cá nhân
                    </div>
            @endif
        </div>
        <br>
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
                                            <form action="" method="GET" role="form">
                                                <td style="width: 20%;"></td>
                                                <td style="width: 20%;">
                                                    <div class="form-group">
                                                        <input type="text" name="search" id="keyword" placeholder="Nhập mã hồ sơ" value="{{ request()->input('search') }}"
                                                            class="form-control secondary-color font-size-14" >
                                                    </div>
                                                </td>
                                                <td style="width: 5%;"></td>
                                                <td style="width: 30%;">
                                                    <div class="form-group ">
                                                        <button type="submit" class="btn btn-main font-size-16 font-weight-bold">
                                                            <i class="fas fa-search"></i>Tra cứu
                                                        </button>
                                                    </div>
                                                </td>
                                            </form>
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
</section>
<section class="">
    <div class="container">
        @if(request('search'))
            <div class="look-up-records__table" >
            <div class="table-search" >
                <table class="table table-bordered margin-0">
                    <thead>
                    <tr>
                        {{--<th class="text-center">STT</th>--}}
                        <th class="text-center">Mã hồ sơ</th>
                        <th class="text-center">Thủ tục</th>
                        <th class="text-center">Họ và tên</th>
                        <th class="text-center">Ngày nộp</th>
                        <th class="text-center">Ngày tiếp nhận</th>
                        <th class="text-center">Ngày hẹn trả</th>
                        <th class="text-center">Tình trạng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $hoso as $key => $hs)
                        <tr>
                            {{--<td>{{ $key+1 }}</td>--}}
                            <td>
                                <a class="collapsed" data-toggle="collapse" data-parent="#user-ticket-history"  href="#info">
                                    {{ $hs->hoso_code }}
                                </a>
                            </td>
                            <td>
                                <a class="collapsed" data-toggle="collapse" data-parent="#user-ticket-history" href="#info">
                                    {{ $hs->thutuc->tenTT }}
                                </a>
                            </td>
                            <td>{{ $hs->user->name }}</td>
                            <td>{{ $hs->created_at }}</td>
                            <td>{{ $hs->ngay_nhan}}</td>
                            <td>{{ $hs->ngay_hen_tra }}</td>
                            <td>{{ $hs->trang_thai }}</td>
                        </tr>
                        <tr id="info" class="collapse" >
                            <td></td>
                            <td colspan="7">
                                <form class="form-horizontal" action="#" method="POST" enctype="multipart/form-data">
                                    {{--<input type="hidden" name="ticket" value="">--}}
                                    <div class="info-detail">
                                        <h4 class="info-detail__head">Thông tin hồ sơ</h4>
                                        <dl class="dl-horizontal">
                                            <dt>Mã hồ sơ:</dt>
                                            <dd>{{ $hs->hoso_code }}</dd>
                                            <dt>Sinh viên:</dt>
                                            <dd>{{ $hs->user->name }}</dd>
                                            <dt>Mã sinh viên:</dt>
                                            <dd>{{ $hs->user->ma }}</dd>
                                            <dt>Khoa:</dt>
                                            <dd>{{ $hs->user->khoa }}</dd>
                                            <dt>Lớp:</dt>
                                            <dd>{{ $hs->user->lop }}</dd>
                                            <dt>Thời gian tiếp nhận:</dt>
                                            <dd>{{ $hs->ngay_nhan }}</dd>
                                            <dt>Trạng thái:</dt>
                                            <dd>{{ $hs->trang_thai }}</dd>
                                            <dt></dt>
                                        </dl>
                                        <div>
                                            <h4 class="info-detail__head">Thông tin xử lý</h4>
                                            <table class="info-detail__table table table-bordered table-hover">
                                                <colgroup>
                                                    <col class="width-auto">
                                                    <col class="width-15-percent">
                                                    <col class="width-20-percent">
                                                    <col class="width-14-percent">
                                                    <col class="width-10-percent">
                                                    <col class="width-20-percent">
                                                </colgroup>
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Nội dung xử lý</th>
                                                    <th class="text-center">Phòng ban xử lý</th>
                                                    <th class="text-center">Người xử lý</th>
                                                    <th class="text-center">Thời gian</th>
                                                    <th class="text-center">Hạn xử lý</th>
                                                    <th class="text-center">Trạng thái</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach( $hs->xlhs as $item)
                                                    <tr>
                                                        <td>{{ $item->noi_dung_xu_ly }}</td>
                                                        <td>{{ $item->user->phongban->tenDM }}</td>
                                                        <td class="text-center">{{ $item->user->name }}</td>
                                                        <td class="text-center">{{ $item->created_at }}</td>
                                                        <td class="text-center">
                                                            <?php
                                                            $data =date('Y-m-d H:i:s', strtotime('+'. ($item->tg_thuc . 'days') , strtotime($item->created_at)));
                                                            echo $data;
                                                            ?>
                                                        </td>
                                                        <td class="text-center">{{ $item->hoso->trang_thai }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    {{$hoso->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
