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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.0/fullpage.min.js"></script>
    <script src="{{ asset('public/js/jquery.malihu.PageScroll2id.js') }}"></script>
    <script src="{{ asset('public/js/lightslider.js') }}"></script>
    <script src="{{ asset('public/js/intlTelInput.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    

    @yield('script')
    <script>             
            $(window).on("load",function(){
                
                /* Page Scroll to id fn call */
                $(".menu_list-sec a,a[href='#top'],a[rel='m_PageScroll2id']").mPageScroll2id({
                    highlightSelector:"#navigation-menu a"
                });
                
                /* demo functions */
                $("a[rel='next']").click(function(e){
                    e.preventDefault();
                    var to=$(this).parent().parent("section").next().attr("id");
                    $.mPageScroll2id("scrollTo",to);
                });
                
            });
        var bell = document.querySelector('.bell-noti');
        var noti = document.querySelector('.notify-member');
         document.onclick = function(e){
        if(e.target.className == 'bell-noti'){
            noti.classList.toggle('showNoti');
        }
        if(e.target.className != 'bell-noti' && e.target.className != 'notify-member showNoti' && e.target.className != 'content_noti' && e.target.className != 'notifi_no' && e.target.className != 'content__noti-box' && e.target.className != 'title_noti' ){
            noti.classList.remove('showNoti');
        }
    };
    $(document).ready(function(){
     var is_opera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    var is_Edge = navigator.userAgent.indexOf("Edge") > -1;
    var is_chrome = !!window.chrome && !is_opera && !is_Edge;
    var is_explorer= typeof document !== 'undefined' && !!document.documentMode && !is_Edge;
    var is_firefox = typeof window.InstallTrigger !== 'undefined';
    var is_safari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
    if(is_safari){
        document.documentElement.style.setProperty('--font-content', '15px');
    }
    });
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
            $(window).click(function() {
                $('.select-lang').slideUp('slow');
            });

            $('.optionlang').click(function(event){
                    event.stopPropagation();
            });


            $('.username-bar').click(function () {
                $('.custom-dropmenu').slideToggle('slow');
            });

            $(document).on('click', '.textmenu', function(){
            var mn = $(".indexmenu");
            if (mn.hasClass("sc0")){
              mn.removeClass('sc0').addClass('sc1');
              mn.closest('.landing').addClass('zindex');
              
              $('.homelinklogo').css('display','none');
              $('.maplinklogo').css('display','block');
            }else{
              mn.removeClass('sc1').addClass('sc0');
              $('.maplinklogo').css('display','none');
              $('.homelinklogo').css('display','block');
              mn.closest('.landing').removeClass('zindex');
            }

          }
        );
            
        });
    </script>

