
@extends('backend.layout.index')
@section('js_footer')

@endsection
@section('content')
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Báo cáo - Thống kê</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <br>
        <form id="formMain">
            <div class="">
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label>Tháng</label>
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="" style="width:100%" name="txt_thang" id="txt_thang" value="{{$startDate}}">
                        </div>
                    </div>

                    <div class="actions form-group">
                        <label></label>
                        <div class="input" style="margin-top: 8px">
                            <button id="timKiem" class="btn btn-success"><i class="fa fa-search"></i> Lọc</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <br>
        <br>
        <!-- /.content -->
        <section class="">
            <div class="card">
                <div class="card-header ">
                    <div class="d-flex" style="margin-top: -2em;">
                        <div class="border border-warning rounded" style="background-color: #9f81d6; padding:8px 10px;">
                            <i class="fas fa-folder-plus"></i>
                        </div>
                    </div>
                    <h5 class="pl-2" style=" margin: -11px 0 0 2em; ">Thống kê cán bộ tiếp nhận </h5>
                </div>
                <div class="card-body">
                    <table class="table border table-bordered table-striped " id="sortable-table">
                        <thead class=" text-center" >
                        <tr>
                            <th scope="col" width="7%" >STT</th>
                            <th scope="col" width="30%"> Cán bộ </th>
                            <th scope="col" width="30%"> Phòng ban </th>
                            <th scope="col" width="18%" >Số lượng hồ sơ</th>
                            <th scope="col" width="15%"> Ghi chú </th>
                            {{-- <th scope="col" width="8%">Hủy bỏ (hồ sơ)</th> --}}

                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $canbo as $key => $value)
                            @if($value->xulyhoso_count > 0 )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->phongban->tenDM }}</td>
                                <td class=" text-center">{{ $value->xulyhoso_count }}</td>
                                <td class=" text-center"></td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mt-4 float-right">
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
