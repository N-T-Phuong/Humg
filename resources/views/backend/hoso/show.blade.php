@extends('backend.layout.index')
@section('content')
    <div class="tracuu">

        <div class="col-md-4 "></div>
        <form action="">
            <div class="card shadow mb-4">
                <div class="card-header py-3 font-weight-bold" style="background-color: rgb(188, 242, 255); color:rgb(170, 12, 12)">
                    <h4 class=" font-weight-bold " id="">Nội dung hồ sơ #{{ $hoso->hoso_code }}</h4>
                    <div class="card-tools" style="margin-top: -2em;">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <a type="submit" href="{{ route('hoso.index') }}" class="btn btn-danger" ><i class="fas fa-times"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-bordered" width="100%" cellspacing="0">
                            <tr style="padding:2px 5px;">
                                <th>Sinh Viên</th>
                                <td>{{ $hoso->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Mã sinh viên</th>
                                <td>{{ $hoso->user->ma }}</td>
                            </tr>
                            <tr>
                                <th>Khoa</th>
                                <td>{{ $hoso->user->khoa }}</td>
                            </tr>
                            <tr>
                                <th>Lớp</th>
                                <td>{{ $hoso->user->lop }}</td>
                            </tr>
                            <tr>
                                <th>Số điện thoại</th>
                                <td>{{ $hoso->phone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $hoso->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Thủ tục</th>
                                <td>{{ $hoso->thutuc->tenTT }}</td>
                            </tr>
                            @foreach ( $hoso->formTypes as $types )
                                <tr>
                                    <th>{{$types->field}}</th>
                                    <td>{{$types->value}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>Ngày nhận</th>
                                <td>{{ $hoso->ngay_nhan }}</td>
                            </tr>
                            {{--<tr>--}}
                                {{--<th>Ngày nhận</th>--}}
                                {{--<td>{{ $hoso->ngay_nhan }}</td>--}}
                            {{--</tr>--}}
                            <tr>
                                <th>Ngày hẹn trả</th>
                                <td>
                                    <?php
                                        $date = date('Y-m-d H:i:s', strtotime('+'.'3 days', strtotime($hoso->ngay_nhan)));
                                        echo $date;
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Trạng thái</th>
                                <td>{{ $hoso->trang_thai }}</td>
                            </tr>
                            <tr>
                                <th>Ngày nộp</th>
                                <td>{{ $hoso->created_at }}</td>
                            </tr>
                            {{--<tr>--}}
                                {{--<th>Ngày tiếp nhận</th>--}}
                                {{--<td>{{ $hoso->updated_at }}</td>--}}
                            {{--</tr>--}}
                        </table>
                    </div>
                </div>
                {{--<div class="card-footer">--}}
                    {{--<a type="submit" href="{{ route('hoso.index') }}" class="btn btn-color-primary-border">Quay lại</a>--}}
                {{--</div>--}}
            </div>
        </form>
    </div>
@endsection
<style>
    th, td{
        padding: 10px 1em;
    }
</style>