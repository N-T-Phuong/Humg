
@extends('backend.layout.index')
@section('js_footer')
    <script src="{{ asset('hs/vendor/chart.js/Chart.min.css') }}"></script>
    <script src="{{ asset('hs/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('hs/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('hs/vendor/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('hs/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('hs/vendor/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('hs/vendor/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
@endsection
@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Báo cáo - Thống kê</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <br>
        <form id="formMain">
            <div class="">
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label>Từ ngày</label>
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="date" style="width:100%" name="txt_TU_NGAY" id="txt_TU_NGAY" value="{{$params['txt_TU_NGAY'] ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label>Đến ngày:</label>
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="date" style="width:100%" name="txt_DEN_NGAY" id="txt_DEN_NGAY" value="{{$params['txt_DEN_NGAY'] ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label>Tình trạng:</label>
                            {{--<span class="input-group-addon"><i class="fa fa-calendar"></i></span>--}}
                            <select class="form-control" type="date" style="width:100%" name="tinh_trang" id="tinh_trang">
                                @foreach ($options as $value => $option)
                                    <option value="{{$value}}" {{$tinhtrang == $value ? 'selected' : ''}}>
                                        {{$option}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="actions form-group">
                        <label></label>
                        <div class="input" style="margin-top: 8px">
                            <button id="timKiem" class="btn btn-success"><i class="fa fa-search"></i> Lọc</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <br>
        <br>
        <!-- /.content -->
        <section class="">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex" style="margin-top: -2em;">
                        <div class="border border-warning rounded" style="background-color: #9f81d6; padding:8px 10px;">
                            <i class="fas fa-folder-plus"></i>
                        </div>
                    </div>
                    <h5 class="pl-2" style=" margin: -11px 0 0 2em; ">Hồ sơ </h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Mã hồ sơ</th>
                            <th scope="col">Thủ tục</th>
                            <th scope="col">Ngày nộp</th>
                            <th scope="col">Tình trạng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $hs as $key => $value)
                            <tr>
                                <td>{{ $value->hoso_code }}</td>
                                <td>{{ $value->thutuc->tenTT }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>
                                    {{--{{ $value->trang_thai }}--}}
                                    @if ($value->trang_thai == 'Tiếp nhận')
                                    <a class="btn btn-info" href="">Tiếp nhận</a>
                                    @elseif ($value->trang_thai == 'Đang xử lý')
                                    <a class="btn btn-warning " href="">Đang xử lý</a>
                                    @elseif ($value->trang_thai == 'Hoàn thành')
                                    <a class="btn btn-success" href="">Hoàn thành</a>
                                    @elseif ($value->trang_thai == 'Hủy bỏ')
                                    <a class="btn btn-danger" href="">Hủy bỏ</a>
                                    @else
                                    <a class="btn btn-secondary" href="">{{$value->trang_thai}}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mt-4">
                        {{$hs->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
