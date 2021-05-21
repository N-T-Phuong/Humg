@extends('fontend.include.master')
@section('content')
    <section id="guide" class="guide-page">
        <div class="container">
            <div class="row">
                <div class=" col-md-2"></div>
                <div class="col-md-8 offset-2">
                    <div class="guide-page__body bg-color-light box-shadow-main">
                        <h2 class="guide-page__title sidebar__title text-center"><span>Đăng ký nộp hồ sơ trực tuyến</span></h2>
                        <div class="guide-page__step">
                            {{--<div>{{$thutuc->tenTT}}</div>--}}
                            <div class="card shadow mb-4">
                                {{--<div class="card-header py-3">--}}
                                    {{--<table style="width: 100%;">--}}
                                        {{--<tbody><tr>--}}
                                            {{--<td class="font-weight-bold" style="text-align: center;padding-top: 3px; font-size: 20px; color: red;">--}}
                                                {{--@yield('tenTT')--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                {{--</div>--}}
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <section id="thong-tin-nguoi-nop-wrapper" style="margin: 30px 0 0 0">
                                            <form id="mainForm" name="mainForm" action="{{route('hoso.store')}}" method="POST" >
                                                {{ csrf_field() }}
                                                <div id="hidden-area-wrapper"></div>
                                                <div id="form-content">
                                                    <fieldset id="fs-thong-tin-nguoi-nop" class="form-wrapper ui-sortable">
                                                        <div id="row-5" class="row ui-sortable ui-sortable-handle">
                                                            <div id="column-9" class="col-md-12 col ui-sortable ui-sortable-handle">
                                                                <div id="" class="form-group text">
                                                                    <input id="thutuc_id" name="tt_id" type="text"  class="form-control" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="row-1" class="row ui-sortable ui-sortable-handle">
                                                            <div id="column-1" class="col-md-6 col ui-sortable ui-sortable-handle">
                                                                <div id="" class="form-group text">
                                                                    <label id="" class="control-label" for="tenSV">
                                                                        <span class="label-content">Họ và tên</span>
                                                                        <span class="color-err" title="Trường bắt buộc">*</span>
                                                                    </label>
                                                                    <input id="tenSV" name="sv_id" type="text" class="form-control" disabled value="{{ Auth::user()->name }}">
                                                                </div>
                                                            </div>
                                                            {{--<input type="hidden" name="id_hoso" value="1">--}}
                                                            <div id="column-2" class="col-md-6 col ui-sortable ui-sortable-handle">
                                                                <div id="" class="form-group text">
                                                                    <label id="msv" class="control-label" for="maSV">
                                                                        <span class="label-content">Mã sinh viên</span>
                                                                        <span class="color-err" title="Trường bắt buộc">*</span>
                                                                    </label>
                                                                    <input id="maSV" name="" type="text" class="form-control" disabled value="{{Auth::user()->ma}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="row-2" class="row ui-sortable ui-sortable-handle">
                                                            <div id="column-3" class="col-md-6 col ui-sortable ui-sortable-handle">
                                                                <div id="diDong" class="form-group text">
                                                                    <label id="_lbl_diDong" class="control-label" for="phone">
                                                                        <span class="label-content">Số điện thoại</span>
                                                                        <span class="color-err" title="Trường bắt buộc">*</span>
                                                                    </label>
                                                                    <input id="phone" name="phone" type="text" class="form-control" value="{{Auth::user()->phone}}">
                                                                </div>
                                                            </div>
                                                            <div id="column-4" class="col-md-6 col ui-sortable ui-sortable-handle">
                                                                <div id="" class="form-group text">
                                                                    <label id="_lbl_email" class="control-label" for="email">
                                                                        <span class="label-content">Email</span>
                                                                        <span class="color-err" title="Trường bắt buộc">*</span>
                                                                    </label>
                                                                    <input id="email" name="email"  type="email" disabled class="form-control" value="{{Auth::user()->email}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="row-3" class="row ui-sortable ui-sortable-handle">
                                                            <div id="column-5" class="col-md-6 col ui-sortable ui-sortable-handle">
                                                                <div id="" class="form-group text">
                                                                    <label id="" class="control-label" for="khoa">
                                                                        <span class="label-content">Khoa</span>
                                                                        <span class="color-err" title="Trường bắt buộc">*</span>
                                                                    </label>
                                                                    <input id="khoa" name="khoa" type="text" class="form-control"  value="">
                                                                </div>
                                                            </div>
                                                            <div id="column-6" class="col-md-6 col ui-sortable ui-sortable-handle">
                                                                <div id="website" class="form-group text">
                                                                    <label id="_lbl_website" class="control-label" for="lop">
                                                                        <span class="label-content">Lớp</span>
                                                                        <span class="color-err" title="Trường bắt buộc">*</span>
                                                                    </label>
                                                                    <input id="lop" name="lop" type="text" class="form-control"  value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="row-4" class="row ui-sortable ui-sortable-handle">
                                                            <div id="column-7" class="col-md-4 col ui-sortable ui-sortable-handle">
                                                                <div id="" class="form-group text">
                                                                    <label id="" class="control-label" for="cmnd">
                                                                        <span class="label-content">Số CMND/CCND</span>
                                                                        <span class="color-err" title="Trường bắt buộc">*</span>
                                                                    </label>
                                                                    <input id="cmnd" name="cmnd" type="text" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                            <div id="column-8" class="col-md-4 col ui-sortable ui-sortable-handle">
                                                                <div id="website" class="form-group text">
                                                                    <label id="_lbl_website" class="control-label" for="ngay_cap">
                                                                        <span class="label-content">Ngày cấp</span>
                                                                        <span class="color-err" title="Trường bắt buộc">*</span>
                                                                    </label>
                                                                    <input id="ngay_cap" name="ngay_cap" type="date" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                            <div id="column-8" class="col-md-4 col ui-sortable ui-sortable-handle">
                                                                <div id="website" class="form-group text">
                                                                    <label id="_lbl_website" class="control-label" for="noi_cap">
                                                                        <span class="label-content">Nơi cấp</span>
                                                                        <span class="color-err" title="Trường bắt buộc">*</span>
                                                                    </label>
                                                                    <input id="noi_cap" name="noi_cap" type="text" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="row-5" class="row ui-sortable ui-sortable-handle">
                                                            <div id="column-9" class="col-md-12 col ui-sortable ui-sortable-handle">
                                                                <div id="" class="form-group text">
                                                                    <label id="" class="control-label" for="khoa">
                                                                        <span class="label-content">Địa chỉ</span>
                                                                        <span class="color-err" title="Trường bắt buộc">*</span>
                                                                    </label>
                                                                    <input id="diachi" name="dia_chi" type="text" placeholder="Ghi rõ địa chỉ ở hiện tại" class="form-control" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden"  value="1" name="thutuc_id">
                                                        {{--<div id="row-5" class="row ui-sortable ui-sortable-handle">--}}
                                                            {{--<div id="column-9" class="col-md-12 col ui-sortable ui-sortable-handle">--}}
                                                                {{--<div id="" class="form-group text">--}}
                                                                    {{--<label id="" class="control-label" for="khoa">--}}
                                                                        {{--<span class="label-content">Thủ tục</span>--}}
                                                                        {{--<span class="color-err" title="Trường bắt buộc">*</span>--}}
                                                                    {{--</label>--}}
                                                                    {{--<select name="thutuc_id" id="input" class="form-control" required="required">--}}
                                                                        {{--<option value="">--Chọn--</option>--}}
                                                                        {{--@foreach ($thutuc as $tt)--}}
                                                                            {{--<option value="{{$tt->id}}">{{$tt->tenTT}}</option>--}}
                                                                        {{--@endforeach--}}
                                                                    {{--</select>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    </fieldset>
                                                </div>
                                                <hr>
                                                @yield('file')
                                                <br>
                                                <div class="form-action text-center ">
                                                    <button type="submit" class="btn btn-main font-size-14 savestep">
                                                        <span id="btn-nop">Nộp hồ sơ</span>
                                                    </button>
                                                </div>
                                                <br>
                                            </form>
                                        </section>
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