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
            <form method="POST" action="{{ route('danhmuc.update', $danhmuc->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PUT')
                    <label for="maDM">Mã Danh Mục</label>
                    <input type="text" class="form-control" name="maDM" value="{{ $danhmuc->maDM }}"/>
                </div>
                <div class="form-group">
                    <label for="tenDM">Mã sinh viên</label>
                    <input type="text" class="form-control" name="tenDM" value="{{ $danhmuc->tenDM }}"/>
                </div>
                <div class="form-group">
                    <label for="mota">Mô tả</label>
                    <input type="text" class="form-control" name="mota" value="{{ $danhmuc->mota }}"/>
                </div>

                <button type="submit" class="btn btn-block btn-danger">Cập nhập danh mục</button>
            </form>
        </div>
    </div>
@endsection