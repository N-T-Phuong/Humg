@extends('backend.layout.index')

@section('content')
    <section class="content-header">
        <h1 class="text-center">
            Chỉnh sửa và cập nhật thủ tục
        </h1>
    </section>
<div class="card push-top">
    <div class="card-header flex-sb">
        <div class="col-md-6">
            <a href="{{ route('tt.index') }}" class="btn btn-warning">Quay lại</a>
        </div>
        <div class="col-md-6">
        <button class="btn btn-primary float-right mr-3" type="button" data-toggle="modal" data-target="#exampleModal">
            Thêm trường cho thủ tục
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
        <form method="POST" action="{{ route('tt.update', $thutuc->id) }}">
            <div class="form-group">
                @csrf
                @method('PUT')
                <label for="maTT">Mã Thủ Tục</label>
                <input type="text" class="form-control" name="maTT" value="{{ $thutuc->maTT }}" />
            </div>
            <div class="form-group">
                <label for="tenTT">Tên Thủ Tục</label>
                <input type="text" class="form-control" name="tenTT" value="{{ $thutuc->tenTT }}" />
            </div>
            <div class="form-group">
                <label for="">Phòng ban</label>
                <select name="danhmuc_id" id="input" class="form-control">
                    <option value="">--Chọn--</option>
                    @foreach ($danhmuc as $dm)
                    <option {{ $thutuc->danhmuc_id = $dm->id ? 'selected': ''}} value="{{ $dm->id}}">{{$dm->tenDM}}
                    </option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="mota">Mô tả</label>
                {{--<input type="text" class="form-control" name="mota" value="{{ $thutuc->mota }}"/>--}}
                <textarea class=" form-control" name="mota" value="{{ $thutuc->mota }}"></textarea>
            </div>
            <div class="form-group">
                <label for="tg_giai_quyet">Thời gian giải quyết</label>
                <input type="text" class="form-control" name="tg_giai_quyet" value="{{ $thutuc->tg_giai_quyet }}" />
            </div>


            <button type="submit" class="btn btn-block btn-danger mx-auto" style="width: 50%;">Cập nhập thủ tục</button>
        </form>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Tiêu đề</td>
                        <td>Tên thực thể</td>
                        <td>Kiểu</td>
                        <td>Thao tác</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($thutuc->forms as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->label}}</td>
                            <td>{{$item->field}}</td>
                            <td>{{$item->type}} </td>
                            <td class="text-center">
                                {{-- <a href="{{ route('bm.edit', $item->id)}}" class="btn btn-primary btn-sm btn-circle" ><i class="far fa-edit"></i></a> --}}
                                <form action="{{ route('destroy_form', $item->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm btn-circle" type="submit"><i class="fas fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">
                        Tạo trường mới trong thủ tục này
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('create_input_form', $thutuc->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="label-name" class="col-form-label">
                                Tên trường:
                            </label>
                            <textarea class="form-control" id="label-name" name="label"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="label-name" class="col-form-label">
                                Mã thuộc tính sẽ lấy:
                            </label>
                            <input type="text" class="form-control" id="label-name" name="field">
                        </div>
                        <div class="form-group">
                            <label for="label-name" class="col-form-label">
                                Kiểu:
                            </label>
                            <select name="type" class="form-control form-control-sm">
                                <option> textarea </option>
                                <option> input </option>
                                <option> file </option>
                                <option> datetime</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay lại</button>
                            <button type="submit" class="btn btn-primary">Thêm trường</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


