<section id="guide" class="guide-page">
    <div class="container">
        <div class="row">
            <div class=" col-md-2"></div>
            <div class="col-md-8 offset-2">
                <div class=" bg-color-light box-shadow-main" style=" padding: 2em;">
                    <div class="text-center">
                        <img src="{{ asset('hs/img/logo.png') }}" alt="logo HUMG" width="140px">
                    </div>
                    <h2 class="text-center font-size-17" style="color: #259b40">Đã gửi thông tin hồ sơ thành công</h2>
                    <div class="">
                        <div class="card shadow mb-4">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 font-size-16" style="text-align:justify">
                                        <div class="alert ">
                                            <strong>Mã hồ sơ:  </strong>  {{ $code }}
                                            {{-- <a href="{{ route('tra_cuu') }}">{{$code}}</a> --}}
                                        </div>
                                    <hr>
                                    <div >
                                          - Sinh viên vui lòng mang theo <strong>thẻ sinh viên (chứng minh nhân dân/ thẻ căn cước công dân) </strong> để đối chiếu khi nhận thông báo có kết quả qua Email, tin nhắn SMS.
                                    </div>
                                        <br>
                                    <div > - Hồ sơ sẽ bị <strong> hủy sau 30 ngày</strong> có kết quả sinh viên không đến nhận.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center" style=" margin:30px 0">
                        <a href="{{ route('dang_nhap') }}" class="btn btn-blue-dark">Trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
