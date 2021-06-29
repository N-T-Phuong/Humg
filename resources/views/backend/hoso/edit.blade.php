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
                <label for="">Trạng thái</label>
                <select name="trang_thai" class="form-control form-control-sm">
                    <option value="Chờ tiếp nhận"> Chờ tiếp nhận </option>
                    <option value="Tiếp nhận"> Tiếp nhận</option>
                    <option value="Đang xử lý"> Đang xử lý </option>
                    <option value="Hoàn thành"> Hoàn thành</option>
                    <option value="Hủy hồ sơ"> Hủy hồ sơ</option>
                </select>
            </div>
            <button type="submit" class="btn btn-block btn-danger">Cập nhật hồ sơ</button>
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
        <div class="modal-dialog modal-lg">
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
                        <div class="card-body">
                            <input name="hoso_id" type="hidden" class="form-control" value="{{ $hoso->id }}">
                            <div class="row ">
                                <div class="col-md-6 ">
                                    <label for="" class=" col-form-label mr-2">Mã cán bộ</label>
                                    <input type="text" name="ma" id="name" class="form-control" value="{{ Auth::user()->ma }}" placeholder="" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class=" col-form-label ">Họ tên cán bộ xử lý</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" placeholder="" disabled>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 ">
                                    <label for="" class=" col-form-label mr-2">Số điện thoại</label>
                                    <span class="text-red" title="Trường bắt buộc">*</span>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ Auth::user()->phone }}" placeholder="" >
                                </div>
                                <div class="col-md-6">
                                    <label class=" col-form-label ">Email</label>
                                    <input type="text" name="email" id="name" class="form-control" value="{{ Auth::user()->email }}" placeholder="" disabled>
                                </div>
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
                                <input id="" name="phong_ban_xu_ly" type="text" class="form-control"  value="{{ Auth::user()->phongban->tenDM }}" >
                            </div>
                            <div class="row ">
                                <div class="col-md-5 ">
                                    <label for="" class=" col-form-label mr-2">Thời gian thực hiện</label>
                                    <span class="text-red" title="Trường bắt buộc">*</span>
                                    <input type="text" name="tg_thuc" id="phone" class="form-control" value="" placeholder="Số ngày thực hiện từng phòng ban" required >
                                </div>
                                <div class="col-md-5 offset-2">
                                    <label class=" col-form-label ">Trạng thái</label>
                                    <input type="text" name="trang_thai" id="name" class="form-control" value="" placeholder="" required >
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button>
                            <button type="submit" class="btn btn-danger">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
