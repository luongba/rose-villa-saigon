

@extends('master-index')

@section('preload')

  <div class="landing landingstyle">

    <div class="innerpage-style1 fixheightfull">

      <div class="container indexmenu sc0">

        @include('layouts.nav')

      </div>

    </div>

  </div>

    

  </div>

  <div class="welcome-layout"> 
     <img class="trans" style="position: absolute; top: 0;left: 0; bottom: 0; width: 100%; z-index: 1000" src="{{ asset('public/images/rem/rem-top.png') }}" alt="">

    <img  src="{{asset('public/images/imagesfloat/lion-layer-bottom-left2.png')}}" class="flef flef1 " />

    <img  src="{{asset('public/images/imagesfloat/bird-layer-center2.png')}}" class="flef flef2 " />

    <img  src="{{asset('public/images/imagesfloat/deer-bottom-right2.png')}}" class="flef flef4 " />

    <img  src="{{asset('public/images/imagesfloat/animation-left2.png')}}" class="flef left-flower " />

    <img  src="{{asset('public/images/imagesfloat/animation-right2.png')}}" class="flef right-flower " />

    <img  src="{{asset('public/images/imagesfloat/rose-layer-bottom2.png')}}" class="flef flef5 " />

    <img  src="{{asset('public/images/imagesfloat/Face-eye-center-layer2.png')}}" class="flef flef6 " />

    <img  src="{{asset('public/images/imagesfloat/rose-left-web2.png')}}" class="flef flef7 " />

    <img  src="{{asset('public/images/imagesfloat/rose-right-web2.png')}}" class="flef flef8 " />

    <img  src="{{asset('public/images/imagesfloat/rose-bottom-web2.png')}}" class="flef flef9 " />

    

        <div class="textlanding">

          <h1 class="wctext"><span style="padding-left:10px;">Welcome</span><br/><p style="font-family: 'MatrixIIOT-Reg'; text-transform: uppercase">To The World of</p></h1>

          <img class="image-title-rose" src="{{ asset('public/images/title/rose-villa-text-logo3.png') }}" alt="">

          <p class="barakah">-2021-</p>

        <p style="color:black; font-family: 'MatrixIIOT-Reg';">Private Members Club</p>

        <p style="color:black;font-family: 'MatrixIIOT-Reg'">Elegant escapism for the eternally curious</p>

          <div class="openbutton">

            <span class="clickviewsite">Enter</span>

            <span class="soundon">Sound On</span>

          </div>

        </div>

  </div>

  <div class="loading">

    <div class="spinner">

          <i class="fas fa-spinner fa-spin fa-3x fa-fw"></i>

    </div>

  </div>

  {{-- @if(!session()->has('rem')) --}}

  <!--<div id="page-wrap" class="page-wrap">-->

    

  <!--   <div id="canvas"></div>-->
  <!--   <img style="position: absolute; top: 0; width: 100%; transition: all linear  3s;" src="{{ asset('public/images/rem/rem-top.png') }}" alt="">-->

  <!--    <div class="curtain first-curtain">-->

  <!--      <img src="{{asset('public/images/rem/cl.png')}}" class="" data-sampler="simplePlaneTexture" />-->

  <!--    </div>-->

  <!--    <div class="curtain second-curtain">-->

  <!--    <img src="{{asset('public/images/rem/cr.png')}}" class="" data-sampler="simplePlaneTexture" />-->

  <!--    </div>-->

  <!--</div>-->
  <div id="page-wrap" class="page-wrap">


      <div id="curtain-left" style="">


      </div>

      <div id="curtain-right">
        <div></div>
        <div class="curtain-right-hip"></div>
      </div>

  </div>

  <audio id="audio" loop>

    <source type="audio/mp3" src="{{asset('public/assets/audio/Laura Fygi – La Vie En Rose.mp3')}}">

  </audio>

  <div class="audio-control loop">

      <span class="turnon" onclick="disableMute()" title="TURN ON SOUND">
        <i class="fas fa-volume-mute color-black"></i>
      </span>

      <span class="turnoff" onclick="enableMute()" title="MUTED">
        <i class="fas fa-volume-up color-black"></i>
      </span>

  </div>



  

@endsection

@section('style')



<style>

    #page-wrap {

      visibility: hidden;

    }

  .header,

  .content-custom-width {

      visibility: hidden;

    }

  </style>

@endsection

@section('content')

  <div class="landing landingstyle">

    <div class="innerpage-style1 fixheightfull">

      <span class="leftpageimg"></span>

      <span class="rightpageimg"></span>  

        <span class="bgimg"></span>

      <div class="container indexmenu sc0">

        @include('layouts.nav')

      </div>

    </div>

  </div>

  

@endsection

@section('script')

<script src="{{asset('public/js/curtains.js')}}" type="text/javascript"></script>

<script src="{{asset('public/js/simple.plane.setup.js')}}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.min.js"></script>

<script src="{{asset('public/js/vendor.js')}}"></script>

<script type="text/javascript">
                      var wrapper = document.getElementById("page-wrap");

      function ready() {

          setTimeout(function(){

            $('body').find('.loading').remove();

            $('body').find('.header').css('visibility','visible');

            $('body').find('#page-wrap').css('visibility','visible');

            $('body').find('.content-custom-width').css('visibility','visible');
            $('body').find('#curtain-left').css('animation','left 10s linear');
            $('body').find('.curtain-right-hip').css('animation','right 10s linear');

          }, 1000);
          setTimeout(function(){
        var trans = document.getElementsByClassName('trans')[0];
                    wrapper.style.display = "none";
                    trans.style.opacity = 0;
                    trans.style.transition = "all 3s";
                    // document.getElementsByClassName("header");
                    // audio.remove();
                }, 9000);

      }
        
      // $(document).on('click', '.bg_rem', function(){

      //    $(this).fadeOut(4000);

      //    $('body').find('.scale0').addClass('scale1'); 

      //    $('.flef ').removeClass('flefout'); 

      // });

      $(document).on('click', '.clickviewsite', function(){

        // $(this).closest('.bg_rem').addClass("box-transition box-hidden");

          $(this).closest('.welcome-layout').find('.flef').addClass('flefout');

          $(this).closest('.welcome-layout').fadeOut(1000); 

          $('.textlanding ').addClass('bkv');

        // $('#cloud1').addClass('ltout');

        // $('#cloud2').addClass('lbout');

        // $('#cloud3').addClass('rbout');

        // $('#cloud4').addClass('rtout');

        var audio = document.getElementById("audio");

        audio.play();

        

      });

      // $(document).on('click', '.textmenu', function(){

      //   $('.logo-landing').addClass('clickmenu');

      //     $('.indexmenu').addClass('scale1');

      // });



      

      // $(document).ready(function(){



      //     $(document).on('click', '.textmenu', function(){

      //       var mn = $(".indexmenu");

      //       if (mn.hasClass("sc0")){

      //         mn.removeClass('sc0').addClass('sc1');

              

      //         $('.homelinklogo').css('display','none');

      //         $('.maplinklogo').css('display','block');

      //       }else{

      //         mn.removeClass('sc1').addClass('sc0');

      //         $('.maplinklogo').css('display','none');

      //         $('.homelinklogo').css('display','block');

      //       }



      //     }

      //   );

      // });

      

      // $(document).on('transitionend webkitTransitionEnd oTransitionEnd', '.bg_rem', function () {

      //   $(this).hide('slow');

      //     var audio = document.getElementById("audio");

      //     setTimeout(function(){

      //         // audio.remove();

      //     }, 1000);

      // });



      

      var vid = document.getElementById("audio");



    function enableMute() { 

      vid.muted = true;

      $('.audio-control').removeClass('control-on').addClass('control-off');

    } 



    function disableMute() { 

      vid.muted = false;

      $('.audio-control').removeClass('control-off').addClass('control-on');

    } 

      document.addEventListener('DOMContentLoaded', function() {

        /*var box = document.getElementsByClassName('bg_rem')[0],

            button = document.getElementsByClassName('bg_rem')[0];



        button.addEventListener('click', function(e) {

          if (box.classList.contains('box-hidden')) {

            // show

            box.classList.add('box-transition');

            box.clientWidth; // force layout to ensure the now display: block and opacity: 0 values are taken into account when the CSS transition starts.

            box.classList.remove('box-hidden');

          } else {

            // hide

            box.classList.add('box-transition');

            box.classList.add('box-hidden');

          }

        }, false);



        box.addEventListener('transitionend', function() {

          box.classList.remove('box-transition');

        }, false);*/



      });

      

      document.addEventListener("DOMContentLoaded", ready);

    </script>

<!--     <script>

$(document).ready(function() {



  //jqfloat.js script

  $('.cloud').each(function() {

    $(this).jqFloat({

      width:Math.floor(Math.random()*11)*11,

      height:11,

      speed:Math.floor(Math.random()*11)*100 + 500

    });

  }); 



});

</script> -->

@endsection