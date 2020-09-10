@include('layouts.head')
<body class="layout-fullwidth {{Route::currentRouteName()}}  @if(Auth::user()){{'adminbar'}} @endif">
    @yield('preload')
    <div class="content-custom-width" id="app">
        @include('layouts.nav')
        @include('layouts.header')
        @if(!Auth::user())
          @include('popups.login-popup')
        @endif
        <div class="bgfix"></div>
        @yield('content')
        @include('layouts.footer')
    </div>
    <script src="{{asset('public/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('public/js/app.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('script')
    <script>
        $(document).ready(function() {
            $('#menu-btn').click(function () {
                $('#menu-btn').hide();
                $('.closemenu').show();
                $('.nav-site').slideDown('slow');
            });
            $('.closemenu').click(function () {
                $('.closemenu').hide();
                $('#menu-btn').show();
                $('.nav-site').slideUp('slow');

            });
            $('.has-child-menu').click(function () {
                // $(this).find('ul').slideToggle('slow');
                var aa = $(this).find('ul');
                if(aa.is(":visible")){
                        $(this).removeClass('showsubmenu');
                        aa.slideUp('slow');
                    }else {
                        $(this).addClass('showsubmenu');
                        $('.has-child-menu .sub-menu').slideUp('slow');
                        aa.slideDown('slow');
                    }
                });
            $('.chooselang').click(function () {
                // $(this).find('ul').slideToggle('slow');
                var lang = $('.select-lang');
                if(lang.is(":visible")){
                        lang.slideUp('slow');
                    }else {
                        lang.slideDown('slow');
                    }
                });
            // $(window).click(function() {
            //     $('.select-lang').slideUp('slow');
            // });

            // $('.optionlang').click(function(event){
            //         event.stopPropagation();
            // });


            $('.username-bar').click(function () {
                $('.custom-dropmenu').slideToggle('slow');
            });
        });
    </script>
</body>
</html>
