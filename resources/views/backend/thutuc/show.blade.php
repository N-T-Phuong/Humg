@extends('backend.layout.index')
@section('content')
    <div class="tracuu">
        <div class="col-md-4 ">
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 font-weight-bold">
                <h2> {{$thutuc->tenTT}}</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <p><strong>Hồ Sơ:</strong>{{ strip_tags($thutuc->mota)}}</p>
                    <hr>
                    <p><strong>Thời gian giải quyết:</strong>{{$thutuc->tg_giai_quyet}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection