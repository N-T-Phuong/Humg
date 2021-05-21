{{--<footer class="sticky-footer bg-white">--}}
{{--<div class="container my-auto">--}}
{{--<div class="copyright text-center my-auto">--}}
{{--<span>Copyright &copy; Your Website 2021</span>--}}
{{--</div>--}}
{{--</div>--}}
{{--</footer>--}}
<!-- Bootstrap core JavaScript-->
<script src="{{asset('hs/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('hs/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('hs/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('hs/js/sb-admin-2.min.js')}}"></script>
{{--<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>--}}
<script src="{{asset('editor/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
{{----TinyMCE----}}
{{--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
{{--<script>tinymce.init({selector:'.mce'});</script>--}}
@yield('js_footer')
