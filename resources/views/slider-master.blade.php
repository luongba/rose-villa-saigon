@include('layouts.head')
<body class="layout-fullwidth {{Route::currentRouteName()}}  @if(Auth::user()){{'adminbar'}} @endif">
    @yield('preload')
    <div class="content-custom-width" id="app">
        {{-- @include('layouts.nav') --}}
        
        @if(!Auth::user())
          @include('popups.login-popup')
        @endif
        <div class="bgfix2 hello"></div>
                @yield('content')
{{--         @include('layouts.footer') --}}
    </div>
</body>
    <script src="{{asset('public/js/app.js')}}"></script>
    <script src="{{asset('public/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>

    <script src="{{asset('public/js/slick.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.0/fullpage.min.js"></script>
    <script src="{{ asset('public/js/jquery.malihu.PageScroll2id.js') }}"></script>
    <script src="{{ asset('public/js/lightslider.js') }}"></script>
    <script src="{{ asset('public/js/intlTelInput.js') }}"></script>
    

    @yield('script')

