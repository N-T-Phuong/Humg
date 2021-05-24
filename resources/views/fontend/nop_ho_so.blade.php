@extends('fontend.include.master')

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
            <div class="">
                <div class="flex-sb">
                    <div>
                        <label>Số lượng mỗi trang: </label>
                        <select class="custom-select">
                            <option selected value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input id="search-hoso" type="text" class="form-control" placeholder="Tìm kiếm"
                            aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>

                <div class="">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 5%;">STT</th>
                                        <th class="text-center" style="width: 30%;">Tên thủ tục</th>
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
                                            {{$value->id}}
                                        </td>
                                        <td style="width: 30%;">
                                            <a>{{$value->tenTT}}</a>
                                        </td>
                                        <td style="width: 10%;">
                                            <a>{{$value->tg_giai_quyet}}</a>
                                        </td>
                                        <td style="width: 20%;">
                                            <a>{{$value->tenDM}}</a>
                                        </td>
                                        <td style="width: 10%;">
                                            <a href="{{route('tt.show',$value->id)}}"> <i
                                                    class="fas fa-info-circle"></i></a>
                                        </td>
                                        <td class="col-send-dossier">
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

<style>
    .flex-sb {
        display: flex;
        justify-content: space-between;
        padding: 10px;
    }

    #basic-addon1 {
        position: absolute;
        left: -20px;
        top: 8px
    }
</style>