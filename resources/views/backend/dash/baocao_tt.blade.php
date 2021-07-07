
@extends('backend.layout.index')
@section('js_footer')
    <script src="{{ asset('hs/js/table-sorter.js') }}"></script>
    <script>
        $(function () {
            $(' #sortable-table ').tableSorter({
                // sortList:[[0,0], [1,0]]
            });
        });
    </script>
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
                            <label>Từ ngày</label>
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="date" style="width:100%" name="txt_TU_NGAY" id="txt_TU_NGAY" value="{{$params['txt_TU_NGAY'] ?? ''}}">
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="form-group">
                            <label>Đến ngày:</label>
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input class="form-control" type="date" style="width:100%" name="txt_DEN_NGAY" id="txt_DEN_NGAY" value="{{$params['txt_DEN_NGAY'] ?? ''}}">
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
                    <h5 class="pl-2" style=" margin: -11px 0 0 2em; ">Thống kê </h5>
                </div>
                <div class="card-body">
                    <table class="table border table-bordered table-striped " id="sortable-table">
                        <thead class=" text-center" >
                        <tr>
                            <th scope="col" width="3%" >STT</th>
                            <th scope="col" width="45%">Loại thủ tục </th>
                            <th scope="col" width="12%">Hoàn thành (hồ sơ)</th>
                            <th scope="col" width="10%" >Đang xử lý (hồ sơ)</th>
                            <th scope="col" width="10%">Chưa xử lý (hồ sơ)</th>
                            <th scope="col" width="8%">Hủy bỏ (hồ sơ)</th>
                            {{--<th scope="col">Ghi chú</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $hs->tt as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->tenTT }}</td>
                                <td class=" text-center">{{ $value->hosodaxuly_count }}</td>
                                <td class=" text-center">{{ $value->hosodangxuly_count }}</td>
                                <td class=" text-center">{{ $value->hosochuaxuly_count }}</td>
                                <td class=" text-center">{{ $value->hosohuy_count }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center mt-4 float-right">
                        {{$hs->tt->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
