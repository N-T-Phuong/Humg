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
                            <td>Mã hồ sơ</td>
                            <td>Sinh Viên</td>
                            <td>Thủ tục</td>
                            <td>Ngày nộp</td>
                            <td>Trạng thái</td>
                            <td class="text-center">Hành động</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hoso as $item)
                        <tr>
                            <td>{{ $item->hoso_code }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->thutuc->tenTT }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                @if ($item->trang_thai == 'Tiếp nhận')
                                <a class="btn btn-info" href="{{ route('action.status', $item->id) }}">Tiếp nhận</a>
                                @elseif ($item->trang_thai == 'Đang xử lý')
                                <a class="btn btn-danger " href="{{ route('action.status', $item->id) }}">Đang xử lý</a>
                                @elseif ($item->trang_thai == 'Hoàn thành')
                                <a class="btn btn-success" href="">Hoàn thành</a>
                                @else
                                    <a class="btn btn-secondary" href="{{ route('action.status', $item->id) }}">{{$item->trang_thai}}</a>
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-info  btn-circle"  href="{{route('hoso.show',$item->id)}}"> <i class="fas fa-file-alt"></i></a>
                                <a href="{{ route('hoso.edit', $item->id)}}" class="btn btn-primary btn-sm btn-circle"><i class="far fa-edit"></i></a>
                                <form action="{{ route('hoso.destroy', $item->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm btn-circle" type="submit"><i  class="fas fa-trash"></i></button>
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

