@extends('backend.bieumau.form')
@section('file')
<div style=" margin:0 5em; "  >
    @foreach($thutuc->forms as $form)
        @if($form->type == 'textarea')
        <div id="row-8" class="row ui-sortable ui-sortable-handle">
            <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
                <div id="website" class="form-group text">
                    <label id="_lbl_website" class="control-label" for="">
                        <span class="label-content">
                        {{$form->label}}
                        </span>
                        <span class="color-err" title="Trường bắt buộc">*</span>
                    </label>
                <input type="hidden" name="field[]" value="{{ $form->field }}">
                <textarea  type="text" class="form-control infoform" id="" name="value[]"></textarea>
                </div>
            </div>
        </div>

        @elseif ($form->type == 'file')
        <div id="row-9" class="row ui-sortable ui-sortable-handle">
            <div id="column-3" class="col-md-12 col ui-sortable ui-sortable-handle">
                <div id="" class="form-group text">
                    <label id="" class="control-label" for="">
                        <span class="label-content">
                        {{$form->label}}
                        </span>
                    </label>
                <input type="hidden" name="field[]" value="{{ $form->field }}">
                <input type="file" name="file" class="custom-file-input">
                <input type="hidden" name="value[]" value="0" class="custom-file-input">
                </div>
            </div>
        </div>
        @elseif ($form->type == 'datetime')
        <div id="row-9" class="row ui-sortable ui-sortable-handle">
            <div id="column-3" class="col-md-12 col ui-sortable ui-sortable-handle">
                <div id="" class="form-group text">
                <label id="" class="control-label" for="">
                    <span class="label-content">
                    {{$form->label}}
                    </span>
                </label>
                <input type="hidden" name="field[]" value="{{ $form->field }}">
                <input type="date" name="value[]" class="custom-file-input">
                </div>
            </div>
        </div>
            
        @else {{--input--}}
    {{--clgt?? col-6--}}
        <div id="row-6" class="row ui-sortable ui-sortable-handle">
            <div id="column-3" class="col-md-12 col ui-sortable ui-sortable-handle">
                <div id="" class="form-group text">
                <label id="" class="control-label" for="">
                    <span class="label-content">
                    {{$form->label}}
                    </span>
                    <span class="color-err" title="Trường bắt buộc">*</span>
                </label>
                <input type="hidden" name="field[]" value="{{ $form->field }}">
                <input id="input-bieumau-{{$form->id}}" name="value[]" type="text" class="form-control" value="">
                </div>
            </div>
        </div>

        @endif
    @endforeach
</div>
@endsection
