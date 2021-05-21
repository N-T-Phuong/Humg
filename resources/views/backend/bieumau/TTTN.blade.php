@extends('backend.bieumau.form')
@section('file')
    <div id="row-5" class="row ui-sortable ui-sortable-handle">
        <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="website" class="form-group text">
                <label id="_lbl_website" class="control-label" for="ngay_cap">
                    <span class="label-content">Theo Quyết định của Nhà trường em được phân công thực tập tại:</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <textarea placeholder="Ghi rõ địa điểm thực tập cũ" type="text" class="form-control " id="dia_diem" name="dia_diem"></textarea>
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
    <div id="row-7" class="row ui-sortable ui-sortable-handle">
        <div id="column" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="tenhp">
                    <span class="label-content">Em làm đơn này xin phép Bộ môn: </span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input placeholder="Bộ môn" type="text" class="form-control " id="bo_mon" name="bo_mon">
            </div>
        </div>

        <div id="column-3" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="khoa">
                    <span class="label-content">Khoa</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="khoa" name="khoa" type="text" class="form-control" value="" placeholder="Khoa">
            </div>
        </div>
    </div>

    <div id="row-8" class="row ui-sortable ui-sortable-handle">
        <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="website" class="form-group text">
                <label id="_lbl_website" class="control-label" for="dia_diem_moi">
                    <span class="label-content">và Phòng Đào tạo Đại học cho phép em được đổi địa điểm thực tập đến:</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <textarea placeholder="Ghi rõ địa điểm thực tập mới" type="text" class="form-control " id="dia_diem_moi" name="dia_diem_moi"></textarea>
            </div>
        </div>
    </div>
    <div id="row-9" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="tu_ngay">
                    <span class="label-content">Từ ngày:</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="tu_ngay" name="tu_ngay" type="date" class="form-control" value="">
            </div>
        </div>
        <div id="column-4" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="den_ngay">
                    <span class="label-content">đến ngày:</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="den_ngay" name="den_ngay" type="date" class="form-control" value="">
            </div>
        </div>
    </div>
    <div id="row-10" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="tenhp"> Chúng em cam kết sẽ chấp hành mọi nội quy, quy định của Nhà trường.
                    Em xin chân thành cảm ơn!</label>
            </div>
        </div>
    </div>
@endsection