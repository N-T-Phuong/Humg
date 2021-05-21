@extends('backend.layout.index')

@section('content')
    <div class="card push-top">
        <div class="card-header">
            Thêm Phòng Ban
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
            <form method="post" action="{{ route('danhmuc.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="maDM">Mã Phòng Ban</label>
                    <input type="text" class="form-control" name="maDM" placeholder="ma danh muc" required="required"/>
                </div>
                <div class="form-group">
                    <label for="tenDM">Tên Phòng Ban</label>
                    <input type="text" class="form-control" name="tenDM" placeholder="ten danh muc" required="required"/>
                </div>
                <div class="form-group">
                    <label for="mota">Mô tả</label>
                    <input type="text" class="form-control" name="mota" placeholder="mo ta" required="required"/>
                </div>

                <button type="submit" class="btn btn-block btn-danger">Thêm mới phòng ban</button>
            </form>
        </div>
    </div>
@endsection