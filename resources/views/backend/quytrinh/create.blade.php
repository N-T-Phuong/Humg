@extends('backend.layout.index')

@section('content')
    <div class="card push-top">
        <div class="card-header">
            Thêm Quy Trình
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
            <form method="post" action="{{ route('qt.store') }}">
                @csrf
                <div class="form-group">
                    <label for="maQT">Mã Quy Trình</label>
                    <input type="text" class="form-control" name="maQT" placeholder="Nhập mã " required="required"/>
                </div>
                <div class="form-group">
                    <label for="tenQT">Tên Quy Trình</label>
                    <input type="text" class="form-control" name="tenQT" placeholder="Nhập tên" required="required"/>
                </div>

                <div class="form-group">
                    <label for="">Thủ tục</label>
                    <select name="id_thutuc" id="input" class="form-control" required="required">
                        <option value="">--Lựa Chọn--</option>
                        @foreach ($thutuc as $tt)
                            <option value="{{$tt->id}}">{{$tt->tenTT}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="bieu_mau">Biểu mẫu</label>
                    <input type="text" class="form-control" name="bieu_mau" placeholder="file" required="requireds"/>
                </div>
                <div class="form-group">
                    <label for="trang_thai">Trạng thái</label>
                    <input type="text" class="form-control" name="trang_thai" placeholder="trạng thái" required="requireds"/>
                </div>
                {{--<div class="form-group">--}}
                {{--<label for="ngay_hieu_luc">Ngày hiệu lực</label>--}}
                {{--<input type="text" class="form-control" name="ngay_hieu_luc" placeholder="Ngày hiệu lực" required="required"/>--}}
                {{--</div>--}}

                <button type="submit" class="btn btn-block btn-danger">Thêm mới quy trình</button>
            </form>
        </div>
    </div>

@endsection