
@extends('backend.layout.index')
@section('js_footer')
<!-- Page level plugins -->
<script src="{{asset('hs/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('hs/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('hs/js/demo/datatables-demo.js')}}"></script>
@endsection
@section('content')
{{--<div class="tracuu">--}}
    {{--@if(session()->get('success'))--}}
    {{--<div class="alert alert-success">--}}
        {{--{{ session()->get('success') }}--}}
    {{--</div><br/>--}}
    {{--@endif--}}
    {{--<div class="col-md-4 ">--}}
    {{--</div>--}}
    {{--<div class="card shadow mb-4">--}}
        {{--<div class="card-header py-3">--}}
            {{--<table style="width: 100%;">--}}
                {{--<tbody><tr>--}}
                    {{--<td class="font-weight-bold" style="text-align: right;padding-top: 3px; width: 20%;">--}}
                        {{--Mã hồ sơ:--}}
                    {{--</td>--}}
                    {{--<td style="width: 30%;">--}}
                        {{--<input name="" type="text" onchange="" onkeypress="" style="width:70%;text-align: center;padding-top: 3px">--}}
                    {{--</td>--}}
                    {{--<td style="width: 30%;">--}}
                        {{--<input type="submit" name="" value="Kiểm tra" id="btnKiemTra" style="text-decoration:none;width:70%; padding-top: 3px">--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--</tbody></table>--}}
        {{--</div>--}}
        {{--@if(session('thongbao'))--}}
        {{--<div class="alert alert-success">--}}
            {{--{{session('thongbao')}}--}}
        {{--</div>--}}
        {{--@endif--}}
        {{--<div class="card-body">--}}
            {{--<div class="table-responsive">--}}
                {{--<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
                    {{--<tbody>--}}
                    {{--<tr>--}}
                        {{--<th style="padding-left: 5px; padding-top: 3px">Mã sinh viên</th>--}}
                        {{--<td id="msv" style="padding-left: 5px; padding-top: 3px"></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th style="padding-left: 5px; padding-top: 3px">Họ tên</th>--}}
                        {{--<td id="ten" style="padding-left: 5px; padding-top: 3px"></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th style="padding-left: 5px; padding-top: 3px">Điện thoại</th>--}}
                        {{--<td id="phone" style="padding-left: 5px; padding-top: 3px"></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th style="padding-left: 5px; padding-top: 3px">Email</th>--}}
                        {{--<td id="email" style="padding-left: 5px; padding-top: 3px"></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th style="padding-left: 5px; padding-top: 3px">Mã thủ tục</th>--}}
                        {{--<td id="maTT" style="padding-left: 5px; padding-top: 3px"></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th style="padding-left: 5px; padding-top: 3px">Ngày nhận</th>--}}
                        {{--<td id="ngaynhan" style="padding-left: 5px; padding-top: 3px"></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th style="padding-left: 5px; padding-top: 3px">Người nhận</th>--}}
                        {{--<td id="canbo" style="padding-left: 5px; padding-top: 3px"></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th style="padding-left: 5px; padding-top: 3px">Đơn vị tiếp nhận</th>--}}
                        {{--<td id="phongban" style="padding-left: 5px; padding-top: 3px"></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th style="padding-left: 5px; padding-top: 3px">Ngày chuyển tới</th>--}}
                        {{--<th id="ngay_chuyen_toi" style="padding-left: 5px; padding-top: 3px"></th>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th style="padding-left: 5px; padding-top: 3px">Số ngày xử lý</th>--}}
                        {{--<td id="tg_th" style="padding-left: 5px; padding-top: 3px"></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th style="width: 150px; padding-left: 5px; padding-top: 3px">Kết quả xử lý</th>--}}
                        {{--<td id="kq_xl" style="padding-left: 5px; padding-top: 3px"></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<th style="padding-left: 5px; padding-top: 3px">Ngày trả</th>--}}
                        {{--<td id="ngaytra" style="padding-left: 5px; padding-top: 3px"></td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection