@extends('backend.bieumau.form')
@section('file')
    <div id="row-5" class="row ui-sortable ui-sortable-handle">
        <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="lophp">
                    <span class="label-content">Em làm đơn này kính đề nghị Phòng Đào tạo Đại học cho phép  học ghép vào lớp:</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <textarea placeholder="Ghi rõ lớp muốn ghép" type="text" class="form-control " id="lophp" name="lophp"></textarea>
            </div>
        </div>
    </div>
    <div id="row-6" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="tenhp">
                    <span class="label-content">Tên học phần</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="tenhp" name="tenhp" type="text" class="form-control" value="">
            </div>
        </div>
        <div id="column-4" class="col-md-6 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="mahp">
                    <span class="label-content">Mã hoc phần</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="mahp" name="mahp" type="text" class="form-control" value="">
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
                    <span class="label-content">Lý do xin phép</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <textarea placeholder="Ghi rõ lý do đề nghị ghép lớp" type="text" class="form-control infoform" id="ly_do" name="ly_do"></textarea>
            </div>
        </div>
    </div>
    <div id="row-9" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-10 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="file">
                    <span class="label-content">Tệp đính kèm</span>
                    <span class="color-red" title="Trường bắt buộc">(Danh sách đính kèm nếu có)</span>
                </label>
                <input type="file" name="file_dinh_kem" class="custom-file-input">
            </div>
        </div>
    </div>
@endsection