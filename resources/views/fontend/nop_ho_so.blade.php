@extends('fontend.include.master')

@section('content')
<section class="breadcrumbs margin-0">
    <div class="container">
        <ol class="breadcrumb">
            <li>
                <a href="/">Trang chủ</a>
            </li>
            <li class="active">Nộp hồ sơ trực tuyến</li>
        </ol>
    </div>
</section>
<br>
<br>
<section class="reg-online-res__submit-online">
    <div class="container">

        <div class="reg-online-res-wrap bg-color-light ">
            <div class="">
                <div class="flex-sb">
                    <div>
                        {{--<label>Số lượng mỗi trang: </label>--}}
                        {{--<select class="custom-select">--}}
                            {{--<option selected value="10">10</option>--}}
                            {{--<option value="15">15</option>--}}
                            {{--<option value="20">20</option>--}}
                            {{--<option value="50">50</option>--}}
                        {{--</select>--}}
                    </div>
                    <form action="" method="GET" class="form-inline" role="form">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                            <input id="search-hoso" name="search_key" type="text" class="form-control" style="border-radius: 8px;" placeholder="Tìm kiếm"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </form>
                </div>
                <div class="">
                    <div class="card-body " style="padding: 5px 12px;">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead style="background-color: lightgray;">
                                    <tr >
                                        <th class="text-center" style="width: 5%;">STT</th>
                                        <th class="text-center" style="width: 43%;">Tên thủ tục</th>
                                        <th class="text-center" style="width: 13%;">Thời gian xử lý</th>
                                        <th class="text-center" style="width: 20%;">Bộ phận thực hiện</th>
                                        <th class="text-center" style="width: 7%;">Chi tiết</th>
                                        <th class="col-send-dossier text-center">Nộp hồ sơ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($thutuc as $key => $value)
                                    <tr class=" table-child ">
                                        <td class="text-center" style="width: 5%;">
                                            {{ $key+1 }}
                                        </td>
                                        <td style="width: 43%; text-align: justify;">
                                            <a>{{$value->tenTT}}</a>
                                        </td>
                                        <td class="text-center"style="width: 13%;">
                                            <a>{{$value->tg_giai_quyet}}</a>
                                        </td>
                                        <td class="text-center" style="width: 20%;">
                                            <a>{{$value->tenDM}}</a>
                                        </td>
                                        <td class="text-center" style="width: 7%;">
                                            <a href="{{route('tt.show',$value->id)}}"> <i class="fas fa-info-circle"></i></a>
                                        </td>
                                        <td class="col-send-dossier text-center">
                                            <a href="{{ route('bieumau_form', $value->maTT) }}"
                                                class="btn btn-green ">Thực hiện</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{$thutuc->links('pagination::bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js_footer')
<script>
</script>
@endsection

