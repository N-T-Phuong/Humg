@extends('backend.layout.index')
@section('js_footer')
    <!-- Page level plugins -->
    <script src="{{ asset('hs/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('hs/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('hs/vendor/datatables/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('hs/vendor/datatables/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('hs/js/demo/datatables-demo.js')}}"></script>
    <!-- page script -->
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
            Danh sách môn học
        </h1>
    </section>
    <div class="push-top">
        <div class="col-md-4 ">
        </div>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary float-left"></h6>
                <div class="float-right mr-3"> <a href="{{route('hp.create')}}" class="btn btn-primary btn-sm">Thêm mới</a></div>
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
                                    <td>STT</td>
                                    <td>Mã môn học</td>
                                    <td>Tên môn học</td>
                                    <td>Thao tác</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hp as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$item->ma}}</td>
                                        <td>{{$item->ten}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('hp.edit', $item->id)}}" class="btn btn-primary btn-sm img-circle" ><i class="far fa-edit"></i></a>
                                            <form action="{{ route('hp.destroy', $item->id)}}" method="post"
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
            <!-- /.card-body -->
        </div>
    </div>
@endsection