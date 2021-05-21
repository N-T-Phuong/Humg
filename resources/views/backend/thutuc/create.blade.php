@extends('backend.layout.index')

@section('content')
    <div class="card push-top">
        <div class="card-header">
            Thêm Thủ Tục
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
            <form method="post" action="{{ route('tt.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="maTT">Mã Thủ Tục</label>
                    <input type="text" class="form-control" name="maTT" placeholder="mã" required="required"/>
                </div>
                <div class="form-group">
                    <label for="tenTT">Tên Thủ Tục</label>
                    <input type="text" class="form-control" name="tenTT" placeholder="tên" required="required"/>
                </div>
                <div class="form-group">
                    <label for="">Phòng Ban</label>
                    <select name="danhmuc_id" id="input" class="form-control" required="required">
                        <option value="">--Chọn--</option>
                        @foreach ($danhmuc as $dm)
                            <option value="{{$dm->id}}">{{$dm->tenDM}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="mota">Mô tả</label>
                    <textarea class="form-control  "  name="mota" placeholder="Mo ta" required="requireds"></textarea>
                </div>
                <div class="form-group">
                    <label for="tg_giai_quyet">Thời gian giải quyết</label>
                    <input type="text" class="form-control" name="tg_giai_quyet" placeholder="Thoi gian giai quyet" required="required"/>
                </div>

                <button type="submit" class="btn btn-block btn-danger">Thêm mới thủ tục</button>
            </form>
        </div>
    </div>

@endsection