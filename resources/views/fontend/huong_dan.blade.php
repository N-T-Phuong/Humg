
@extends('fontend.include.master')
@section('content')
    <section class="breadcrumbs margin-0">
        <div class="container">
            <ol class="breadcrumb">
                <li>
                    <a href="/">Trang chủ</a>
                </li>
                <i class="fas fa-angle-right"></i>
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
                        <h2 class="guide-page__title sidebar__title"><span>Công Dân sử dụng dịch vụ công trực tuyến</span></h2>
                        <div class="guide-page__step">
                            <div class="item">
                                <span class="item__step">Bước 1</span>
                                <div class="item__desc color-55">Từ Trang Chủ, Công dân chọn <a href="/nop-truc-tuyen" class="primary-color">Đăng ký trực tuyến</a> để bắt đầu.</div>
                                <div class="item__img">
                                    <img src="/Images/guide/B%c6%b0%e1%bb%9bc 1.png" alt="Bước 1">
                                </div>
                            </div>
                            <div class="item">
                                <span class="item__step">Bước 2</span>
                                <div class="item__desc color-55">Công dân <a href="#" class="primary-color">chọn loại dịch vụ</a> cần sử dụng rồi ấn nút <a href="#" class="primary-color">Thực hiện</a></div>
                                <div class="item__img">
                                    <img src="/Images/guide/B%c6%b0%e1%bb%9bc 2.png" alt="Bước 2">
                                </div>
                            </div>
                            <div class="item">
                                <span class="item__step">Bước 3</span>
                                <div class="item__desc color-55">Điền thông tin theo mẫu tờ khai trực tuyến. Những trường thông tin có dấu * là bắt buộc nhập.</div>
                                <div class="item__img">
                                    <img src="/Images/guide/B%c6%b0%e1%bb%9bc 3.png" alt="Bước 3">
                                </div>
                            </div>
                            <div class="item">
                                <span class="item__step">Bước 4</span>
                                <div class="item__desc color-55">Sau khi điền đầy đủ thông tin, Công dân nhấn vào nút <a href="#" class="primary-color">Tiếp tục</a> để xem lại thông tin đã điền.</div>
                                <div class="item__img">
                                    <img src="/Images/guide/B%c6%b0%e1%bb%9bc 4.png" alt="Bước 4">
                                </div>
                            </div>
                            <div class="item">
                                <span class="item__step">Bước 5</span>
                                <div class="item__desc color-55">Sau khi đã kiểm tra thông tin và chính xác, Công dân nhập <a href="#" class="primary-color">Mã Xác Nhận</a> và nhấn vào nút <a href="#" class="primary-color">Tiếp tục</a>.</div>
                                <div class="item__img">
                                    <img src="/Images/guide/B%c6%b0%e1%bb%9bc 5.png" alt="Bước 5">
                                </div>
                            </div>
                            <div class="item">
                                <span class="item__step">Bước 6</span>
                                <div class="item__desc color-55">
                                    <p class="margin-0">Thông tin đăng ký thành công sẽ đi đến trang hướng dẫn các bước tiếp theo để hoàn tất hồ sơ.</p>
                                    <p class="margin-0">Công dân có thể lưu lại Mã hồ sơ để Tra cứu tình trạng hồ sơ. Xem thêm Cách
                                        <a href="/huong-dan/tra-cuu-ho-so" class="primary-color">Tra Cứu Thông Tin Hồ Sơ.</a> </p>
                                </div>
                                <div class="item__img">
                                    <img src="/Images/guide/B%c6%b0%e1%bb%9bc 6.png" alt="Bước 6">
                                </div>
                            </div>
                            <div class="item">
                                <span class="item__step">Bước 7</span>
                                <div class="item__desc color-55">
                                    <p class="margin-0">Thông tin đăng ký sẽ được gửi đến hộp thư điện tử mà Công dân đã điền trong biểu mẫu.</p>
                                    <p class="margin-0">Trường hợp hồ sơ chưa đầy đủ hoặc có yêu cầu khác, Công dân sẽ được hướng dẫn chi tiết để bổ sung hoàn chỉnh hồ sơ.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection