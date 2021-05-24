@extends('backend.bieumau.form')
@section('file')

@foreach($configs as $config)
@if($config->type == 'textarea')
<div id="row-8" class="row ui-sortable ui-sortable-handle">
  <div id="column" class="col-md-12 col ui-sortable ui-sortable-handle">
    <div id="website" class="form-group text">
      <label id="_lbl_website" class="control-label" for="ly_do">
        <span class="label-content">
          {{$config->label}}
        </span>
        <span class="color-err" title="Trường bắt buộc">*</span>
      </label>
      <textarea placeholder="Ghi rõ lý do đề nghị ghép lớp" type="text" class="form-control infoform" id="ly_do"
        name="{{$config->field}}"></textarea>
    </div>
  </div>
</div>

@elseif ($config->type == 'file')

<div id="row-9" class="row ui-sortable ui-sortable-handle">
  <div id="column-3" class="col-md-10 col ui-sortable ui-sortable-handle">
    <div id="" class="form-group text">
      <label id="" class="control-label" for="file">
        <span class="label-content">
          {{$config->label}}
        </span>
      </label>
      <input type="file" name="{{$config->field}}" class="custom-file-input">
    </div>
  </div>
</div>

@else {{--input--}}

<div id="row-6" class="row ui-sortable ui-sortable-handle">
  <div id="column-3" class="col-md-6 col ui-sortable ui-sortable-handle">
    <div id="" class="form-group text">
      <label id="" class="control-label" for="tenhp">
        <span class="label-content">
          {{$config->label}}
        </span>
        <span class="color-err" title="Trường bắt buộc">*</span>
      </label>
      <input id="input-bieumau-{{$config->id}}" name="{{$config->field}}" type="text" class="form-control" value="">
    </div>
  </div>
</div>

@endif
@endforeach
@endsection