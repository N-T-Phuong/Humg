@extends('backend.bieumau.form')
@section('file')
    <div id="row-5" class="row ui-sortable ui-sortable-handle">
        <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
            <div id="website" class="form-group text">
                <label id="_lbl_website" class="control-label" for="ly_do">
                    <span class="label-content">Lý do </span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <textarea placeholder="Ghi rõ lý do xin rút học phần" type="text" class="form-control infoform" id="ly_do" name="ly_do"></textarea>
            </div>
        </div>
    </div>
    <label class="pb-1">Nên em không thể học theo lớp và xin rút bớt học phần:</label>
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
                    <span class="label-content">Nhóm học phần</span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input id="nhomhp" name="nhomhp" type="text" class="form-control" value="">
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
                <label id="" class="control-label" for="nhomhp">
                    <span class="label-content">Nhóm học phần</span>
                    {{--<span class="color-err" title="Trường bắt buộc">*</span>--}}
                </label>
                <input id="nhomhp" name="nhomhp" type="text" class="form-control" value="">
            </div>
        </div>
    </div>
@endsection
