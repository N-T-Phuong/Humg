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
                <h4 class="m-0 font-weight-bold text-primary float-left">Danh sách hồ sơ</h4>
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
                            <table id="dataTable" width="100%" cellspacing="0" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead>
                                <tr class="font-weight-bold">
                                    <td>STT</td>
                                    <td>Mã hồ sơ</td>
                                    {{--<td>Sinh Viên</td>--}}
                                    <td>Thủ tục</td>
                                    <td>Ngày nộp</td>
                                    <td>Trạng thái</td>
                                    <td class="text-center">Hành động</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($hoso as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->hoso_code }}</td>
                                        {{--<td>{{ $item->user->name }}</td>--}}
                                        <td>{{ $item->thutuc->tenTT }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            @if ($item->trang_thai == 'Tiếp nhận')
                                                <a class="btn btn-info" href="">Tiếp nhận</a>
                                            @elseif ($item->trang_thai == 'Đang xử lý')
                                                <a class="btn btn-warning " href="">Đang xử lý</a>
                                            @elseif ($item->trang_thai == 'Hoàn thành')
                                                <a class="btn btn-success" href="">Hoàn thành</a>
                                            @elseif ($item->trang_thai == 'Hủy bỏ')
                                                <a class="btn btn-danger" href="">Hủy bỏ</a>
                                            @else
                                                <a class="btn btn-secondary" href="">{{$item->trang_thai}}</a>
                                            @endif
                                            {{--@if ($item->trang_thai == 'Tiếp nhận')--}}
                                                {{--<a class="btn btn-info" href="{{ route('action.status', $item->id) }}">Tiếp nhận</a>--}}
                                            {{--@elseif ($item->trang_thai == 'Đang xử lý')--}}
                                                {{--<a class="btn btn-danger " href="{{ route('action.status', $item->id) }}">Đang xử lý</a>--}}
                                            {{--@elseif ($item->trang_thai == 'Hoàn thành')--}}
                                                {{--<a class="btn btn-success" href="">Hoàn thành</a>--}}
                                            {{--@else--}}
                                                {{--<a class="btn btn-secondary" href="{{ route('action.status', $item->id) }}">{{$item->trang_thai}}</a>--}}
                                            {{--@endif--}}
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-info  img-circle"  href="{{route('hoso.show',$item->id)}}"> <i class="fas fa-file-alt"></i></a>
                                            <a href="{{ route('hoso.edit', $item->id)}}" class="btn btn-primary btn-sm img-circle"><i class="far fa-edit"></i></a>
                                            <form action="{{ route('hoso.destroy', $item->id)}}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm img-circle" type="submit"><i  class="fas fa-trash"></i></button>
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