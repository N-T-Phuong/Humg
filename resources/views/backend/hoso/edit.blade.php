@extends('backend.layout.index')

@section('content')
<div class="card push-top">
    <div class="card-header">
        Chỉnh sửa và cập nhật phòng ban
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
                <input type="text" class="form-control" name="user_id" value="{{ $hoso->user_id }}" />
            </div>
            <div class="form-group">
                <label for="tenDM">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $hoso->email }}" />
            </div>
            <div class="form-group">
                <label for="mota">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" value="{{ $hoso->phone }}" />
            </div>
            <div class="form-group">
                <label for="mota">Nội dung</label>
                <input type="text" class="form-control" name="phone" value="{{ $hoso->phone }}" />
            </div>
            <div class="form-group">
                <label for="mota">Trạng thái</label>
                <input type="text" class="form-control" name="trang_thai" value="{{ $hoso->trang_thai }}" />
            </div>

            <button type="submit" class="btn btn-block btn-danger">Cập nhập hồ sơ</button>
        </form>
    </div>
</div>
@endsection
