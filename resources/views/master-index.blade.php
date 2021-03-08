@include('layouts.head')
<body class="layout-fullwidth {{Route::currentRouteName()}}  @if(Auth::user()){{'adminbar'}} @endif">
    @yield('preload')

    <div class="wrapper" id="app">
        @if(!Auth::user())
          @include('popups.login-popup')
        @endif
        <div class="container__menu">
            <div class="optionlang">
        <div class="chooselang">
            <span class="{{ config('app.locale') == "en" ? 'active' : '' }}"  id="en">EN</span>
            <span class="{{ config('app.locale') == "vi" ? 'active' : '' }}"  id="vi">VI</span>
             <i class="fas fa-caret-down"></i>
          </div>
        <ul class="select-lang">
            <li>
                <a class="{{ config('app.locale') == "en" ? 'active' : '' }}" href="./change-language/en">EN</a>
            </li>
            <li>
                <a class="{{ config('app.locale') == "vi" ? 'active' : '' }}"  href="./change-language/vi">VI</a>
            </li>
        </ul>

      </div>
            <ul class="menu__list">
        {{-- <li class="nav-item {{ Route::currentRouteNamed('welcome') ? 'active' : '' }}"><a class="nav-link" href="{{route('welcome')}}">{{ trans('pages.home') }}</a></li> --}}
        <li class="nav-item nav-center {{ Route::currentRouteNamed('about') ? 'active' : '' }}"><a class="nav-link nav-link-new" href="{{route('getPage',['slug'=>'about'])}}">Our Story</a></li>
        <li class="nav-item nav-center has-child-menu">
            <a class="nav-link nav-link-new" href="javascript:;">{{ trans('pages.Membership') }}</a>
            <ul class="sub-menu sub-center"  style="display: none;">
                <li class="sub-item-neww"><a class="sub-link" href="{{route('the-club')}}">The Club</a></li>
                <li class="sub-item-neww"><a class="sub-link" href="{{route('regularmember')}}">Regular Application</a></li>
                <li class="sub-item-neww"><a class="sub-link" href="{{route('founder')}}">Founder Application</
                  ></li>
                <li class="sub-item-neww"><a class="sub-link" href="{{route('early-founder')}}">Early Founder Application</a></li>
            </ul>
             </li>
        <li class="nav-item nav-center has-child-menu">
            <a class="nav-link nav-link-new" href="javascript:;">{{ trans('pages.Rooms') }}</a>
            <ul class="sub-menu sub-center" style="display: none;" >
                @foreach($list_room as $val_room)
                <li class="sub-item-neww"><a class="sub-link" href="{{route('singleroom',['slug'=>$val_room->slug])}}">{{$val_room->getTranslatedAttribute('name', config('app.locale'), 'fallbackLocale')}}</a></li>
                @endforeach
            </ul>
        </li>
            <li class="nav-item nav-center has-child-menu">
            <a class="nav-link nav-link-new" href="javascript:;">{{ trans('pages.Food & Drinks') }}</a>
            <ul class="sub-menu sub-center" style="display: none;" >
                @foreach($list_areaParty as $val_areaParty)
                <li class="sub-item-neww"><a class="sub-link" href="{{route('singlefooddrink',['slug'=>$val_areaParty->slug])}}">{{$val_areaParty->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')}}</a></li>
                @endforeach
            </ul>
        </li>

        <li class="nav-item nav-center has-child-menu">
            <a class="nav-link nav-link-new" href="javascript:;">{{ trans('pages.Wellness & Beauty') }}</a>
            <ul class="sub-menu sub-center" style="display: none;" >
              @if(!empty($list_wellness_beauty))
                @foreach($list_wellness_beauty as $val_wellness_beauty)
                <li class="sub-item-neww"><a class="sub-link" href="{{route('singleSpa',['slug'=>$val_wellness_beauty->slug])}}">{{$val_wellness_beauty->getTranslatedAttribute('name', config('app.locale'), 'fallbackLocale')}}</a></li>
                @endforeach
              @endif
            </ul>
        </li>

        {{--<li class="nav-item nav-center {{ Route::currentRouteNamed('spa') ? 'active' : '' }}"><a class="nav-link nav-link-new" href="{{route('spa')}}">{{ trans('pages.Wellness & Beauty') }}</a></li>--}}
        <li class="nav-item nav-center {{ Route::currentRouteNamed('shop') ? 'active' : '' }}"><a class="nav-link nav-link-new" href="{{route('shop')}}">{{ trans('pages.Shop') }}</a></li>

        <li class="nav-item nav-center has-child-menu">
            <a class="nav-link nav-link-new" href="javascript:;">{{ trans('pages.Events') }}</a>
            <ul class="sub-menu sub-center" style="display: none;" >
              @if(!empty($list_events))
                @foreach($list_events as $val_events)
                <li class="sub-item-neww"><a class="sub-link" href="{{route('singleEvents',['slug'=>$val_events->slug])}}">{{$val_events->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')}}</a></li>
                @endforeach
              @endif
            </ul>
        </li>


        {{--<li class="nav-item nav-center {{ Route::currentRouteNamed('events') ? 'active' : '' }}"><a class="nav-link nav-link-new" href="{{route('events')}}">{{ trans('pages.Events') }}</a></li>--}}
        <li class="nav-item nav-center {{ Route::currentRouteNamed('contact') ? 'active' : '' }}"><a class="nav-link nav-link-new" href="{{route('contact')}}">{{ trans('pages.Contact Us') }}</a></li>

        <li class="nav-item nav-center {{ Route::currentRouteNamed('findus') ? 'active' : '' }}"><a class="nav-link nav-link-new" href="{{route('findus')}}">{{ trans('pages.How To Find Us') }}</a></li>
        <li class="nav-item nav-center">
                    <div class="footer__follow">
                      <a href="ttps://www.instagram.com/"><img src="../../../public/images/icons/icon.jpg" alt="" class="img__follow"></a>
                        
                        <p class="text__follow">Follow us</p>
                        <p class="text__follow">ROSEVILLASAIGON</p>
                        
                    </div>
                    <ul class="menu__footer">
                        <li class="menu__footer-item">
                            <a href="http://rosevilla.tntechs.com.vn/contact" class="menu__footer-link">
                                contact
                            </a></li>
                        <li class="menu__footer-item">
                            <a href="mailto:workwithus@rosevillasaigon.com" class="menu__footer-link">
                                CAREERS
                            </a></li>
                        <li class="menu__footer-item">
                            <a href="mailto:press@rosevillasaigon.com" class="menu__footer-link">
                                PRESS
                            </a></li>
                        <li class="menu__footer-item">
                            <a href="" class="menu__footer-link">
                                LEGAL
                            </a></li>
                    </ul>
            </li>
            
            </ul>
        </div>
        <div class="control">
            <div class="control__menu">
                <h4 class="control__menu-text">
                    EXPLORE ROSE VILLA
                </h4>
            </div>
            
            <a href="http://rosevilla.tntechs.com.vn/" class="homelinklogo1">
                <img src="../../../public/images/bg/logo.png" alt="" class="img__logo">
            </a>
            <a href="http://rosevilla.tntechs.com.vn/public/images/maplogo.jpg" target="_blank" class="maplinklogo1"><img class="icon-mapclick" src="../../../public/images/icons/mapclick.png"></a>
            </a>
            <a href="javascript:;" data-toggle="modal" data-target="#popup-login" class="control__login">
                <h4 class="control__login-text">
                    <i class="fas fa-sign-out-alt icon-a"></i>
                    MEMBER LOGIN
                </h4>
            </a>

            
        </div>
        
    </div>
     
    <script src="{{asset('public/js/jquery-2.1.3.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('public/js/app.js')}}"></script>
    <script src="{{asset('public/js/slick.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('script')
    <script>
        (function(){
    var click = document.querySelector('.control__menu');
    click.addEventListener('click', function(e){
        var maplinklogo = document.querySelector('.maplinklogo1');
                maplinklogo.classList.toggle('block__box');
                var homelinklogo = document.querySelector('.homelinklogo1');
                homelinklogo.classList.toggle('none__box');
        var getMenu = document.querySelector('.menu__list');
        getMenu.classList.toggle('menu__show')
    })
})();

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
</html>
