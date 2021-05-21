@extends('backend.layout.index')

@section('content')
    <div class="card push-top">
        <div class="card-header">
            Thêm sinh viên
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
            <form method="post" action="{{ route('sinhvien.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="tenSV">Họ và tên</label>
                    <input type="text" class="form-control" name="tenSV" placeholder="Họ và tên" required="required"/>
                </div>
                <div class="form-group">
                    <label for="maSV">Mã sinh viên</label>
                    <input type="text" class="form-control" name="maSV" placeholder="mã sinh viên" required="required"/>
                </div>
                <div class="form-group">
                    <label for="khoa">Khoa</label>
                    <input type="text" class="form-control" name="khoa" placeholder="khoa" required="required"/>
                </div>
                <div class="form-group">
                    <label for="lop">Lớp</label>
                    <input type="text" class="form-control" name="lop" placeholder="Lớp" required="required"/>
                </div>
                {{--<div class="form-group">--}}
                {{--<label for="">Lớp quản lý</label>--}}
                {{--<select name="id_lop" id="input" class="form-control" required="required">--}}
                {{--<option value="">--Lựa Chọn--</option>--}}
                {{--@foreach ($lop as $l)--}}
                {{--<option value="{{$l->id}}">{{$l->ten_Lop}}</option>--}}
                {{--@endforeach--}}
                {{--</select>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" required="required"/>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="email" required="required"/>
                </div>
                <div class="form-group">
                    <label for="diachi">Địa chỉ</label>
                    <input type="text" class="form-control" name="diachi" placeholder="Địa chỉ" required="required"/>
                </div>

                <button type="submit" class="btn btn-block btn-danger">Thêm mới sinh viên</button>
            </form>
        </div>
    </div>
@endsection