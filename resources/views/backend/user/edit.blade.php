@extends('backend.layout.index')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa tài khoản người dùng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('users.index')}}"> User </a> <i class="fas fa-angle-right mr-1"></i></li>
            <li class="active">Edit</li>
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
    <div class="row mt-5">
        <div class="col-4">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="https://newsmd1fr.keeng.net/tiin/archive/images/20210220/145211_facebook_doi_anh_dai_dien_2.jpg"
                             alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <div class="border-profile p-2 my-2">
                        <i class="fas fa-venus-mars text-purple mr-2"></i>{{ $user->gioitinh }}
                    </div><div class="border-profile p-2 my-2">
                        <i class="fas fa-envelope-open-text text-lightblue mr-2"></i>{{ $user->email }}
                    </div>
                    <div class="border-profile p-2 my-2">
                        <i class="fas fa-phone-alt text-orange mr-2"></i>{{ $user->phone }}
                    </div>
                    <div class="border-profile p-2 my-2">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <div class="text-muted">Trường Đại học Mỏ - Địa chất</div>
                        <div class="text-muted">{{ $user->khoa }}</div>
                        <div class="text-muted">{{ $user->lop }}</div>
                        <hr>
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                        <p class="text-muted">{{ $user->diachi }}</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header p-2">
                    <div class="profile-title border-double font-weight-bold">Edit profile</div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <form action="{{ route('users.update', $user->id) }}" class="row mt-4" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group col-6">
                                <label for="formName" class="lable-title">Họ tên:</label>
                                <input type="text" name="name" class="form-control" id="formName" placeholder="Your Name..." value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-6">
                                <label for="formEmail" class="lable-title">Email:</label>
                                <input type="email" name="email_update" class="form-control" id="formEmail" placeholder="Your Email..." value="{{ $user->email }}">
                            </div>
                            <div class="form-group col-6">
                                <label for="formDate" class="lable-title">Mã:</label>
                                <input type="text" name="ma" class="form-control" id="formDate" value="{{ $user->ma }}">
                            </div>
                            <div class="form-group col-6">
                                <label for="formPhone" class="lable-title">Số điện thoại:</label>
                                <input type="text" name="phone" class="form-control" id="formPhone" placeholder="Your phone number..." value="{{ $user->phone }}">
                            </div>
                            <div class="form-group col-12">
                                <label for="" class="lable-title">Địa chỉ:</label>
                                <input type="text" name="diachi" class="form-control" id="" placeholder="Your Address" value="{{ $user->diachi }}">
                            </div>
                            <div class="form-group input-group col-4">
                                <label for="" class="lable-title mt-2 mr-2">Mật khẩu:</label>
                                <input type="password" name="password" class="form-control" id=""   value="{{ $user->password }}">
                            </div>
                            {{--<div class="form-group col-6">--}}
                            {{--<a href="" type="submit" name="" class="btn btn-success">Đổi mật khẩu?</a>--}}
                            {{--</div>--}}
                            <div class="form-group  col-10"></div>
                            <div class="form-group  col-2">
                                <button type="submit" class="btn btn-danger mt-4 btn-block" >Update</button>
                            </div>
                        </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection