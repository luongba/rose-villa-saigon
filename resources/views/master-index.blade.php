@include('layouts.head')

<body class="layout-fullwidth {{Route::currentRouteName()}}  @if(Auth::user()){{'adminbar'}} @endif">

    @yield('preload')

    <div class="wrapper" id="app">

        @if(!Auth::user())

          @include('popups.login-popup')

        @endif

        <div class="container__menu">
{{-- 
        <div class="layer-bay">

          <img  src="{{asset('public/images/bg/top-left.png')}}" class="tl1" />

          <img  src="{{asset('public/images//bg/top-right.png')}}" class="tr1" />

          <img  src="{{asset('public/images//bg/bot-left.png')}}" class="bl1" />

          <img  src="{{asset('public/images//bg/bot-right.png')}}" class="br1" />

        </div> --}}

            <ul class="menu__list">

        {{-- <li class="nav-item {{ Route::currentRouteNamed('welcome') ? 'active' : '' }}"><a class="nav-link" href="{{route('welcome')}}">{{ trans('pages.home') }}</a></li> --}}

        <li class="nav-item nav-center">

            <a class="nav-link nav-link-new" href="{{route('the-club')}}">{{ trans('pages.Club') }}</a>

            {{-- <ul class="sub-menu">

              <li><a href="{{route('the-club')}}">The Club</a></li>

                <li><a href="{{route('regularmember')}}">Regular Application</a></li>

                <li><a href="{{route('founder')}}">Founder Application</a></li>

                <li><a href="{{route('early-founder')}}">Early Founder Application</a></li>

            </ul> --}}

        </li>

        <li class="nav-item nav-center has-child-menu">

            <a class="nav-link nav-link-new" href="{{URL::to('stay/')}}">{{ trans('pages.Stay') }}</a>

            {{-- <ul class="sub-menu sub-center" style="display: none;" >

                @foreach($list_room as $val_room)

                <li class="sub-item-neww"><a class="sub-link" href="{{route('singleroom',['slug'=>$val_room->slug])}}">{{$val_room->getTranslatedAttribute('name', config('app.locale'), 'fallbackLocale')}}</a></li>

                @endforeach

            </ul> --}}

        </li>

        <li class="nav-item nav-center has-child-menu">

            <a class="nav-link nav-link-new" href="{{URL::to('celebrate/')}}">{{ trans('pages.Celebrate') }}</a>

            {{-- <ul class="sub-menu sub-center" style="display: none;" >

              @if(!empty($list_events))

                @foreach($list_events as $val_events)

                <li class="sub-item-neww"><a class="sub-link" href="{{route('singleEvents',['slug'=>$val_events->slug])}}">{{$val_events->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')}}</a></li>

                @endforeach

              @endif

            </ul> --}}

        </li>

            <li class="nav-item nav-center has-child-menu">

            <a class="nav-link nav-link-new" href="{{URL::to('dine/')}}">{{ trans('pages.Dine') }}</a>

        </li>



        <li class="nav-item nav-center has-child-menu">

            <a class="nav-link nav-link-new" href="{{URL::to('relax/')}}">{{ trans('pages.Relax') }}</a>

            {{-- <ul class="sub-menu sub-center" style="display: none;" >

              @if(!empty($list_wellness_beauty))

                @foreach($list_wellness_beauty as $val_wellness_beauty)

                <li class="sub-item-neww"><a class="sub-link" href="{{route('singleSpa',['slug'=>$val_wellness_beauty->slug])}}">{{$val_wellness_beauty->getTranslatedAttribute('name', config('app.locale'), 'fallbackLocale')}}</a></li>

                @endforeach

              @endif

            </ul> --}}

        </li>



        {{--<li class="nav-item nav-center {{ Route::currentRouteNamed('spa') ? 'active' : '' }}"><a class="nav-link nav-link-new" href="{{route('spa')}}">{{ trans('pages.Wellness & Beauty') }}</a></li>--}}

        <li class="nav-item nav-center {{ Route::currentRouteNamed('shop') ? 'active' : '' }}"><a class="nav-link nav-link-new" href="{{route('shop')}}">{{ trans('pages.Shop') }}</a></li>

        <li class="nav-item nav-center "><a class="nav-link nav-link-new" href="{{URL::to('entertain/')}}">{{ trans('pages.Entertain') }}</a></li>





        {{--<li class="nav-item nav-center {{ Route::currentRouteNamed('events') ? 'active' : '' }}"><a class="nav-link nav-link-new" href="{{route('events')}}">{{ trans('pages.Events') }}</a></li>--}}

        <li class="nav-item nav-center {{ Route::currentRouteNamed('contact') ? 'active' : '' }}"><a class="nav-link nav-link-new" href="{{route('contactus')}}">{{ trans('pages.Contact Us') }}</a></li>



        <li class="nav-item nav-center">

                    <div class="footer__follow">
                        <div class="nav-item nav-center"><a class="nav-link nav-link-new" href="#">
            <img class="icon-insta" src="{{ asset('public/images/icons/icon.jpg') }}" alt="">
        </a></div>

                        

                        <p class="text__follow">{{ trans('pages.Follow') }}</p>

                        <p class="text__follow">ROSEVILLASAIGON</p>

                        

                    </div>

                    <ul class="menu__footer">

                        <li class="menu__footer-item">

                            <a href="{{ route('contactus') }}" class="menu__footer-link">

                                {{ trans('pages.Contact') }}

                            </a></li>

                        <li class="menu__footer-item">

                            <a href="mailto:workwithus@rosevillasaigon.com" class="menu__footer-link">

                                {{ trans('pages.Careers') }}

                            </a></li>

                        <li class="menu__footer-item">

                            <a href="mailto:press@rosevillasaigon.com" class="menu__footer-link">

                                {{ trans('pages.Press') }}

                            </a></li>

                        <li class="menu__footer-item">

                            <a href="{{ route('legal.cookie') }}" class="menu__footer-link">

                                {{ trans('pages.Legal') }}

                            </a></li>

                    </ul>

            </li>

            

            </ul>

        </div>

        <div class="control">

            <div class="control__menu">


            </div>

            

                        <a href="http://rosevilla.tntechs.com.vn/" class="homelinklogo1">

            </a>

            <a href="http://rosevilla.tntechs.com.vn/public/images/maplogo.jpg" target="_blank" class="maplinklogo1"></a>

            </a>

            </a>
            @if(Auth::user())
        <div class="control__login">
            <a href="{{route('your-membership')}}" style="width: 100%; height: 100%"></a>
        </div>
      @else
      <div class="control__login">
            <a href="{{route('login')}}" style="width: 100%; height: 100%"></a>
        </div>
      @endif




                   </div>

        

    </div>

{{--     <div class="section">

        @include('pages.ourstory')

    </div>

    <div class="section">

        <div class="container" style="max-width: 90%; height: 100%; padding: ">

          <div class="row no-gutters row-set style" style="padding-top: 3rem">

    <div class="col col-xl-9 col-lg-6 col-md-6 col-sm-12" style="background-color: #fff">

      <div class="about-story" style="margin: 0; width: 100%">

          <div class="abct-elmtt scrollcustom">

            <p>As we all know, Europe is full of some of the most enchanted cities with rich history

of art, architecture, literature, and equally exciting. The vibrant European cultures

has always been an influence on the world. Likewise, Europe has always been very

close to our hearts and our journey has taken us to some of the most historic places

in the world. We discovered that for centuries, Clubs have helped bring people with

a common purpose together to interact, connect, socialize and network.

</p>

<br>

            

          </div>

          <div class="clear"></div>

        </div>

    </div>

    <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-12">

      <img src="{{ asset('public/images/thedining.jpg') }}" alt="" class="img__set-right">

    </div>

    <div class="row no-gutters row-set style">

        <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-12">

      <img src="{{ asset('public/images/thedining.jpg') }}" alt="" style="object-fit: contain; max-width: 100%; height: auto; width: 80%;  ">

    </div>

    <div class="col col-xl-9 col-lg-6 col-md-6 col-sm-12" style="background-color: #fff">

      <div class="about-story" style="margin: 0;width: 100%">

          <div class="abct-elmtt scrollcustom">

            <p>As we all know, Europe is full of some of the most enchanted cities with rich history

of art, architecture, literature, and equally exciting. The vibrant European cultures

has always been an influence on the world. Likewise, Europe has always been very

close to our hearts and our journey has taken us to some of the most historic places

in the world. We discovered that for centuries, Clubs have helped bring people with

a common purpose together to interact, connect, socialize and network.

</p>

<br>

            

          </div>

          <div class="clear"></div>

        </div>

    </div>

    </div>



    <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12">

      <p class="text-align-set">Welcome to the world of Rose Villa saigon</p>

    </div>

  </div>

  </div>

    </div>

{{--     <div class="section">

        fbesfsffjg

    </div> --}}



</div>

     

    <script src="{{asset('public/js/jquery-2.1.3.min.js')}}"></script>

    <script src="{{asset('public/js/bootstrap.js')}}"></script>

    <script src="{{asset('public/js/bootstrap.bundle.js')}}"></script>

    <script src="{{asset('public/js/app.js')}}"></script>

    <script src="{{asset('public/js/slick.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.0/fullpage.min.js"></script>

{{--     <script>

        new fullpage('#fullpage', {

    //options here

    autoScrolling:true,

    anchors:['home','our-story','our-story-']



});



    </script> --}}

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

            // $('.scroll-to-bottom').click(function() {

            //   $('.our-story').scrollTop(-10);

            //   return false;

            // });

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

