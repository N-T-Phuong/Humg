@extends('fontend.include.master')

@section('content')
    <div class="container">
    <div class="pt-5"></div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="font-weight-bold" style="margin: 20px 0; ">Thay đổi mật khẩu</h3>
                </div>
                <div class="card-body">
                    @if (Session('error'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Thông báo!</strong> {{ Session('error') }}
                        </div>
                    @endif
                    @if (Session('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Thông báo!</strong> {{ Session('success') }}
                        </div>
                    @endif


                    <form action="{{ route('update_change_pass', Auth::user()->id) }}" method="POST" role="form">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Mật khẩu cũ:</label>
                            <input type="text" name="old_password" class="form-control" id="" value="">
                            @error('old_password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu mới:</label>
                            <input type="text" name="new_password" class="form-control" id="" value="">
                            @error('new_password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu mới:</label>
                            <input type="text" name="re_password" class="form-control" id="" value="">
                            @error('re_password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary" >OK</button>
                        <a href="{{ route('profile', Auth::id()) }}" class="btn btn-color-primary-border" style="float: right;" >Cập nhật thông tin cá nhân?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection