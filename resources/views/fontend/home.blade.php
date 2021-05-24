@extends('fontend.include.master')
<div class="bg-humg">
    @section('content')
    @guest
    @include('fontend.home.dang_nhap')
    @else
    @include('fontend.home.trangchu')
    @endguest
    @endsection
</div>