@extends('fontend.include.master')
@section('css_header')
<link href="{{asset('fe/css/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<section id="guide" class="guide-page">
    <div class="container">
        <div class="row">
            <div class=" col-md-2"></div>
            <div class="col-md-8 offset-2">
                <div class="guide-page__body bg-color-light box-shadow-main">
                    <h2 class="guide-page__title sidebar__title text-center"><span>Đăng ký nộp hồ sơ trực tuyến</span>
                    </h2>
                    <div class="guide-page__step">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <section id="thong-tin-nguoi-nop-wrapper" style="margin: 30px 0 0 0">
                                        <form id="mainForm" name="mainForm" action="{{route('hoso.store')}}" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div id="form-content">
                                                <fieldset id="fs-thong-tin-nguoi-nop" class="form-wrapper ui-sortable">
                                                    <input name="tt_id" type="hidden" class="form-control" value="{{ $thutuc->id }}">
                                                    <div id="row-1" class="row ui-sortable ui-sortable-handle">
                                                        <div id="column-1" class="col-md-6 col ui-sortable ui-sortable-handle">
                                                            <div id="" class="form-group text">
                                                                <label id="" class="control-label" for="">
                                                                    <span class="label-content">Họ và tên</span>
                                                                    <span class="color-err" title="Trường bắt buộc">*</span>
                                                                </label>
                                                                <input id="" name="user_id" type="text" class="form-control" disabled value="{{ Auth::user()->name }}">
                                                            </div>
                                                        </div>
                                                        <div id="column-2" class="col-md-6 col ui-sortable ui-sortable-handle">
                                                            <div id="" class="form-group text">
                                                                <label id="msv" class="control-label" for="">
                                                                    <span class="label-content">Mã sinh viên</span>
                                                                    <span class="color-err"  title="Trường bắt buộc">*</span>
                                                                </label>
                                                                <input id="" name="maSV" type="text"  class="form-control" disabled value="{{ Auth::user()->ma }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="row-2" class="row ui-sortable ui-sortable-handle">
                                                        <div id="column-3"  class="col-md-6 col ui-sortable ui-sortable-handle">
                                                            <div id="diDong" class="form-group text">
                                                                <label id="_lbl_diDong" class="control-label" for="">
                                                                    <span class="label-content">Số điện thoại</span>
                                                                    <span class="color-err" title="Trường bắt buộc">*</span>
                                                                </label>
                                                                <input id="" name="phone" type="text" class="form-control "  value="{{ Auth::user()->phone }}">
                                                            </div>
                                                            {{-- @error('phone')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{$errors->phone}}</strong>
                                                                </span>
                                                            @enderror --}}
                                                        </div>
                                                        <div id="column-4"  class="col-md-6 col ui-sortable ui-sortable-handle">
                                                            <div id="" class="form-group text">
                                                                <label id="_lbl_email" class="control-label" for="">
                                                                    <span class="label-content">Email</span>
                                                                    <span class="color-err" title="Trường bắt buộc">*</span>
                                                                </label>
                                                                <input id="email" name="email" type="email" class="form-control"  value="{{ Auth::user()->email}}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="row-3" class="row ui-sortable ui-sortable-handle">
                                                        <div id="column-5"  class="col-md-6 col ui-sortable ui-sortable-handle">
                                                            <div id="" class="form-group text">
                                                                <label id="" class="control-label" for="">
                                                                    <span class="label-content">Khoa</span>
                                                                    <span class="color-err" title="Trường bắt buộc">*</span>
                                                                </label>
                                                                <input id="" name="khoa" type="text" class="form-control" value="{{ Auth::user()->khoa}}" required>
                                                            </div>
                                                        </div>
                                                        <div id="column-6"  class="col-md-6 col ui-sortable ui-sortable-handle">
                                                            <div id="website" class="form-group text">
                                                                <label id="_lbl_website" class="control-label" for="">
                                                                    <span class="label-content">Lớp</span>
                                                                    <span class="color-err" title="Trường bắt buộc">*</span>
                                                                </label>
                                                                <input id="" name="lop" type="text"  class="form-control" value="{{ Auth::user()->lop}} " required>
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
                                                                <input id="diachi" name="diachi" type="text" placeholder="Ghi rõ địa chỉ ở hiện tại" class="form-control" value="" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input name="ngay_nhan" type="hidden" class="form-control" value="">
                                                    <input name="ngay_hen" type="hidden" class="form-control" value="">
                                                </fieldset>
                                            </div>

                                            <hr>
                                            @yield('file')
                                            <br>
                                            <div class="form-action text-center ">
                                                <button  type="submit" class="btn btn-main font-size-14 savestep ">
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

@section('js_footer')
<script src="{{asset('fe/js/select2.min.js')}}"></script>
<script>
$(function(){
    $('.hoc_phan-select').select2()
});
</script>
@endsection
