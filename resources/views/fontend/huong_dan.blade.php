@extends('fontend.include.master')
@section('content')
    <section class="breadcrumbs margin-0">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <li class="active">Hướng dẫn</li>
            </ol>
        </div>
    </section>

    <section id="guide" class="guide-page">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <aside>
                        <div class="sidebar__box sidebar__guide">
                            <h2 class="sidebar__title"><span>Hướng dẫn</span></h2>
                            <div class="sidebar__guide-body">
                                <ul class="nav-guide">
                                    <li class="item active">
                                        <a href="{{route('huong_dan')}}">Sử dụng dịch vụ </a>
                                    </li>
                                    <li class="item">
                                        <a href="{{route('tra_cuu')}}">Tra cứu hồ sơ</a>
                                    </li>
                                    <li class="item">
                                        <a href="/huong-dan/video-huong-dan">Video hướng dẫn</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-md-9">
                    <div class="guide-page__body bg-color-light box-shadow-main">
                        <h2 class="guide-page__title sidebar__title"><span>Sinh viên sử dụng dịch vụ công trực tuyến</span></h2>
                        <div class="guide-page__step">
                            <div class="item">
                                <span class="item__step">Bước 1</span>
                                <div class="item__desc color-55">Sinh viên  <a href="{{ route('dang_nhap')}}" class="primary-color">Đăng nhập</a> để thực hiện nộp hồ sơ.</div>
                                <div class="item__img">
                                    <img src="{{ asset('fe/img/buoc1.PNG') }}" alt="Bước 1">
                                </div>
                            </div>
                            <div class="item">
                                <span class="item__step">Bước 2</span>
                                <div class="item__desc color-55">Từ Trang Chủ, Sinh viên chọn <a href="{{ route('nop_ho_so')}}" class="primary-color">Nộp hồ sơ trực tuyến</a> để bắt đầu.</div>
                                <div class="item__img">
                                    <img src="{{ asset('fe/img/buoc2.PNG') }}" alt="Bước 2">
                                </div>
                            </div>
                            <div class="item">
                                <span class="item__step">Bước 3</span>
                                <div class="item__desc color-55">Sinh viên <a href="#" class="primary-color">chọn loại dịch vụ</a> cần sử dụng rồi ấn nút <a href="#" class="primary-color">Thực hiện</a></div>
                                <div class="item__img">
                                    <img src="{{ asset('fe/img/buoc3.PNG') }}" alt="Bước 3">
                                </div>
                            </div>
                            <div class="item">
                                <span class="item__step">Bước 4</span>
                                <div class="item__desc color-55">Điền thông tin theo mẫu tờ khai trực tuyến. Những trường thông tin có dấu * là bắt buộc nhập.</div>
                                <div class="item__img">
                                    <img src="{{ asset('fe/img/buoc4.PNG') }}" alt="Bước 4">
                                </div>
                            </div>
                            <div class="item">
                                <span class="item__step">Bước 5</span>
                                <div class="item__desc color-55">Sau khi điền đầy đủ thông tin, Sinh viên nhấn vào nút <a href="#" class="primary-color">Nộp hồ sơ</a> để lưu lại thông tin đã điền.</div>
                                <div class="item__img">
                                    <img src="{{ asset('fe/img/buoc5.PNG') }}" alt="Bước 5">
                                </div>
                            </div>
                            <div class="item">
                                <span class="item__step">Bước 6</span>
                                <div class="item__desc color-55">
                                    <p class="margin-0">Thông tin đăng ký thành công sẽ đi đến trang thông báo kết quả.</p>
                                    <p class="margin-0">Sinh viên lưu lại Mã hồ sơ để Tra cứu tình trạng hồ sơ. Xem thêm Cách
                                        <a href="{{ route('tra_cuu') }}" class="primary-color">Tra Cứu Thông Tin Hồ Sơ.</a> </p>
                                </div>
                                <div class="item__img">
                                    <img src="{{ asset('fe/img/buoc6.jpg') }}" alt="Bước 6">
                                </div>
                            </div>
                            <div class="item">
                                <span class="item__step">Bước 7</span>
                                <div class="item__desc color-55">
                                    <p class="margin-0">Thông tin đăng ký sẽ được gửi đến hộp thư điện tử Sinh viên đã điền trong biểu mẫu.</p>
                                    <p class="margin-0">Trường hợp hồ sơ chưa đầy đủ hoặc có yêu cầu khác, Sinh viên sẽ được hướng dẫn chi tiết để bổ sung hoàn chỉnh hồ sơ.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
