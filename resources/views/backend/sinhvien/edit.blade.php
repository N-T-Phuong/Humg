@extends('backend.layout.index')

@section('content')
    <div class="card push-top">
        <div class="card-header">
            Edit & Update
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
            <form method="post" action="{{ route('sinhvien.update', $sinhvien->id) }}">
                <div class="form-group">
                    @csrf

                    <label for="ten_SV">Họ và tên</label>
                    <input type="text" class="form-control" name="ten_SV" value="{{ $sinhvien->tenSV }}"/>
                </div>
                <div class="form-group">
                    <label for="ma_SV">Mã sinh viên</label>
                    <input type="text" class="form-control" name="ma_SV" value="{{ $sinhvien->maSV }}"/>
                </div>
                <div class="form-group">
                    <label for="khoa">Khoa</label>
                    <input type="text" class="form-control" name="khoa" value="{{ $sinhvien->khoa }}"/>
                </div>
                <div class="form-group">
                    <label for="lop">Lớp</label>
                    <input type="text" class="form-control" name="lop" value="{{ $sinhvien->lop }}"/>
                </div>
                {{--<div class="form-group">--}}
                {{--<label for="">Lớp</label>--}}
                {{--<select name="id_lop" id="input" class="form-control" >--}}
                {{--<option value="">--Lựa Chọn--</option>--}}
                {{--@foreach ($lop as $l)--}}
                {{--<option {{ $sinhvien->id_lop = $l->id ? 'selected': ''}} value="{{ $l->id}}">{{$l->ten_Lop}}</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" value="{{ $sinhvien->phone }}"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $sinhvien->email }}"/>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="password">Mật khẩu</label>--}}
                    {{--<input type="password" class="form-control" name="password" value="{{ $sinhvien->password }}"/>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="diachi">Địa chỉ</label>
                    <input type="text" class="form-control" name="diachi" value="{{ $sinhvien->diachi }}"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Cập nhật sinh viên</button>
            </form>
        </div>
    </div>
@endsection