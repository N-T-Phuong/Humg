@extends('backend.layout.index')

@section('content')
<div class="card push-top">
    <div class="card-header flex-sb">

        <div class="col-md-6"><h5>Chỉnh sửa và cập nhật hồ sơ</h5></div>
        <div class="col-md-6">
            <button class="btn btn-primary float-right mr-3" type="button" data-toggle="modal" data-target="#exampleModal">
                Xử lý hồ sơ
            </button>
        </div>
    </div>

    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="POST" action="{{ route('hoso.update', $hoso->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="maDM">Sinh viên</label>
                <input type="text" class="form-control" name="user_id" value="{{ $hoso->user->name }}" disabled />
            </div>
            <div class="form-group">
                <label for="tenDM">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $hoso->user->email }}" disabled />
            </div>
            <div class="form-group">
                <label for="mota">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" value="{{ $hoso->phone }}" />
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" name="dia_chi" value="{{ $hoso->dia_chi }}" />
            </div>
            <div class="form-group">
                <label for="mota">Trạng thái</label>
                <input type="text" class="form-control" name="trang_thai" value="{{ $hoso->trang_thai }}" />
            </div>

            <button type="submit" class="btn btn-block btn-danger">Cập nhập hồ sơ</button>
        </form>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Cán bộ</td>
                            <td>Nội dung xử lý</td>
                            <td>Phòng ban thực hiện</td>
                            <td>Ngày nhận</td>
                            <td>Hạn xử lý</td>
                            <td>Trạng thái</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $hoso->xlhs as $key => $item )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->user->name}}</td>
                                <td>{{ $item->noi_dung_xu_ly }}</td>
                                <td>{{ $item->user->phongban->tenDM }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <?php
                                        $data =date('Y-m-d H:i:s', strtotime('+'. ($item->tg_thuc . 'days') , strtotime($item->created_at)));
                                        echo $data;
                                    ?>
                                </td>
                                <td>{{ $item->trang_thai }} </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 100%;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">
                        Xử lý hồ sơ
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('xlhs', $hoso->id) }}">
                        @csrf
                        <div id="form-content">
                            <fieldset id="fs-thong-tin-nguoi-nop" class="form-wrapper ui-sortable">
                                <input name="hoso_id" type="hidden" class="form-control" value="{{ $hoso->id }}">
                                <div id="" class="form-group text">
                                    <label id="" class="control-label" for="">
                                        <span class="label-content">Người xử lý</span>
                                    </label>
                                    <input id="" name="user_id" type="text" class="form-control" disabled value="{{ Auth::user()->name }}">
                                </div>
                                <div id="" class="form-group text">
                                    <label id="msv" class="control-label" for="">
                                        <span class="label-content">Mã cán bộ</span>
                                    </label>
                                    <input id="" name="ma" type="text"  class="form-control" disabled value="{{ Auth::user()->ma }}" >
                                </div>
                                <div id="diDong" class="form-group text">
                                    <label id="_lbl_diDong" class="control-label" for="">
                                        <span class="label-content">Số điện thoại</span>
                                        <span class="text-red" title="Trường bắt buộc">*</span>
                                    </label>
                                    <input id="" name="phone" type="text" class="form-control "  value="{{ Auth::user()->phone }}">
                                </div>
                                <div id="" class="form-group text">
                                    <label id="_lbl_email" class="control-label" for="">
                                        <span class="label-content">Email</span>
                                        <span class="text-red" title="Trường bắt buộc">*</span>
                                    </label>
                                    <input id="email" name="email" type="email" class="form-control"  value="{{ Auth::user()->email}}" disabled>
                                </div>
                                <div id="" class="form-group text">
                                    <label id="_lbl_email" class="control-label" for="">
                                        <span class="label-content">Nội dung xử lý</span>
                                        <span class="text-red" title="Trường bắt buộc">*</span>
                                    </label>
                                    <input id="" name="noi_dung_xu_ly" type="text" class="form-control"  value="" required>
                                </div>
                                <div id="" class="form-group text">
                                    <label id="_lbl_email" class="control-label" for="">
                                        <span class="label-content">Phòng ban xử lý</span>
                                        <span class="text-red" title="Trường bắt buộc">*</span>
                                    </label>
                                    <input id="" name="phong_ban_xu_ly" type="text" class="form-control"  value="{{ Auth::user()->phongban_id }}" >
                                </div>
                                {{--<div id="" class="form-group text">--}}
                                    {{--<label id="_lbl_email" class="control-label" for="">--}}
                                        {{--<span class="label-content">Ngày nhận</span>--}}
                                        {{--<span class="text-red" title="Trường bắt buộc">*</span>--}}
                                    {{--</label>--}}
                                    {{--<input id="" name="ngay_tiep_nhan" type="date" class="form-control"  value="" >--}}
                                {{--</div>--}}
                                <div id="" class="form-group text">
                                    <label id="_lbl_email" class="control-label" for="">
                                        <span class="label-content">Thời gian thực hiện</span>
                                        <span class="text-red" title="Trường bắt buộc">*</span>
                                    </label>
                                    <input id="" name="tg_thuc" type="text" class="form-control"  value="" >
                                </div>
                                <div class="form-group">
                                    <label for="label-name" class="col-form-label"> Trạng thái: </label>
                                    <input id="" name="trang_thai" type="text" class="form-control"  value="" >
                                </div>
                            </fieldset>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
