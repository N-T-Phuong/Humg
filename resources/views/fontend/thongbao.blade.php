@extends('fontend.include.master')
@section('content')
<section id="guide" class="guide-page">
    <div class="container">
        <div class="row">
            <div class=" col-md-2"></div>
            <div class="col-md-8 offset-2">
                <div class="guide-page__body bg-color-light box-shadow-main">
                    <h2 class="guide-page__title sidebar__title text-center font-size-16"><span>ĐÃ GỬI THÔNG TIN THÀNH CÔNG</span></h2>
                    <div class="guide-page__step">
                        <div class="card shadow mb-4" >
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8 font-size-16">
                                    @if(session('error'))
                                        <div class="alert ">
                                            <strong>Mã hồ sơ: </strong>  <a href="{{ route('tra_cuu') }}">{{session('error')}}</a>
                                        </div>
                                    @endif
                                    <hr>
                                    <div class="font-size-15">
                                          - Sinh viên vui lòng mang theo <strong>thẻ sinh viên (chứng minh nhân dân/ thẻ căn cước công dân) </strong> để đối chiếu khi nhận thông báo có kết quả qua Email, tin nhắn SMS.
                                    </div>
                                        <br>
                                    <div class="font-size-15"> - Hồ sơ sẽ bị <strong> hủy sau 30 ngày</strong> có kết quả sinh viên không đến nhận.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
