@extends('fontend.include.master')
@section('content')
<section id="guide" class="guide-page">
    <div class="container">
        <div class="row">
            <div class=" col-md-2"></div>
            <div class="col-md-8 offset-2">
                <div class="guide-page__body bg-color-light box-shadow-main">
                    <h2 class="guide-page__title sidebar__title text-center"><span>ĐÃ GỬI THÔNG TIN THÀNH CÔNG</span></h2>
                    <div class="guide-page__step">
                        <div class="card shadow mb-4" >
                            Mã hồ sơ đã đăng ký: {{$hoso->hoso_code}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
