@extends('backend.bieumau.form')
@section('file')
    <label id="" class="control-label">Em làm đơn này đề nghị Nhà trường không tham gia tính điểm các học phần đã chọn sau:</label>
    <div id="row-6" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-5 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="tenhp">
                    <span class="label-content">Tên học phần</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="tenhp" name="tenhp" type="text" class="form-control" value="">
            </div>
        </div>
        <div id="column-4" class="col-md-4 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="mahp">
                    <span class="label-content">Mã học phần</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="mahp" name="mahp" type="text" class="form-control" value="">
            </div>
        </div>
        <div id="column-3" class="col-md-3 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="nhomhp">
                    <span class="label-content">Ghi chú</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="ghichu" name="ghichu" type="text" class="form-control" value="">
            </div>
        </div>
    </div>
    <div id="row-6" class="row ui-sortable ui-sortable-handle">
        <div id="column-3" class="col-md-5 col ui-sortable ui-sortable-handle">
            <div id="diDong" class="form-group text">
                <label id="" class="control-label" for="tenhp">
                    <span class="label-content">Tên học phần</span>
                    {{--<span class="color-err" title="Trường bắt buộc">*</span>--}}
                </label>
                <input id="tenhp" name="tenhp" type="text" class="form-control" value="">
            </div>
        </div>
        <div id="column-4" class="col-md-4 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="mahp">
                    <span class="label-content">Mã học phần</span>
                    {{--<span class="color-err" title="Trường bắt buộc">*</span>--}}
                </label>
                <input id="mahp" name="mahp" type="text" class="form-control" value="">
            </div>
        </div>
        <div id="column-3" class="col-md-3 col ui-sortable ui-sortable-handle">
            <div id="" class="form-group text">
                <label id="" class="control-label" for="ghichu">
                    <span class="label-content">Ghi chú</span>
                    {{--<span class="color-err" title="Trường bắt buộc">*</span>--}}
                </label>
                <input id="ghichu" name="ghichu" type="text" class="form-control" value="">
            </div>
        </div>
    </div>
@endsection