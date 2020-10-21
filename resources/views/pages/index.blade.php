
@extends('master')
@section('preload')
  <div class="landing landingstyle">
    <div class="innerpage-style1 fixheightfull">
      <div class="container indexmenu sc0">
        @include('layouts.nav')
      </div>
    </div>
  </div>

  <div class="bg_rem" id="bg_rem">
    <div class="align-center">
      <div class="biglogo">
        <img  src="{{asset('public/images/logo/logo_big_landing.png')}}" class="" data-sampler="Rose Villa Sai Gon" />
      </div>
      <div class="textlanding">
        <p class="barakah">-2020-</p>
        <p>Private Members Club</p>
        <p>Elegant escapism for the eternally curious</p>
      </div>
      <div class="smalllogo">
        <img src="{{asset('public/images/logo/logo_small_landing.png')}}" class="" data-sampler="Rose Villa Sai Gon" />
      </div>
    </div>
  	
  </div>
  <div class="welcome-layout">
    <img  src="{{asset('public/images/bg/bg_effect.png')}}" class="flef flef0 flefout" />
    <img  src="{{asset('public/images/imagesfloat/flower1.png')}}" class="flef flef1 flefout" />
    <img  src="{{asset('public/images/imagesfloat/flower3.png')}}" class="flef flef2 flefout" />
    <img  src="{{asset('public/images/imagesfloat/flower2.png')}}" class="flef flef3 flefout" />
    <img  src="{{asset('public/images/imagesfloat/flower4.png')}}" class="flef flef4 flefout" />
    <img  src="{{asset('public/images/imagesfloat/left-flower.png')}}" class="flef left-flower flefout" />
    <img  src="{{asset('public/images/imagesfloat/right-flower.png')}}" class="flef right-flower flefout" />
    <img  src="{{asset('public/images/imagesfloat/flower5.png')}}" class="flef flef5 flefout" />
    <img  src="{{asset('public/images/imagesfloat/flower6.png')}}" class="flef flef6 flefout" />
    <img  src="{{asset('public/images/imagesfloat/flower7.png')}}" class="flef flef7 flefout" />
        <div class="textlanding scale0">
          <h1 class="wctext">Welcome To <br/>The World of Rose Villa</h1>
          <div class="openbutton scale0">
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
  <div id="page-wrap" class="page-wrap">
    
     <div id="canvas"></div>
      <div class="curtain first-curtain">
        <img src="{{asset('public/images/rem/cl.png')}}" class="" data-sampler="simplePlaneTexture" />
      </div>
      <div class="curtain second-curtain">
      <img src="{{asset('public/images/rem/cr.png')}}" class="" data-sampler="simplePlaneTexture" />
      </div>
  </div>
  <audio id="audio" loop>
    <source type="audio/mp3" src="{{asset('public/assets/audio/Laura Fygi – La Vie En Rose.mp3')}}">
  </audio>
  <div class="audio-control loop">
  		<span class="turnon" onclick="disableMute()" title="TURN ON SOUND"></span>
  		<span class="turnoff" onclick="enableMute()" title="MUTED"></span>
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
<script src="{{asset('public/js/vendor.js')}}"></script>
<script type="text/javascript">
      function ready() {
          setTimeout(function(){
            $('body').find('.loading').remove();
            $('body').find('.header').css('visibility','visible');
            $('body').find('#page-wrap').css('visibility','visible');
            $('body').find('.content-custom-width').css('visibility','visible');
          }, 1000);
      }
      $(document).on('click', '.bg_rem', function(){
         $(this).fadeOut(4000);
         $('body').find('.scale0').addClass('scale1'); 
         $('.flef ').removeClass('flefout'); 
      });
      $(document).on('click', '.clickviewsite', function(){
        // $(this).closest('.bg_rem').addClass("box-transition box-hidden");
          $(this).closest('.welcome-layout').find('.flef').addClass('flefout');
          $(this).closest('.welcome-layout').fadeOut(6000); 
        setTimeout(function(){
        	$('.textlanding ').addClass('bkv');
        }, 4000);
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