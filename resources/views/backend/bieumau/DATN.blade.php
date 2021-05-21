@extends('backend.bieumau.form')
@section('file')
    <div id="row-5" class="row ui-sortable ui-sortable-handle">
        <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
            <label class="control-label">Em làm đơn này xin phép được làm đồ án tốt nghiệp. </label>
            <div id="website" class="form-group text">
                <label id="_lbl_website" class="control-label" for="ngay_cap">
                    <span class="label-content">Tên đồ án:</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <textarea placeholder="Ghi rõ tên đồ án " type="text" class="form-control " id="do_an" name="do_an"></textarea>
            </div>
        </div>
    </div>
    <div id="row-6" class="row ui-sortable ui-sortable-handle">
        <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="website" class="form-group text">
                <label id="_lbl_website" class="control-label" for="ngay_cap">
                    <span class="label-content">Lý do:</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <textarea placeholder="Ghi rõ lý do xin mở lớp" type="text" class="form-control " id="ly_do" name="ly_do"></textarea>
            </div>
        </div>
    </div>

    <div id="row-10" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <div >
                    Kính mong được sự đồng ý của Giáo viên hướng dẫn, Bộ môn và Phòng Đào tạo Đại học.
                </div>
                <div>Em xin chân thành cảm ơn!</div>
            </div>
        </div>
    </div>
@endsection()