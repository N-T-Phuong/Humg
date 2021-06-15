@extends('backend.layout.index')
@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thêm mới tài khoản khách hàng
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fas fa-tachometer-alt"></i>  Home  </a><i class="fas fa-angle-right mr-1"></i></li>
                <li><a href="{{route('users.index')}}">  Users  </a><i class="fas fa-angle-right mr-1"></i></li>
                <li class="active">Thêm mới</li>
            </ol>
        </section>
        @if (count($errors)>0)
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <ul>
                    @foreach ($errors ->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success! - </strong>{{ $message }}
            </div>
        @endif
        <section class="content">
            <form action="{{ route('users.store') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="card card-info col-md-10 ">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin </h3>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-5 ">
                                <label for="" class=" col-form-label mr-2">Họ tên</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nhập Họ tên">
                            </div>
                            <div class="col-md-5 ">
                                <label for="" class=" col-form-label mr-3">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
                            </div>
                            <div class="col-md-2 pt-3">
                                <label class=" col-form-label "></label>
                                <select name="type" id="type" class="form-control form-control-sm " aria-label="Default select example">
                                    <option selected>Quyền</option>
                                    @foreach($roles  as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label for="" class=" col-form-label mr-2">Mã </label>
                                <input type="text" name="ma" id="ma" class="form-control" placeholder="Nhập mã sinh vien/canbo" >
                            </div>

                            <div class="col-md-4">
                                <label for="" class=" col-form-label mr-3">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder=" Nhập Số điện thoại">
                            </div>
                            <div class="col-md-4">
                                <label for="inputEmail3" class=" col-form-label mr-5">Mật khẩu</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" >
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <label for="" class=" col-form-label mr-3">Khoa</label>
                                <input type="text" name="khoa" id="khoa" class="form-control" placeholder="Khoa" >
                            </div>
                            <div class="col-md-4">
                                <label for="inputEmail3" class="col-form-label mr-2">Lớp</label>
                                <input type="text" name="lop" id="lop" class="form-control" placeholder="Lớp" >
                            </div>
                            <div class="col-md-4">
                                <label for="" class=" col-form-label mr-3">Phòng ban</label>
                                <input type="text" name="phongban_id" id="phongban" class="form-control" placeholder="Phòng" >
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-10">
                                <label for="" class=" col-form-label mr-2">Địa chỉ</label>
                                <input type="text" name="diachi" id="diachi" class="form-control" placeholder="Nhập địa chỉ" >
                            </div>
                        </div>
                        <div class="row pt-3 ">
                            <button type="submit" class="btn btn-primary mr-4">Tạo mới</button>
                            <button type="reset" class="btn btn-warning ml-4 ">Làm lại</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection