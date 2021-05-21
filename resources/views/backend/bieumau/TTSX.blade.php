@extends('backend.bieumau.form')
@section('file')
    <div id="row-5" class="row ui-sortable ui-sortable-handle">
        <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="lop">
                    <span class="label-content">Đại diện cho lớp : </span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <textarea placeholder="Học phần" type="text" class="form-control " id="lop" name="lop"></textarea>
            </div>
        </div>
        <div id="column-3" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="khoa">
                    <span class="label-content">Khoa</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <textarea id="khoa" name="khoa" type="text" class="form-control" value=""></textarea>
            </div>
        </div>
    </div>
    <div id="row-8" class="row ui-sortable ui-sortable-handle">
        <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="website" class="form-group text">
                <label id="_lbl_website" class="control-label" for="ngay_cap">
                    <span class="label-content">và Phòng Đào tạo Đại học cho phép chúng em được đi thực tập tốt nghiệp theo kế hoạch của Nhà trường:</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                {{--<textarea placeholder="Ghi rõ lý do xin mở lớp" type="text" class="form-control " id="ly_do" name="ly_do"></textarea>--}}
            </div>
        </div>
    </div>
    <div id="row-9" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="tenhp">
                    <span class="label-content">Từ ngày:</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="tu_ngay" name="tu_ngay" type="date" class="form-control" value="">
            </div>
        </div>
        <div id="column-4" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="email">
                    <span class="label-content">đến ngày:</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="den_ngay" name="den_ngay" type="date" class="form-control" value="">
            </div>
        </div>
    </div>
    <div id="row-8" class="row ui-sortable ui-sortable-handle">
        <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="website" class="form-group text">
                <label id="_lbl_website" class="control-label" for="ngay_cap">
                    <span class="label-content">Địa điểm</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <textarea placeholder="Ghi rõ địa điểm thực tập " type="text" class="form-control " id="dia_diem" name="dia_diem"></textarea>
            </div>
        </div>
    </div>
    <div id="row-10" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="file">
                    <span class="label-content">(Nếu sinh viên đi thực tập theo nhóm kê khai vào danh sách kèm theo)</span>
                    <span class="color-err" title="Trường bắt buộc">(Danh sách đính kèm nếu có)</span>
                </label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_dinh_kem" id="inputGroupFile04">
                </div>
            </div>
        </div>
    </div>
    <div id="row-9" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="tenhp"> Chúng em cam kết sẽ chấp hành mọi nội quy, quy định của Nhà trường.
                    Em xin chân thành cảm ơn!</label>
            </div>
        </div>
@endsection