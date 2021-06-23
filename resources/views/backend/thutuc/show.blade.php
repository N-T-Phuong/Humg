@extends('fontend.include.master')
@section('content')
    <div class="container" id="cttt-wrapper">
        <h3 class="page-header">Chi tiết thủ tục {{ $thutuc->tenTT }}</h3>

        <div class="panel panel-default" style="margin-top:15px">
            <!-- Default panel contents -->
            <div class="panel-heading custom-heading">
                Ký hiệu thủ tục: <strong>{{ $thutuc->maTT }}</strong>
                <div class="pull-right"><em>Lượt xem: 1</em></div>
            </div>
            <div class="panel-body">
                <div data-example-id="togglable-tabs" class="mar-b-10">
                    <ul id="myTabs" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#basic-info" role="tab" data-toggle="tab" aria-controls="basic-info" aria-expanded="true">Thông tin chung</a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#step-by-step" role="tab" data-toggle="tab" aria-controls="step-by-step" aria-expanded="false">Trình tự thực hiện</a>
                        </li>

                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade tab-thong-tin-chung active in" id="basic-info" aria-labelledby="basic-info-tab">
                            <!-- Table -->
                            <table class="table-basic-info-tt table table-hover">
                                <colgroup>
                                    <col width="20%">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>Thông tin</th>
                                    <th>Nội dung</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Phòng ban thực hiện</td>
                                    <td>
                                        <p>{{ $thutuc->danhmuc->tenDM }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cách thức thực hiện</td>
                                    <td>
                                        <p> - Nộp hồ sơ trực tiếp tại website hoặc nộp hồ sơ trực tiếp tại Bộ phận một cửa </p>
                                        <p> - Nhận kết quả giải quyết tại Bộ phận một cửa và trả kết quả của phòng ban thực hiện, hoặc qua đường bưu điện.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số lượng hồ sơ</td>
                                    <td>01 bộ</td>
                                </tr>
                                <tr>
                                    <td>Thời gian giải quyết</td>
                                    <td>
                                        <p>{{ $thutuc->tg_giai_quyet }} ngày làm việc kể từ ngày nhận đủ hồ sơ hợp lệ.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ðối tượng thực hiện</td>
                                    <td>Sinh viên</td>
                                </tr>
                                <tr>
                                    <td>Kết quả thực hiện</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong>Lệ phí</strong></td>
                                    <td>
                                        <p>Không</p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <div role="tabpanel" class="tab-pane fade tab-trinh-tu-thuc-hien" id="step-by-step" aria-labelledby="step-by-step-tab">
                            <p></p>
                            <p>
                                Bước 1. Sinh viên nộp hồ sơ trực tiếp và trả kết quả tại Bộ phận một cửa.</p>
                            <p>
                                Bước 2. Cán bộ tiếp nhận hồ sơ kiểm tra tính pháp lý và nội dung hồ sơ; với trường hợp hồ sơ đáp ứng theo quy định hoặc hướng dẫn để sinh viên hoàn thiện hồ sơ đối với trường hợp hồ sơ không đáp ứng theo quy định.Thời gian tiếp nhận hồ sơ: Từ thứ 2 đến thứ 6 theo giờ hành chính.</p>
                            <p>
                                Bước 3. Trong thời hạn {{ $thutuc->tg_giai_quyet }} ngày làm việc, kể từ ngày nhận được hồ sơ, đơn vị được giao thẩm định hồ sơ có trách nhiệm xem xét hồ sơ, kiểm tra thực địa (nếu cần thiết). Khi xem xét hồ sơ, Phòng ban phải xác định các tài liệu còn thiếu, các tài liệu không đúng theo quy định hoặc không đúng với thực tế để thông báo một lần bằng văn bản cho sinh viên bổ sung, hoàn chỉnh hồ sơ;</p>
                            <p>
                                Phòng ban có trách nhiệm đối chiếu với các điều kiện cấp phép để gửi văn bản lấy ý kiến của các cơ quan quản lý nhà nước về những lĩnh vực liên quan đến công trình xây dựng;</p>
                            <p>
                                Bước 4. Phòng ban căn cứ các quy định hiện hành và các điều kiện cấp phép để quyết định việc cấp giấy phép xây dựng. Nếu hồ sơ đáp ứng đủ điều kiện cấp phép,nếu Hồ sơ không đủ điều kiện cấp phép, Cơ quan cấp phép có văn bản trả lời tại nơi tiếp nhận hồ sơ, theo thời hạn ghi trong giấy biên nhận.</p>
                            <p></p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade tab-thanh-phan-ho-so" id="component" aria-labelledby="component-tab">
                            <div style="margin-bottom:5px"><p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade tab-yeu-cau-dieu-kien" id="conditional" aria-labelledby="conditional-tab">
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="postal" aria-labelledby="postal-tab">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="form-action">
                    <a href="{{  route('bieumau_form', $thutuc->maTT) }}" class="btn btn-success"><i class="fa fa-hand-o-right"></i> Nộp hồ sơ trực tuyến</a>
                </div>
            </div>
        </div>
    </div>
@endsection