@extends('backend.layout.index')
@section('js_footer')
    <!-- Page level plugins -->
    <script src="{{asset('hs/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('hs/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('hs/js/demo/datatables-demo.js')}}"></script>
@endsection
@section('content')
    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <div class="col-md-4 ">
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary float-left">Danh sách danh mục</h6>
                <div class="float-right mr-3"> <a href="{{route('danhmuc.create')}}" class="btn btn-primary btn-sm">Thêm mới</a></div>
            </div>
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Mã Danh Mục</td>
                            <td>Tên Danh Mục</td>
                            <td>Mô tả</td>
                            <td class="text-center">Hành động</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($danhmuc as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->maDM}}</td>
                                <td>{{$item->tenDM}}</td>
                                <td>{{$item->mota}}</td>
                                <td class="text-center">
                                    <a href="{{ route('danhmuc.edit', $item->id)}}" class="btn btn-primary btn-sm btn-circle"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('danhmuc.destroy', $item->id)}}" method="post"
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