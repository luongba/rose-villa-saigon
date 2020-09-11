
@extends('master')
@section('preload')
  <div class="bg_rem" id="bg_rem">
  	<div class="biglogo">
  		<img src="{{asset('public/images/logo/logo_big_landing.png')}}" class="" data-sampler="Rose Villa Sai Gon" />
  	</div>
  	<div class="textlanding">
      <h1 class="wctext">Welcome To <br/>Rosevilla Sai Gon</h1>
      <p>-2020-</p>
      <p>Elegant escapism for the eternally curious</p>
      <div class="openbutton">
        <span class="clickviewsite">Enter</span>
        <span class="soundon">Sound On</span>
      </div>
    </div>


{{--   	<div class="smalllogo">
  		<img src="{{asset('public/images/logo/logo_small_landing.png')}}" class="" data-sampler="Rose Villa Sai Gon" />
  	</div> --}}
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
        <img src="{{asset('public/images/rem/r1.jpeg')}}" class="" data-sampler="simplePlaneTexture" />
      </div>
      <div class="curtain second-curtain">
      <img src="{{asset('public/images/rem/r1.jpeg')}}" class="" data-sampler="simplePlaneTexture" />
      </div>
  </div>
  <audio id="audio">
    <source type="audio/mp3" src="{{asset('public/assets/audio/La vie en rose - Louis Armstrong.mp3')}}">
  </audio>
  <div class="audio-control">
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
	    <div class="container">
	        {{-- @include('layouts.nav') --}}
	    </div>
    </div>
  </div>
@endsection
@section('script')
<script src="{{asset('public/js/curtains.js')}}" type="text/javascript"></script>
<script src="{{asset('public/js/simple.plane.setup.js')}}" type="text/javascript"></script>
<script type="text/javascript">
      function ready() {
          setTimeout(function(){
            $('body').find('.loading').remove();
            $('body').find('.header').css('visibility','visible');
            $('body').find('#page-wrap').css('visibility','visible');
            $('body').find('.content-custom-width').css('visibility','visible');
          }, 1000);
      }
      $(document).on('click', '.clickviewsite', function(){
        $(this).closest('.bg_rem').addClass("box-transition box-hidden");
        var audio = document.getElementById("audio");
        audio.play();
        // $('.wctext').addClass('zoomout');
      });
      $(document).on('transitionend webkitTransitionEnd oTransitionEnd', '.bg_rem', function () {
        $(this).hide('slow');
          var audio = document.getElementById("audio");
          setTimeout(function(){
              // audio.remove();
          }, 1000);
      });
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
@endsection