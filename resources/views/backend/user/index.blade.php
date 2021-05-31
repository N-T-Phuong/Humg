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
    <div class="push-top">
        <div class="col-md-4 ">
        </div>
        <div class="card">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary float-left">Danh sách tài khoản</h6>
                <div class="float-right mr-3"> <a href="{{route('users.create')}}" class="btn btn-primary btn-sm">Thêm thành viên</a></div>
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
                                    <td>Tên </td>
                                    <td>Mã sinh viên</td>
                                    <td>Email</td>
                                    <td class="text-center">Hành động</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->ma}}</td>
                                        <td>{{$item->email}}</td>
                                        <td class="text-center">
                                            <a href="{{ route('users.edit', $item->id)}}" class="btn btn-primary btn-sm img-circle" ><i class="far fa-edit"></i></a>
                                            <form action="{{ route('users.destroy', $item->id)}}" method="post"
                                                  style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm img-circle" type="submit"><i class="fas fa-times"></i></button>
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