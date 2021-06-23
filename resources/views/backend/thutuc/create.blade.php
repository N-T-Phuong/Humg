@extends('backend.layout.index')

@section('content')
    <div class="container">
        <div class="card push-top">
            <h4 class="card-header font-weight-bold font-italic">
                Thêm Thủ Tục
            </h4>

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
                    @csrf
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-5 ">
                                <label for="" class=" col-form-label mr-2">Mã thủ tục</label>
                                <input type="text" name="maTT" id="name" class="form-control" placeholder="Nhập mã thủ tục" required>
                            </div>
                            <div class="col-md-5">
                                <label class=" col-form-label ">Phòng ban</label>
                                <select name="danhmuc_id" id="input" class="form-control" required>
                                    <option value="">--Chọn--</option>
                                    @foreach ($danhmuc as $dm)
                                        <option value="{{$dm->id}}">{{$dm->tenDM}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-10">
                                <label for="" class=" col-form-label mr-2">Tên thủ tục </label>
                                <input type="text" name="tenTT" id="ma" class="form-control" placeholder="Nhập tên thủ tục" required >
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="col-md-10">
                                <label for="" class=" col-form-label mr-2">Mô tả</label>
                                <textarea type="text" name="mota" id="diachi" class="form-control" placeholder="Nhập mô tả" ></textarea>
                            </div>
                        </div>
                        <div class="row pt-3 ">
                            <div class="col-md-5">
                                <label for="" class=" col-form-label mr-3">Thời gian thực hiện </label>
                                <input type="text" name="tg_giai_quyet" id="phone" class="form-control" placeholder=" Nhập Số ngày" required>
                            </div>
                            <div class="col-md-5 offset-2 mt-5">
                                <button type="submit" class="btn btn-danger">Thêm mới thủ tục</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection