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
            <form method="POST" action="{{ route('qt.update', $quytrinh->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label for="maQT">Mã Quy Trình</label>
                    <input type="text" class="form-control" name="maQT" value="{{ $quytrinh->maQT }}"/>
                </div>
                <div class="form-group">
                    <label for="tenQT">Tên Quy Trình</label>
                    <input type="text" class="form-control" name="tenQT" value="{{ $quytrinh->tenQT }}"/>
                </div>

                <div class="form-group">
                    <label for="">Thủ tục</label>
                    <select name="id_thủuc" id="input" class="form-control" >
                        <option value="">--Lựa Chọn--</option>
                        @foreach ($thutuc as $tt)
                            <option {{ $quytrinh->id_thutuc = $tt->id ? 'selected': ''}} value="{{ $tt->tenTT}}">{{$tt->tenTT}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="bieu_mau">Biểu mẫu</label>
                    <input type="text" class="form-control" name="bieu_mau" value="{{ $quytrinh->bieu_mau }}"/>
                </div>
                <div class="form-group">
                    <label for="trang_thai">Biểu mẫu</label>
                    <input type="text" class="form-control" name="trang_thai" value="{{ $quytrinh->trang_thai }}"/>
                </div>
                {{--<div class="form-group">--}}
                {{--<label for="ngay_hieu_luc">Ngày hiệu lực</label>--}}
                {{--<input type="text" class="form-control" name="ngay_hieu_luc" value="{{ $quytrinh->ngay_hieu_luc }}"/>--}}
                {{--</div>--}}
                <button type="submit" class="btn btn-block btn-danger">Cập nhập quy trình</button>
            </form>
        </div>
    </div>
@endsection
