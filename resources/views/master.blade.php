@include('layouts.head')
<body class="layout-fullwidth {{Route::currentRouteName()}}  @if(Auth::user()){{'adminbar'}} @endif">
  
    <div class="content-custom-width" id="app">
    @include('layouts.nav')
    @include('layouts.header')
    @if(!Auth::user())
      @include('popup.login-popup')
    @endif
      @yield('content')
      @include('layouts.footer')
    </div>
    <script src="{{asset('public/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('public/js/app.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#menu-btn').click(function () {
                $('.nav-site').slideDown('slow');
            });
            $('.closemenu').click(function () {
                $('.nav-site').slideUp('slow');
            });
        });
    </script>

</body>
</html>
