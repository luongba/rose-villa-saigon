@include('layouts.head')
<body class="layout-fullwidth {{Route::currentRouteName()}}  @if(Auth::user()){{'adminbar'}} @endif">
  
    <div class="content-custom-width" id="app">
    {{-- <input type="hidden" name="login" value="{{route('login_web')}}">
    <input type="hidden" name="register_web" value="{{route('register_web')}}">
    <input type="hidden" name="check_pin_register" value="{{route('check_pin_register')}}">
    <input type="hidden" name="forgot_web" value="{{route('forgot_web')}}">
    <input type="hidden" name="check_pin_forgot" value="{{route('check_pin')}}">
    <input type="hidden" name="update_password" value="{{route('update_password')}}"> --}}
    @include('layouts.nav')
    @include('layouts.header')

    @if(!Auth::user())
      {{-- @include('popup.login-popup') --}}
    @endif
    {{-- @include('popup.register-popup') --}}
    {{-- @include('popup.forgotpass-popup') --}}
    {{-- @include('popup.verifyphone-popup') --}}
    {{-- @include('popup.verifyresetpassword-popup') --}}
    {{-- @include('popup.resetpassword-popup') --}}
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
