@extends('backend.bieumau.form')
@section('file')
    <hr>
    <div id="row-5" class="row ui-sortable ui-sortable-handle">
        <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="tenhp">
                    <span class="label-content">Em làm đơn này kính đề nghị Bộ môn, Phòng Đào tạo đại học mở lớp Học phần</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <textarea placeholder="Học phần" type="text" class="form-control " id="tenhp" name="tenhp"></textarea>
            </div>
        </div>
    </div>
    <div id="row-6" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="mahp">
                    <span class="label-content">Mã học phần</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="mahp" name="mahp" type="text" class="form-control" value="">
            </div>
        </div>
        <div id="column-4" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="hoc_ky">
                    <span class="label-content">Vào học kỳ</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="hoc_ky" name="hoc_ky" type="text" class="form-control" value="">
            </div>
        </div>
    </div>
    <div id="row-7" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="nhomhp">
                    <span class="label-content">Nhóm học phần</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="nhomhp" name="nhomhp" type="text" class="form-control" value="">
            </div>
        </div>
    </div>
    <div id="row-8" class="row ui-sortable ui-sortable-handle">
        <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="website" class="form-group text">
                <label id="_lbl_website" class="control-label" for="ly_do">
                    <span class="label-content">Lý do xin mở lớp</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <textarea placeholder="Ghi rõ lý do xin mở lớp" type="text" class="form-control " id="ly_do" name="ly_do"></textarea>
            </div>
        </div>
    </div>
    <div>
        <div>
            <label>Kính mong Bộ môn
                <input id="lop" name="lop" type="text" class="form-control" value="">
                Phòng Đào tạo Đại học xem xét.
            </label>
        </div>
        <p>Em xin chân thành cảm ơn!</p>
    </div>
    <div id="row-9" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="canbo">
                    <span class="label-content">Bộ môn ghi rõ tên cán bộ giảng dạy:</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="mahp" name="canbo" type="text" class="form-control" value="">
            </div>
        </div>
        <div id="column-4" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="tkb">
                    <span class="label-content">Thời khóa biểu theo yêu cầu:</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="ky" name="tkb" type="text" class="form-control" value="">
            </div>
        </div>
    </div>
    <div id="row-10" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="file">
                    <span class="label-content">Tệp đính kèm</span>
                    <span class="color-err" title="Trường bắt buộc">(Danh sách đính kèm nếu có)</span>
                </label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="file_dinh_kem" id="inputGroupFile04">
                </div>
            </div>
        </div>
    </div>
@endsection