<!doctype html>
<html lang="">
<head>
    <link rel="alternate" href="https://www.rosevillasaigon.com/" hreflang="en" />
    <title>Rose Villa Sài Gòn</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="language" content="english">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('/public/')}}" >
    <!-- CSS Files -->
    @yield('css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet"> 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.css')}}">
    <!-- Optional theme -->
    <link href="https://parsleyjs.org/src/parsley.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/css/all.css')}}">
    <link href="{{asset('public/style.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('public/assets/css/curtain.css')}}" rel="stylesheet" media="screen">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
    <link href="{{asset('public/assets/css/bootstrap-pincode-input.css')}}" rel="stylesheet">  
{{--     <link rel="stylesheet" href="{{asset('public/css/prism.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/intlTelInput.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/isValidNumber.css')}}"> --}}
</head>
<body class="layout-headerleft {{Route::currentRouteName()}}  @if(Auth::user()){{'adminbar'}} @endif">
  
    <div class="content-custom-width" id="app">
    {{-- <input type="hidden" name="login" value="{{route('login_web')}}">
    <input type="hidden" name="register_web" value="{{route('register_web')}}">
    <input type="hidden" name="check_pin_register" value="{{route('check_pin_register')}}">
    <input type="hidden" name="forgot_web" value="{{route('forgot_web')}}">
    <input type="hidden" name="check_pin_forgot" value="{{route('check_pin')}}">
    <input type="hidden" name="update_password" value="{{route('update_password')}}"> --}}
    @include('layouts.header')

    @if(!Auth::user())
      @include('popup.login-popup')
    @endif
    {{-- @include('popup.register-popup') --}}
    {{-- @include('popup.forgotpass-popup') --}}
    {{-- @include('popup.verifyphone-popup') --}}
    {{-- @include('popup.verifyresetpassword-popup') --}}
    {{-- @include('popup.resetpassword-popup') --}}

      @if(Auth::user())
          <div class="user-bar">
            <div class="container">
              <a href="{{route('cartproduct')}}">
                <div class="cart-header">
                  <span style="color: #fff;"> {{(session('list_order')) ? count(session('list_order')) : 0 }}</span>
                </div>
              </a>
              <div class="dropdown user-menu">
                <a class="dropdown-toggle username-bar" data-toggle="dropdown" href="javascript:;">
                    {{Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu custom-dropmenu">
                    <li class="linktoprofile"><a href="{{ route('myprofile') }}" title="Trang Cá Nhân"><span>Tài Khoản Của Tôi</span></a></li>
                    <li class="singout">
                        <a href="{{ route('logout_web') }}">
                        <span>Đăng Xuất</span></a>
                    </li>
                </ul>
              </div>
              <button type="button" id="menu-btn" class="menuhome navbar-toggle collapsed">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button> <!-- Responsive nav button end -->
            </div>
          </div>
        @else
            <div class="showmenumobile">
              <button type="button" id="menu-btn" class="menuhome navbar-toggle collapsed">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
              </button> <!-- Responsive nav button end -->
            </div>
        @endif
      @yield('content')
    </div>
    
 
    
    <script src="{{asset('public/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('public/js/app.js')}}"></script>

</body>
</html>
