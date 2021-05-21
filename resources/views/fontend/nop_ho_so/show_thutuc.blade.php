@extends('fontend.include.master')
@section('js_footer')
    <!-- Page level plugins -->
    <script src="{{asset('hs/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('hs/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('hs/js/demo/datatables-demo.js')}}"></script>
@endsection
@section('content')
    <section class="breadcrumbs margin-0">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="/">Trang chủ</a></li>
                <i class="fas fa-angle-right"></i>
                <li class="active">Nộp hồ sơ trực tuyến</li>
            </ol>
        </div>
    </section>
    <br>
    <br>
    <section class="reg-online-res__submit-online">
         <div class="container">
        <div class="reg-online-res-wrap bg-color-light ">
            <div class="service-civil__info-content">
                <div class="service-civil__table-content submit-online reg-online-form position-rel">
                    {{--<div class="row">--}}
                        {{--<div class="col-md-4">--}}
                            {{--<form action="" method="GET" class="form-inline" role="form">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label class="sr-only" for="">label</label>--}}
                                    {{--<input name="keyword" type="text" value="{{ request()->input('keyword') }}" class="form-control" id="" placeholder="keyword">--}}
                                {{--</div>--}}
                                {{--<button type="submit" class="btn btn-primary">Tìm kiếm</button>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th class="text-center" style="width: 5%;" >STT</th>
                                    <th class="text-center" style="width: 30%;" >Tên thủ tục</th>
                                    <th class="text-center" style="width: 10%;">Thời gian xử lý</th>
                                    <th class="text-center" style="width: 20%;">Bộ phận thực hiện</th>
                                    <th class="text-center" style="width: 10%;">Chi tiết</th>
                                    <th class="col-send-dossier text-center">Nộp hồ sơ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($thutuc as $key => $value)
                                    <tr class=" text-center table-child ">
                                        <td style="width: 5%;">
                                            {{$key+1}}
                                        </td>
                                        <td style="width: 30%;" >
                                            <a>{{$value->tenTT}}</a>
                                        </td>
                                        <td  style="width: 10%;">
                                            <a>{{$value->tg_giai_quyet}}</a>
                                        </td>
                                        <td style="width: 20%;" >
                                            <a>{{$value->danhmuc->tenDM}}</a>
                                        </td>
                                        <td style="width: 10%;">
                                            <a href="{{route('tt.show',$value->id)}}" > <i class="fas fa-info-circle"></i></a>
                                        </td>
                                        <td class="col-send-dossier">
                                            <a href="{{ route('bieumau_form', $value->maTT) }}" class="btn btn-green ">Thực hiện</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection