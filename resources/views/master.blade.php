@include('layouts.head')
<body class="layout-fullwidth {{Route::currentRouteName()}}  @if(Auth::user()){{'adminbar'}} @endif">
    @yield('preload')
    <div class="content-custom-width" id="app">
        @include('layouts.nav')
        @include('layouts.header')
        @if(!Auth::user())
          @include('popups.login-popup')
        @endif
        <div class="bgfix hello"></div>
        @yield('content')
{{--         @include('layouts.footer') --}}
    </div>
    <script src="{{asset('public/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('public/js/app.js')}}"></script>
    <script src="{{asset('public/js/slick.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.0/fullpage.min.js"></script>
        <script src="{{ asset('public/js/jquery.malihu.PageScroll2id.js') }}"></script>

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
    </script>
    <script type="text/javascript">
        var menu_item = document.querySelectorAll('.menu__item-sec');
        var dots = document.querySelectorAll('.icon-dots');
        var title = document.querySelectorAll('.title-right');
        var title_after =document.querySelectorAll(".title_after");
        menu_item[0].addEventListener('click', function(){
            dots[0].classList.add('icon-dots-active');
            dots[1].classList.remove('icon-dots-active');
            dots[2].classList.remove('icon-dots-active');
            title[0].classList.add('title-right-active');
            title[1].classList.remove('title-right-active');
            title[2].classList.remove('title-right-active');
            title_after[0].classList.add('title_after-active');
            title_after[1].classList.remove('title_after-active');
            title_after[2].classList.remove('title_after-active');


        });
        menu_item[1].addEventListener('click', function(){
            dots[1].classList.add('icon-dots-active');
            dots[0].classList.remove('icon-dots-active');
            dots[2].classList.remove('icon-dots-active');
            title[1].classList.add('title-right-active');
            title[0].classList.remove('title-right-active');
            title[2].classList.remove('title-right-active');
             title_after[1].classList.add('title_after-active');
           title_after[0].classList.remove('title_after-active');
              title_after[2].classList.remove('title_after-active');
        })
        menu_item[2].addEventListener('click', function(){
            dots[2].classList.add('icon-dots-active');
            dots[1].classList.remove('icon-dots-active');
            dots[0].classList.remove('icon-dots-active');
            title[2].classList.add('title-right-active');
            title[1].classList.remove('title-right-active');
            title[0].classList.remove('title-right-active');
             title_after[2].classList.add('title_after-active');
             title_after[1].classList.remove('title_after-active');
             title_after[0].classList.remove('title_after-active');

        })
    </script>
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
</body>

