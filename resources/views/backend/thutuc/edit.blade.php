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
            <form method="POST" action="{{ route('tt.update', $thutuc->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label for="maTT">Mã Thủ Tục</label>
                    <input type="text" class="form-control" name="maTT" value="{{ $thutuc->maTT }}"/>
                </div>
                <div class="form-group">
                    <label for="tenTT">Tên Thủ Tục</label>
                    <input type="text" class="form-control" name="tenTT" value="{{ $thutuc->tenTT }}"/>
                </div>
                <div class="form-group">
                    <label for="">Phòng ban</label>
                    <select name="danhmuc_id" id="input" class="form-control" >
                        <option value="">--Chọn--</option>
                        @foreach ($danhmuc as $dm)
                            <option {{ $thutuc->danhmuc_id = $dm->id ? 'selected': ''}} value="{{ $dm->id}}">{{$dm->tenDM}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="mota">Mô tả</label>
                    {{--<input type="text" class="form-control" name="mota" value="{{ $thutuc->mota }}"/>--}}
                    <textarea  class=" form-control" name="mota" value="{{ $thutuc->mota }}"></textarea>
                </div>
                <div class="form-group">
                    <label for="tg_giai_quyet">Thời gian giải quyết</label>
                    <input type="text" class="form-control" name="tg_giai_quyet" value="{{ $thutuc->tg_giai_quyet }}"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Cập nhập thủ tục</button>
            </form>
        </div>
    </div>
@endsection
