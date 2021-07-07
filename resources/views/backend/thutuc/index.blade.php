@extends('backend.layout.index')
@section('js_footer')
    <!-- Page level plugins -->
    <script src="{{ asset('hs/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('hs/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    {{--<script src="{{ asset('hs/vendor/datatables/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>--}}
    {{--<script src="{{ asset('hs/vendor/datatables/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>--}}
    <script>
        $(function () {
            $('#dataTable').DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
@section('content')
    <section class="content-header">
        <h1 class="">
            Danh sách thủ tục
        </h1>
    </section>
    <div class="push-top">
        <div class="col-md-4 ">
        </div>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary float-left"></h6>
                <div class="float-right mr-3"> <a href="{{route('tt.create')}}" class="btn btn-primary btn-sm">Thêm mới</a></div>
            </div>
            @if(session('error'))
                <div class="alert alert-success">
                    {{session('error')}}
                </div>
            @endif
            <!-- /.card-header -->
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="dataTable"width="100%" cellspacing="0" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead >
                                <tr class="font-weight-bold">
                                    <td>Mã Thủ Tục</td>
                                    <td>Tên Thủ Tục</td>
                                    <td> Phòng ban</td>
                                    <td>Thời gian giải quyết</td>
                                    {{--<td>Ví dụ: số hồ sơ đang xử lý</td>--}}
                                    <td class="text-center">Hành động</td>
                                </tr>
                                </thead>
                                <tbody >
                                @foreach($thutuc as $item)
                                    <tr>
                                        <td>{{$item->maTT}}</td>
                                        <td>{{$item->tenTT}}</td>
                                        <td>{{$item->danhmuc->tenDM}}</td>
                                        <td>{{$item->tg_giai_quyet}} ngày</td>
                                        {{--<td>{{$item->hosodangxuly_count}}</td>--}}
                                        <td class="text-center">
                                            <a href="{{ route('tt.edit', $item->id)}}" class="btn btn-primary btn-sm img-circle" ><i class="far fa-edit"></i></a>
                                            <form action="{{ route('tt.destroy', $item->id)}}" method="post"
                                                  style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm img-circle" type="submit"><i class="fas fa-trash"></i></button>
                                            </form>

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
@endsection
