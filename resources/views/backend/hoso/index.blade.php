@extends('backend.layout.index')
@section('js_footer')
    <!-- Page level plugins -->
    <script src="{{asset('hs/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('hs/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('hs/js/demo/datatables-demo.js')}}"></script>
@endsection
@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Sinh Viên</td>
                            <td>Số điện thoại</td>
                            <td> Địa chỉ</td>
                            <td> CMND/CCND</td>
                            <td> Ngày cấp</td>
                            <td>Nơi cấp</td>
                            <td>Thủ tục</td>
                            <td class="text-center">Hành động</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hoso as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->sv_id}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->diachi}}</td>
                                <td>{{$item->cmnd}}</td>
                                <td>{{$item->ngay_cap}}</td>
                                <td>{{$item->noi_cap}}</td>
                                <td>{{$item->thutuc_id}}</td>

                                <td class="text-center">
                                    <a href="{{ route('hoso.edit', $item->id)}}" class="btn btn-primary btn-sm btn-circle" ><i class="far fa-edit"></i></a>
                                    <form action="{{ route('hoso.destroy', $item->id)}}" method="post"
                                          style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btn-circle" type="submit"><i class="fas fa-trash"></i></button>
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


@endsection