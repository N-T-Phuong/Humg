@extends('fontend.include.master')

@section('content')
    <div class="container">
        @if ($message = Session::get('succses'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success! - </strong>{{ $message }}
            </div>
        @endif
        <section class="content-header">
            <div class="container-fluid ">
                <div class="row" style="margin: 23px">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row " style="padding: 0 25px; margin: 10px;">
            <div class="col-md-1"></div>
            <div class="col-md-3 bg-color-light">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile rounded" style="padding: 12px 0">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="https://newsmd1fr.keeng.net/tiin/archive/images/20210220/145211_facebook_doi_anh_dai_dien_2.jpg"
                                 alt="User profile picture" width="40%" height="40%">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <div class="border-profile p-2 my-2">
                            <i class="fas fa-venus-mars text-purple " style="margin: 7px 10px 10px 0px;"></i>{{ $user->gioitinh }}
                        </div><div class="border-profile p-2 my-2">
                            <i class="fas fa-envelope-open-text text-lightblue " style="margin: 0 10px 8px 0;"></i>{{ $user->email }}
                        </div>
                        <div class="border-profile p-2 my-2">
                            <i class="fas fa-phone-alt " style="margin: 10px 10px 8px 0;"></i>{{ $user->phone }}
                        </div>
                        <div class="border-profile p-2 my-2">
                            <strong><i class="fas fa-book " style="margin: 0 7px 8px 0;"></i> Education</strong>

                            <div class="text-muted">Trường Đại học Mỏ - Địa chất</div>
                            <div class="text-muted">{{ $user->khoa }}</div>
                            <div class="text-muted">{{ $user->lop }}</div>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt" style="margin: 0 7px 0 0;"></i> Location</strong>
                            <p class="text-muted">{{ $user->diachi }}</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 bg-color-light"style="border-top: 6px solid red;">
                <div class="card">
                    <div class=" ">
                        <div class="font-weight-bold" style=" margin: 10px; font-size: 17px; border-bottom:  solid;">Edit profile</div>
                    </div>
                    <div class="card-body" style="padding: 20px">
                        <div class="tab-content">
                            <form action="{{ route('profile.update', $user->id) }}" class="row mt-4" method="POST">
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
                                    <label for="formPhone" class="lable-title">Số điện thoại:</label>
                                    <input type="text" name="phone" class="form-control" id="formPhone" placeholder="Your phone number..." value="{{ $user->phone }}">
                                </div>
                                <div class="form-group col-12">
                                    <label for="" class="lable-title">Địa chỉ:</label>
                                    <input type="text" name="address" class="form-control" id="" placeholder="Your Address" value="{{ $user->diachi }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-blue-dark">Cập nhật thông tin</button>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <a href="{{ route('change_pass', Auth::user()) }}" type="submit" name="" class="btn btn-success">Đổi mật khẩu?</a>
                                    </div>
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
    </div>
@endsection