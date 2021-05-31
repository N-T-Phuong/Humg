<script src="{{asset('hs/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('hs/vendor/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('hs/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('hs/js/adminlte.js') }}"></script>
<script src="{{ asset('hs/js/demo/dashboard.js') }}"></script>
<script src="{{ asset('hs/js/demo/demo.js') }}"></script>
<script src="{{asset('hs/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('js_footer')
